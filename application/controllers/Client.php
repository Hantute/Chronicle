<?php
defined ('BASEPATH') OR exit('No direct script access allowed');


class Client extends CI_Controller
{
        /** \brief   Fonction Accueil qui permet d'afficher la page d'accueil
         *   \details Elle permet d'afficher la page d'accueil, de naviguer a travers le site grâce a sa barre de navigation, et de s'inscrire et/ou se connecter avec son compte.
         *   \param   prenom     Affiche le prenom de l'utilisateur.
         *   \param   nom        Affiche le nom de l'utilisateur.
         *   \param   Citation   Affiche le résultat de la function proverbe.
         *   \param   aView      Affiche toute les données qu'on veux faire apparaitre sur la page d'accueil
         *   \@author   AHantute
         *   \date    11/06/2019
         */

    public function Accueil()
    {
        // On affiche une ligne de salutation puis le nom, et le prénom de l'Utilisateur, si il a déjà un compte et qu'il s'est connecté.
        $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

        // On charge la vue et on apparaitre le resultat sur la page Accueil
        $titre= "Accueil";
        $aView["titre"]=$titre;

        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;

        $this->load->view('inclusion/navbar',$aView);

        if($this->session->user)
        {
            $this->load->model('Client_model');
            $client = $this->Client_model->liste();
            $aView["client"]=$client;
            $this->load->view("client/Accueil",$aView);
        }
        else
        {
            $this->load->view('client/Accueil',$aView);
        }
        $this->load->view("inclusion/footer",$aView);
    }

//******************************************************************************        
    
    /** \brief   Fonction Inscription 
         *   \details               Elle permet d'afficher le formulaire d'inscription de l'utilisateur sur le site
         *   \param   $titre        Variable qui donne le titre de la page.
         *   \param   $data         Variable qui récupère les données envoyer par le formulaire.
         *   \param   Citation      Affiche le résultat de la function proverbe.
         *   \param   aView         Affiche toute les données qu'on veux faire apparaitre sur la page du formulaire
         *   \@author   AHantute
         *   \date    03/12/2019
         */
    
