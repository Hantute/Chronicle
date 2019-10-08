<?php
defined('BASEPATH') OR exit ('No direct script access allowed');

/** \brief      Contient toute les fonctions se rapportant à la table Bataille.
 *  \class      [Bataille] de la BDD chronicle
 *  \brief      Création de la class Bataille_model extension de la classe CI_Model chargé de gérer toute les functions interagissant avec la table Bataille de la BDD chronicle
 *  \details    Elle est composé de 1 fonctions "public": liste ;
 *  @author     AHantute
 *  \date       02/09/2019
 */

 class Bataille_model extends CI_Model
 {

        /** \brief     Fonction liste qui permet d'afficher la page liste
         *  \details   Elle permet d'afficher la page de liste de bataille, de naviguer a travers le site grâce a sa barre de navigation.
         *  \param     salutation    Affiche la phrase de salutation.
         *  \param     nom        Affiche le nom de l'utilisateur.
         *  \param     Citation   Affiche le résultat de la function proverbe.
         *  \param     aView      Affiche toute les données qu'on veux faire apparaitre sur la page de la liste.
         *  \@author   AHantute
         *  \date      17/06/2019
         */

        public function listeB()
            {
            $requete = $this->db->query ("SELECT * FROM bataille");
            $abataille = $requete->result();
            return $abataille;
            }

        public function Selection_date($id)
            {
            $requete = $this->db->query ("SELECT * FROM bataille WHERE id_bataille =?",array($id));
            $selection= $requete->result();
            return $selection;
            }

        public function archiveB()
        {
            $requete= $this->db->query("SELECT * FROM bataille 
                JOIN participe On participe.id_bataille = bataille.id_bataille
                JOIN vaisseau ON vaisseau.id_vaisseau = participe.id_vaisseau
                JOIN groupe_de_combat ON groupe_de_combat.id_groupe = vaisseau.id_groupe
                JOIN flotte ON flotte.id_flotte = groupe_de_combat.flotte_id_flotte");
            $archive= $requete->result();
            return $archive;
        }
      
        public function ajoutB()
        {
            $this->db->insert('Bataille',$data);
        }
      
        public function modificationB()
        {
            
        }
        
        public function suppressionB()
        {
            
        }
}
