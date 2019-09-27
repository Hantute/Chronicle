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
     *   \@author   AHantute
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

       $this->load->model('Bataille_model');
       $bataille = $this->Bataille_model->liste();

       $this->load->model('Groupe_model');
       $groupe = $this->Groupe_model->liste();

       $this->load->model('Flotte_model');
       $flotte = $this->Flotte_model->liste();

       $this->load->model('Vaisseau_model');
       $vaisseau = $this->Vaisseau_model->liste();
       


       $aView["bataille"] = $bataille;
       $aView["participe"] = $participe;
       $aView["groupe"] = $groupe;
       $aView["flotte"] = $flotte;
       $aView["vaisseau"] = $vaisseau;

       $this->load->view('inclusion/navbar',$aView);
       $this->load->view("participe/liste",$aView);
       $this->load->view('inclusion/footer',$aView);
     }

     public function Detail()
     {
        $titre = " Détail de la bataille";
        $aView["titre"] = $titre;

        $aView["Salutation"]="<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

        $this->load->library('proverbe');
        $citation=$this->proverbe->lesproverbes();
        $aView["citation"]=$citation;

        $this->load->model('Participe_model');
        $participe = $this->Participe_model->liste();
        $aView['listeP']=$participe;

        $this->load->model('Bataille_model');
        $bataille = $this->Bataille_model->liste();
        $aView['listeB']=$bataille;

        $this->load->model('Groupe_model');
        $groupe = $this->Groupe_model->liste();
        $aView['listeG']=$groupe;

        $this->load->model('Flotte_model');
        $flotte = $this->Flotte_model->liste();
        $aView['listeF']=$flotte;


         $this->load->view('inclusion/navbar',$aView);
         $this->load->view("produit/liste",$aView);
         $this->load->view('inclusion/footer',$aView);
     }

        public function ajoutP(){

            /*$titre = " ajout d'un rapport de bataille";
            $aView["titre"] = $titre;

            $aView["Salutation"]="<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;*/

            if($this->session->user /*&& $this->session->user->id_autorisation == "1"*/)
            {
                $this->load->model('Participe_model');
                $participe = $this->Participe_model->liste();
                $aView["participe"] = $participe;

                $this->load->model('Bataille_model');
                $bataille = $this->Bataille_model->liste();
                $aView['bataille']=$bataille;

                $this->load->model('Vaisseau_model');
                $vaisseau = $this->Vaisseau_model->liste();
                $aView["vaisseau"] = $vaisseau;

                $this->form_validation->set_rules('id_bataille', 'bataille', 'required',
                        array ('required'=>'Erreur dans le champs %s'));
                $this->form_validation->set_rules('id_vaisseau','vaisseau', 'required',
                        array('required'=>'Erreur dans le champs %s'));
                $this->form_validation->set_rules('Rapport', 'rapport', 'required',
                        array('required'=>'Erreur dans le champs %s'));

                        if($this->form_validation->run() == TRUE)
                        {
                            $data= $this->input->post();
                            var_dump($data);

                            $this->load->model('Participe_model');
                            $ajout= $this->Participe_model->ajout();
                            redirect(site_url("Bataille/Liste"));
                        }
                        else
                        {
                            $this->form_validation->set_message('required','Erreur');
                            //$this->load->view('inclusion/navbar',$aView);
                            $this->load->view("participe/ajoutP",$aView);
                            //$this->load->view('inclusion/footer',$aView); 
                        }
            }
            else 
               {
                redirect(site_url("Client/Accueil"));
                }
        }


        public function Choix_vaisseauP($id_bataille)
            {
            $this->load->model("Participe_model");
            $choix = $this->Participe_model->Choix_vaisseau($id_bataille);

            if ($choix  != null) {
                $this->load->model("Vaisseau_model");
                $vaisseau= $this->Vaisseau_model->Choix_vaisseau();}
            else {
                    $this->load->model("Vaisseau_model");
                    $vaisseau = $this->Vaisseau_model->liste();
                }
            $aView["choix"]=$choix;
            $aView["vaisseau"]= $vaisseau;
            $this->load->view("autre/vaisseau", $aView);
            }

        public function Selection_date($id_bataille)
        {
            //$choix_bataille=$id_bataille;
            $this->load->model("Bataille_model");
            $selection = $this->Bataille_model->Selection_date($id_bataille);
            $aView["selection_date"]=$selection;
            $this->load->view("autre/date",$aView);

        }

        /*public function controle_debut($choix_bataille)
        {
            echo "Bonjour CD";
            var_dump($choix_bataille);
            $this->load->model("Bataille_model");
            $selection = $this->Bataille_model->Selection_date($choix_bataille);
            var_dump($selection);

            $data= $this->input->post();
            var_dump($data);
            foreach($selection as $row)
            {
            var_dump($row->date_debut_bataille);
            //if ( )
            {
            }
        }*/

}