    public function Inscription()
    {
        // On affiche une ligne de salutation puis le nom, et le prénom de l'Utilisateur, si il a déjà un compte et qu'il s'est connecté.
        $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";
        $titre= "Inscription";
        $aView["titre"]=$titre;
        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView['citation']=$citation;

        // récupération des données du formulaire
        $data = $this->input->post();

        // On appelle la fonction validation de formulaire, qui va vérifier si les données sont bonnes et on définit les données qu'on considère obligatoire
        $this->form_validation->set_rules('nom_client','nom', 'required|regex_match[/^[A-Za-zéèà^¨ù-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('prenom_client','prenom', 'required|regex_match[/^[A-Za-zçéèà^¨ù-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('pseudo_client','pseudo', 'required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('mot_de_passe','motdepasse', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\"#à]{1,}[0-9A-Za-z]{0,}$/] ',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('e_mail_client','email', "required|regex_match[/^[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]?$/]",
            array('required'=>'Erreur dans le champ %s'));

        // Condition mise en place pour vérifier si les données du formulaire sont conforme, si c'est le ca, on ajoute le client dans la base de données
        if ($this->form_validation->run() == TRUE)
        {
            $this->load->model('Client_model');
            $aCreation = $this->Client_model->Inscription();
            $aCreation['Inscription']= $aCreation;
            redirect (site_url("Client/Accueil"));
        }
        else
        {
            $this->form_validation->set_message('required','Erreur');
            $this->load->view('inclusion/navbar',$aView);
            $this->load->view("client/CreationClient",$aView);
            $this->load->view("inclusion/footer",$aView);
        }
    }

//******************************************************************************
     
    /** \brief   Fonction Connexion
         *   \details               Elle permet d'afficher la page du formulaire de connexion, permettant à l'utilisateur de se connecter à son compte.
         *   \param   $titre        Variable qui donne le titre de la page.
         *   \param   $data         Variable qui récupère les données envoyer par le formulaire.
         *   \param   $citation     Affiche le résultat de la function proverbe.
         *   \param   aView         Affiche toute les données qu'on veux faire apparaitre sur la page de connexion
         *   \@author   AHantute
         *   \date    11/06/2019
         */
    
    public function Connexion()
    {
        // On affiche une ligne de salutation puis le nom, et le prénom de l'Utilisateur, si il a déjà un compte et qu'il s'est connecté.
        $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";
        $titre= "Connexion";
        $aView["titre"]=$titre;

        $this->load->library("proverbe");
        $citation= $this->proverbe->lesproverbes();
        $aView['citation'] = $citation;

        // On appelle la fonction validation de formulaire, qui va vérifier si les données sont bonnes et on définit les données qu'on considère obligatoire
        $this->form_validation->set_rules('pseudo_client','pseudo', 'required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('mot_de_passe','motdepasse', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\"#à]{1,}[0-9A-Za-z]{0,}$/] ',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('password','password', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\"#à]{1,}[0-9A-Za-z]{0,}$/] ',
            array('required'=>'Erreur dans le champ %s'));

        // On récupère les données envoyer par le formulaire que si elles correspondent aux exigences mise en place pour la sécurité 
        $data= $this->input->post();

        // Condition mise en place pour vérifier si les données du formulaire sont conforme, si c'est le cas, on ajoute le client dans la base de données
        if($this->form_validation->run() == TRUE)
        { 
            // On charge la vue navbar puis on se connecte à la base de donnée client
            $this->load->view('inclusion/navbar',$aView);
            $this->load->model("Client_model");
            $personne = $this->Client_model->Connexion();
            redirect(site_url("Client/Accueil"));
        }
        else
        {
            $this->load->view('inclusion/navbar',$aView);
            $this->load->view("client/ConnexionClient",$aView);
            $this->load->view("inclusion/footer",$aView);
        }
    }

//******************************************************************************        
    
    /** \brief   Fonction Modification
         *   \details               Elle permet d'afficher la page de detail d'un compte d'utilisateur sous forme de formulaire qui permet à l'utilisateur de modifier des données de son compte.
         *   \param   $titre     Variable qui donne le titre de la page.
         *   \param   nom        Affiche le nom de l'utilisateur.
         *   \param   Citation   Affiche le résultat de la function proverbe.
         *   \param   aView      Affiche toute les données qu'on veux faire apparaitre sur la page d'accueil
         *   \@author   AHantute
         *   \date    11/06/2019
         */
    
    public function Modification()
    {
        $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";
        $titre= "Modification du compte utilisateur";
        $aView["titre"]=$titre;

        $this->load->library("proverbe");
        $citation= $this->proverbe->lesproverbes();
        $aView['citation'] = $citation;

        // On appelle la fonction native validation de formulaire, qui va vérifier si les données sont bonnes et on définit les données qu'on considère obligatoire
        $this->form_validation->set_rules('nom_client','nom', 'required|regex_match[/^[A-Za-zéèà^¨ù-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('prenom_client','prenom', 'required|regex_match[/^[A-Za-zçéèà^¨ù-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('pseudo_client','pseudo', 'required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('mot_de_passe','motdepasse', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\#à]{1,}[0-9A-Za-z]{0,}$/] ',
            array('required'=>'Erreur dans le champ %s'));
        $this->form_validation->set_rules('e_mail_client','email', "required|regex_match[/^[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+(?:\.[A-Za-z0-9!#$%&'*+=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9][a-z0-9-]*[a-z0-9]?$/]",
            array('required'=>'Erreur dans le champ %s'));

        // On récupère les données envoyer par le formulaire que si elles correspondent aux exigences mise en place pour la sécurité
        $data = $this->input->post();

        $this->load->view('inclusion/navbar',$aView);
        $this->load->model("Client_model");
        $client = $this->Client_model->liste($this->session->user->id_client);
        $Modification["client"] = $client;

        // Condition mise en place pour vérifier si les données du formulaire sont conforme, si c'est le cas, on ajoute le client dans la base de données
        if($this->form_validation->run() == TRUE)
        {
            $this->load->view('inclusion/navbar',$aView);
            $this->load->model("Client_model");
            $extension = $this->Client_model->Modif($this->session->user->id_client);
            redirect('Client/Accueil');
        }
        else
        {
            if(!$Modification)
            {
                echo"<p> le compte n'éxiste pas dans la base de données.</p>";
                exit;
            }
            $this->load->view('client/CompteClient', $Modification);
            $this->form_validation->set_message('rule','Error Message');
        }
    }

//******************************************************************************
    
    /** \brief   Fonction Accueil qui permet d'afficher la page d'accueil
         *   \details Elle permet d'afficher la page d'accueil, de naviguer a travers le site grâce a sa barre de navigation, et de s'inscrire et/ou se connecter avec son compte.
         *   \param   prenom     Affiche le prenom de l'utilisateur.
         *   \param   nom        Affiche le nom de l'utilisateur.
         *   \param   Citation   Affiche le résultat de la function proverbe.
         *   \param   aView      Affiche toute les données qu'on veux faire apparaitre sur la page d'accueil
         *   \@author   AHantute
         *   \date    11/06/2019
         */
    
    public function Deconnexion()
    {
        // On supprime le panier et on considère la session de l'utilisateur comme null, inexistante 
        unset($_SESSION['panier']);
        $this->session->user = null;
        // On redirige directement l'utilisateur vers la page accueil
        redirect(site_url("Client/Accueil"));
    }

}
?>
