
<?php 
class Panier extends CI_Controller
{
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*                 Fonctions de base de gestion du panier                     */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    public function createPanier() {
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = array();
            $_SESSION['panier']['idProd'] = array();
            $_SESSION['panier']['qte'] = array();
            $_SESSION['panier']['prixUnit'] = array();
            $_SESSION['panier']['prixTot'] = array();
        }
        if ($_SESSION['user']->panier_client != NULL) {
            $CartLoad = $_SESSION['user']->panier_client;
            $this->chargement_panier($CartLoad);
        }
        return $_SESSION['panier'];
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    public function listePanier()
    {
        if(!isset($_SESSION['panier']))
        {
            $_SESSION['panier']=$this->createPanier();
        }
        $this->load->model("Produit_model");
        $aliste=$this->Produit_model->liste();
        
        $aView['Achat'] = $_SESSION['panier'];
        $aView['QTE']=$aliste;
      
        $this->load->view('panier/ListePanier',$aView);
    }
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    public function DetailPanier($id)
    {
        $nb_article=count($_SESSION['panier']['idProd']);
        /* On parcoure le tableau de session pour modifier l'article précis */
        for($i=0;$i<$nb_article;$i++)
        {
            if($id == $_SESSION['panier']['idProd'][$i])
            {
                $aView['idProd'] = $id;
                
                $this->load->model("Produit_model");
                $prodliste=$this->Produit_model->detail($id);
                $idcat=$prodliste->id_categorie;
                
                $this->load->model('Categorie_model');
                $cat =$this->Categorie_model->DetailCat($idcat);
                
                $aView['Categorie']=$cat;
                $aView['Produit']=$prodliste;
                $this->load->view('panier/DetailPanier',$aView);
            }
        }    
    }
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    /**
     * Ajoute un article dans le panier après vérification que nous ne sommes pas en phase de paiement
     * 
     * @param array $select variable tableau associatif contenant les valeurs de l'article
     * @return Mixed Retourne VRAI si l'ajout est effectué, Faux sinon voire une autre valeur si l'ajout
     *               est renvoyé vers la modification de quantité.
     * @see {@link modif_qte()}
     */
    
