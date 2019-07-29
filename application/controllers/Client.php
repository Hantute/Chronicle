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
         *   \@author   Aurélien Hantute
         *   \date    11/06/2019
         */

        public function Accueil()
        {
            // On affiche une ligne de salutation puis le nom, et le prénom de l'Utilisateur, si il a déjà un compte et qu'il s'est connecté.
            $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

            // On charge la vue et on apparaitre le resultat sur la page Accueil

            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView["citation"]=$citation;

            $this->load->view('inclusion/navbar',$aView);
            $this->load->view('Accueil',$aView);

            /*if($this->session->user)
            {
                $this->load->model('Client_model');
                $client = $this->Client_model->liste();
                $aView["client"]=$client;
                $this->load->view("Accueil",$aView);
            }
            else {
                $this->load->view('Accueil',$aView);
            }*/
        }

        public function Inscription()
        {
            $this->load->library('proverbe');
            $citation=$this->proverbe->lesproverbes();
            $aView['citation']=$citation;

            // On appelle la fonction validation de formulaire, qui va vérifier si les données sont bonnes et on définit les données qu'on considère obligatoire
            $this->form_validation->set_rules('nom_client','nom', 'required|regex_match[/^[A-Za-zéèà^¨ù-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('prenom_client','prenom', 'required|regex_match[/^[A-Za-zçéèà^¨ù-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('pseudo_client','pseudo', 'required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('date_naissance_client','date_naissance','required|regex_match[/^[0-9][0-9]?\/[0-9][0-9]?\/[0-9][0-9]([0-9][0-9])?$/]',
                array('required'=>'Erreur dans le champs %s'));
            $this->form_validation->set_rules('mot_de_passe','motdepasse', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\\"#à]{1,}[0-9A-Za-z]{0,}$/] ',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('e_mail_client','email', "required|regex_match[[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?]",
                array('required'=>'Erreur dans le champ %s'));

           // récupération des données du formulaire
           $data = $this->input->post();

           // Condition mise en place pour vérifier si les données du formulaire sont conforme, si c'est le ca, on ajoute le client dans la base de données
            if ($this->form_validation->run() == TRUE)
            {
                $this->load->model('Client_model');
                $aCreation = $this->Client_model->Inscription();
                $aCreation['Inscription']= $aCreation;
                redirect (site_url("Client/Accueil"));
            }
            else {
                  $this->form_validation->set_message('required','Erreur');
            }
            $this->load->view("CreationClient",$aView);
        }


        public function Connexion()
        {

            $this->load->library("proverbe");
            $citation= $this->proverbe->lesproverbes();
            $aView['citation'] = $citation;

            $this->form_validation->set_rules('pseudo_client','pseudo_client','required',
                array ('required'=>'Erreur dans le champs %s'));
            $this->form_validation->set_rules('mot_de_passe', 'mot_de_passe','required',
                array ('required' => 'Erreurs dans le champs %s'));

            $data= $this->input->post();

            if($this->form_validation->run() == TRUE)
            {
                $this->load->model("Client_model");
                $personne = $this->Client_model->Connexion();
                return $personne;
                redirect(site_url("Client/Accueil"));
            }
            else{
                $this->load->view("ConnexionClient",$aView);
                }
        }

        public function Modification()
        {
            $this->load->library("proverbe");
            $citation= $this->proverbe->lesproverbes();
            $Modification['citation'] = $citation;

            $this->form_validation->set_rules('nom_client','nom', 'required|regex_match[/^[A-Za-zéèà^¨ù-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('prenom_client','prenom', 'required|regex_match[/^[A-Za-zçéèà^¨ù-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('pseudo_client','pseudo', 'required|regex_match[/^[0-9A-Za-z\sèéêàùâîôûöïä_-]{0,}$/]',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('date_naissance_client','date_naissance','required|regex_match[/^[0-9][0-9]?\/[0-9][0-9]?\/[0-9][0-9]([0-9][0-9])?$/]',
                array('required'=>'Erreur dans le champs %s'));
            $this->form_validation->set_rules('mot_de_passe','motdepasse', 'required|regex_match[/^[0-9A-Za-zéèà@ç]{0,}[-(_^*+\/\\"#à]{1,}[0-9A-Za-z]{0,}$/] ',
                array('required'=>'Erreur dans le champ %s'));
            $this->form_validation->set_rules('e_mail_client','email', "required|regex_match[[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?]",
                array('required'=>'Erreur dans le champ %s'));

           $data = $this->input->post();

           $this->load->model("Client_model");
           $client = $this->Client_model->liste($this->session->user->id_client);
           $Modification["client"] = $client;

           if($this->form_validation->run() == TRUE)
           {
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
                $this->load->view('CompteClient', $Modification);
                $this->form_validation->set_message('rule','Error Message');
           }
        }


        public function Deconnexion()
        {
            $this->session->user = null;
            redirect(site_url("Client/Accueil"));
        }


        public function Test()
        {
          $aView["Salutation"]= "<i>Salve, esto paratus sit vivere fabulosa valebat. </i><br> Bonjour, Soyez pret a vivre une aventure fabuleuse.";

          // On charge la vue et on apparaitre le resultat sur la page Accueil

          $this->load->library('proverbe');
          $citation=$this->proverbe->lesproverbes();
          $titre="test";
          $aView["titre"]=$titre;
          $aView["citation"]=$citation;


          $this->load->view('Header',$aView);
        }
}
?>
