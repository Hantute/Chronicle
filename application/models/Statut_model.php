<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

/** \brief Contient tout les liens/jointures se rapportant à la table statut.
 *  \class [statut] de la BDD chronicle.
 *  \brief Création de la class parente statut_model extension de la classe CI_Model chargé de gérer toute les intéractions se rapportant à la table statut de la BDD chronicle
 *  \details Elle est composé de x fonctions statut_vaisseau, statut_groupe, statut_flotte, statut_escadrille, statut_appareil
 *  @author Aurélien Hantute
 *  \date 26/06/2019
 */

class Statut_model extends date_construction_modele
{

      public function statut_flotte()
              {

              }

      public function statut_groupe()
              {

              }

      public function statut_vaisseau($statut)
              {
                $requete = $this->db->query("SELECT * FROM statut
                JOIN vaisseau ON vaisseau.id_statut = statut.id_statut WHERE vaisseau.id_statut=?", array($statut));
                $Vstatut = $requete->row();
                return $Vstatut;
              }

      public function statut_escadrille()
              {

              }

      public function statut_appareil()
              {

              }

}






 ?>