    public function ajout($id, $qte)
    {
        // Récupérer le $_POST de l'id et de la qte puis faire une requete model pour récupérer les donnés du produits 
        $ajout=FALSE;
        //$_SESSION['panier']=$this->createPanier();
        $select=$this->transfert($id, $qte);
                
        if(!isset($_SESSION['panier']['verouille']) || $_SESSION['panier']['verouille']==FALSE)
        {
            if(!$this->verif_panier($select['idProd']))
            {
                array_push($_SESSION['panier']['idProd'],$select['idProd']);
                array_push($_SESSION['panier']['qte'],$select['qte']);
                array_push($_SESSION['panier']['prixUnit'],$select['prixUnit']);
                array_push($_SESSION['panier']['prixTot'],$select['prixTot']);
                $idClient=intval($_SESSION->id_client);
                $this->sauvegarde_panier($idClient);
                $ajout = TRUE;
                $ajoute='Produit ajoutée';
                return $ajoute;
            }
           else
            {
                $ajoute = $this->modif_qte($select['idProd'],$select['qte']);
                return $ajoute;
            }
        }    
    } 

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Modifie la quantité d'un article dans le panier après vérification que nous ne sommes pas en phase de paiement
     * 
     * @param String $idProd    Identifiant de l'article à modifier
     * @param type $qte         Nouvelle quantité à enregistrer
     * @return Mixed            Retourne Vrai si la modification à bien eu lieu
     *                          FAUX sinon,
     *                          "absent" si l'article est absent du panier,
     *                          "qte_ok" si la quantité n'est pas modifiée car déjà correctement enregistrée.
     */
    public function modif_qte($idProd, $qte)
    {
        /* On initialise la variable de retour */
        $idProd=(int)$idProd;
        $qte=(int)$qte;
        $modifie = FALSE;
        if(!isset($_SESSION['panier']['verouille']) || $_SESSION['panier']['verouille'] == FALSE)
        {
            if($qte != $this->nombre_articles($idProd))
            {
                /* On compte le nombre d'article différents dans le panier */
                $nb_article=count($_SESSION['panier']['idProd']);
                /* On parcoure le tableau de session pour modifier l'article précis */
                for($i=0;$i<$nb_article;$i++)
                {
                    if($idProd == $_SESSION['panier']['idProd'][$i])
                    {
                        $_SESSION['panier']['qte'][$i]=$qte;
                        $prix=$_SESSION['panier']['prixUnit'][$i];
                        $total=($qte*$prix);
                        $_SESSION['panier']['prixTot'][$i]=$total;
                        $idClient=intval($_SESSION['user']->id_client);
                        $this->sauvegarde_panier($idClient);
                        $modifie = TRUE; 
                    }
                }    
            }
            else
            {
                /* L'article est absent du panier, donc on ne peut pas modifier la quantité ou bien
                 * le nombre est exactement le même et il est inutile de le modifier.
                 * Si l'article est absent, comme on a ni le prix Unitaire, ni le prix Total, on ne peux pas l'ajouter 
                 * Si le nombre est le même, on ne fait pas de changement. On peut donc retourner un autre
                 * type de valeur pour indiquer une erreur qu'il faudra traiter à part lors du retour d'appel
                 */
                if($this->nombre_articles($idProd)!= FALSE)
                {
                    $ajoute='absence du produit';
                }
                if($qte != $this->nombre_articles($idProd))
                {
                    $ajoute="qte_ok";
                }    
            return $ajoute;     
            }  
        }
        $this->listePanier();
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Supprimer un article du panier après vérification que nous ne sommes pas en phase de paiement
     * 
     * @param Int       $idProd numéro de référence de l'article à supprimer
     * @return Mixed    Retourne True si la suppression a bien été effectuée,
     *                  FALSE sinon, "absent" si l'article était déjà retiré du panier
     */

    public function supprim_article($idProd)
    {
        $suppression = FALSE;
        if(!isset($_SESSION['panier']['verouiller']) || $_SESSION['panier']['verouiller'] == FALSE)
        {
            /* On vérifie que l'article à supprimer est bien présent dans le panier */
            if($this->nombre_articles($idProd)!=FALSE)
            {
                /* création d'un tableau temporaire de stockage des produits */
                $panier_tmp = array("idProd"=>array(),"qte"=>array(),"prixUnit"=>array(),'prixTot'=>array());
                /* Comptage des produits du panier */
                $nb_idProd=(count($_SESSION['panier']['idProd']));
                /* Transfert du panier dans le panier temporaire */
                for($i=0;$i<$nb_idProd;$i++)
                {
                    /* On transfère tout sauf l'article à supprimer */
                    if($_SESSION['panier']['idProd'][$i]!=$idProd)
                    {
                        array_push($panier_tmp['idProd'],$_SESSION['panier']['idProd'][$i]);
                        array_push($panier_tmp['qte'],$_SESSION['panier']['qte'][$i]);
                        array_push($panier_tmp['prixUnit'],$_SESSION['panier']['prixUnit'][$i]);
                        array_push($panier_tmp['prixTot'],$_SESSION['panier']['prixTot'][$i]);
                    }
                }
                /* Le transfert est terminé, on ré-initialise le panier */
                $_SESSION["panier"]=$panier_tmp;
                /* Option : on peut maintenant supprimer notre panier temporaire */
                unset($panier_tmp);
                $suppression = TRUE;
                $idClient=$_SESSION->id_client;
                $this->sauvegarde_panier($idClient);
            }
            else
            {
                $suppression="absent";
            }
            //return $suppression;    
        }
        $this->listePanier();
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Supprier un article du panier : autre méthode.
     * 
     * @param String    $idProd numéro de référence de du produit à supprimer
     * @param Boolean   $reindex : facultatif, par dégaut, vaut TRUE 
     *                  pour ré-indexer le tableau après suppression.
     *                  On peux envoyer FALSE si cette ré-indexation n'est pas nécessaire.
     * @return Mixed    Retourne TRUE si la suppression a bien été effectuée, 
     *                  FALSE sinon, "abset" si l'article était déjà retiré du panier
     */
    public function supprim_article2($idProd, $reindex= true)
    {
        $suppression = FALSE;
        if(!isset($_SESSION['panier']['verouille']) || $_SESSION['panier']['verouille'] == FALSE)
        {
            $aCleSuppr = array_keys($_SESSION['panier']['idProd'],$idProd);

            /* sortie la clé a été trouvée */
            if(!empty($aCleSuppr))
            {
                /* on traverse le panier pour supprimer ce qui doit l'être */
                foreach ($_SESSION['panier'] as $k => $v)
                {
                    foreach($aCleSuppr as $v1)
                    {
                        unset($_SESSION['panier'][$k][$v1]);        // remplace la ligne foireuse
                    }
                    /* Réindexation des clés du panier si l'option $reindex a été laissée a TRUE */
                    if($reindix == TRUE)
                    {
                        $_SESSION['panier'][$k] = array_values($_SESSION['panier'][$k]);
                    }
                    $suppression = TRUE;
                }
            }
            else 
            {
                $suppression = "absent";
            }
        }
        return $suppression;
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Fonction qui supprime tout le contenu du panier en détruisant la variable après
     * vérification qu'on ne soit pas en phase de paiement.
     * 
     * @return Mixed    Retourne TRUE si l'exécution s'est correctement déroulée, 
     *                  FALSE sinon et "inexistant" si le panier avait déjà été
     *                  détruit ou n'avait jamais été créé.
     */
    public function vider_panier()
    {
        $vide = FALSE;
        if(!isset($_SESSION['panier']['verouille']) || $_SESSION['panier']['verouille'] == FALSE)
        {
            if(isset($_SESSION['panier']))
            {
                unset($_SESSION['panier']);
                if(!isset($_SESSION['panier']))
                {
                    $vide = TRUE;
                }   
            }
            else
            {
                /* Le panier était éjà détruit, on renvoie une autre valeur exploitable au retour */
                $vide="inexistant";
            }  
        }
        redirect(site_url("Client/Accueil"));
        //return $vide;  
    }


/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
/*                  Fonctions annexes de gestion du panier                     */
/* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Mise en place d'un tableau contenant les données récupérer 
     * 
     * @param Int           $idProd référence de l'article à ajouter/modifier
     * @param Int           $qte    nombre de produit commander par le client
     * @return Array        Renvoie un tableau contenant les données reçu sur          
     *                      le produits
     */
        public function transfert($id, $qte)
    {
        $select = array();
        $select['idProd'] = (int)$id;
        $select['qte'] = (int)$qte;
        $this->load->model('Produit_model');
        $produit = $this->Produit_model->produit($select['idProd']);
        
        $select['prixUnit'] =(int)$produit[0]->prix_produit;
        $select['prixTot'] = $select['qte']*$select['prixUnit'];
        
        return($select);
            
    }
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    /**
     * Vérifie la quantité enregistrée d'un article dans le panier
     * 
     * @param Int           $idProd référence de l'article à vérifier
     * @return Mixed        Renvoie le nombre d'article s'il y en a, ou FALSE 
     *                      si cet article est absent du panier
     */
    public function nombre_articles($idProd)
    {
        /* On initialise la variable de retour */
        $nombre = FALSE;
        /* Comptage du panier */
        $nb_art = count($_SESSION['panier']['idProd']);
        /* On parcoure le panier à la recherche de l'article pour vérifier
           le cas échéant combien sont enregistrés */
        for($i=0;$i<$nb_art;$i++)
        {
            if($_SESSION['panier']['idProd'][$i] == $idProd)
            {
                $nombre = $_SESSION['panier']['qte'][$i];
            }
        }
        return $nombre;
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Calcule le montant total du panier
     *  
     * @return Double
     */
    public function montant_panier()
    {
        /* On initialise le montant */
        $montant=0;
        /* Comptage des articles du panier */
        $nb_article=count($_SESSION['panier']['idProd']);
        /* On va calculer le total par article */
        for($i=0;$i<$nb_article;$i++)
        {
            $montant+=$_SESSION['panier']['qte'][$i]*$_SESSION['panier']['prixTot'][$i];
        }
        /* On retourne le résultat */
        return $montant;
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Vérifie la présence d'un article dans le panier
     * 
     * @param Int       $ref_article référence de l'article à vérifier
     * @return boolean  Renvoie TRUE si l'article est trouvé dnas le panier, FALSE sinon
     */
    public function verif_panier($ref_article)
    {
        /* On initialise la variable de retour */
        $present = FALSE;
        /* On vérifie les numéros de références des articles et on compare avec l'article à vérifier */
        if(count($_SESSION['panier']['idProd'])>0 && array_search($ref_article,$_SESSION['panier']['idProd']) !== FALSE)
            {
             $present=TRUE;
            }
        return $present;
    }   

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    /**
     * Sauvegarde automatique du panier dans la table client 
     * 
     * @param Int           $id     référence du client du panier
     * @param string        $CartSafe    Panier du client convertie en String
     */
    
    function sauvegarde_panier($id)
    {
        $CartSafe= serialize($_SESSION['panier']);
        $this->load->model('Client_model');
        $this->Client_model->SauvegardePanier($id,$CartSafe);
    }
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */
    
    /**
     * Chargement dans le panier du dernier panier effectué par le client 
     * 
     * @param string        $CartLoad Sauvegarde du panier du client en String
     * @param Array         $_SESSION['panier'] Renvoie un tableau contenant les données reçu sur          
     *                      l'ancien panier
     */
    
    function chargement_panier($CartLoad)
    {
        $_SESSION['panier']= unserialize($CartLoad);
    }
    
    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Fontion de verouillage du panier pendant la phase de paiement
     * 
     */
    function preparerPaiement()
    {
        $_SESSION['panier']['verrouille']= TRUE;
        header("Location:URL_DU_SITE_DE_BANQUE");
    }

    /* ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ */

    /**
     * Fonction qui va enregistrer les informations de la commande dans 
     * la base de données et détruire le panier.
     * 
     */
    function paiementAccepte()
    {
        /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
        /*     Stockage du panier dans la BDD       */
        /*   ajoutez ici votre code d'insertion     */
        /*~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~*/
        unset($_SESSION['panier']);
    }

}
?>
