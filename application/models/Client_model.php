<?php
defined("BASEPATH") OR exit ("No direct script access allowed");

class Client_model extends CI_Model
{
    public function liste()
    {
        $requete = $this->db->query ("SELECT * FROM client");
        $aClient = $requete->result();
        return $aClient;
    }
    
    
    public function Inscription()
    {
        //$statut = "2";
        $Date = date("Y-m-d");
        $data = $this->input->post();
        unset($data["envoyer"]);
        $data["mot_de_passe"] = password_hash($data["mot_de_passe"], PASSWORD_DEFAULT);
        $data["date_inscription_client"] = $Date;
        //$data["id_autorisation"]= $statut;
        $this->db->insert("client", $data);
    }

    
    public function Connexion()
    {
        $Date = date ("Y-m-d H:i:s");
        
        // On récupère les données rentrés par l'utilisateur pour se connecter
        $data = $this->input->post();
        
        $pseudo = $data["pseudo_client"];
        $secu = $data["mot_de_passe"];
        
        // On récupère les données enregistrer dans la base de données client
        
        $personne = $this->db->query("SELECT * FROM client WHERE pseudo_client=?", $pseudo)->row();
        
        if($personne)
        {
            if(password_verify($secu, $personne->mot_de_passe))
            {
                $derco["date_dernière_connexion"]=$Date;
                $this->db->where('pseudo_client', $pseudo);
                $this->db->update('client',$derco);
                $this->session->user = $personne;
                redirect(site_url("Client/Accueil"));
            }
            else
            {
                $this->session->user = null;
                redirect(site_url("Client/ConnexionClient"));
            }
        }
        else
        {
            $this->session->user = null;
            redirect(site_url("Client/ConnexionClient"));
        }
    }
     
    public function Modif($id_client)
    {
        $client = $this->session->user->id_client;
        $data = $this->input->post();
        //$Date = date("Y-m-d H:i:s");
        unset ($data["modifier"]);
        //$data["date_modification_client"]=$Date;
        $data["mot_de_passe"] = password_hash($data["mot_de_passe"], PASSWORD_DEFAULT);
        $id_client = $this->input->post();
        $this->db->WHERE ('id_client', $client);
        $this->db->UPDATE("client", $data);
    }
}
?>