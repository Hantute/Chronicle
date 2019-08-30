<?php
defined ('BASEPATH') OR exit ('No direct script access allowed');

class Participe extends CI_Controller
{
    /** \brief   Fonction liste qui permet d'afficher liste des batailles
     *   \details Elle permet d'afficher la page d'accueil, de naviguer a travers le site grâce a sa barre de navigation, et de s'inscrire et/ou se connecter avec son compte.
     *   \param   prenom     Affiche le prenom de l'utilisateur.
     *   \param   nom        Affiche le nom de l'utilisateur.
     *   \param   Citation   Affiche le résultat de la function proverbe.
     *   \param   aView      Affiche toute les données qu'on veux faire apparaitre sur la page liste des batailles
     *   \@author   Aurélien Hantute
     *   \date    02/07/2019
     */

     public function Liste()
     {

       $titre= "Liste des batailles livrés";
       $aView["titre"]=$titre;

       $aView["Salutation"]="<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

       $this->load->library('proverbe');
       $citation=$this->proverbe->lesproverbes();
       $aView["citation"]=$citation;

       $this->load->model('Participe_model');
       $participe = $this->Participe_model->liste();
       $aView["participe"] = $participe;

       $this->load->view('inclusion/navbar',$aView);
       $this->load->view("participe/liste",$aView);
       $this->load->view('inclusion/footer',$aView);
     }







}
