<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Systeme_model extends CI_Model
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        Public function listeS()
        {
            $requete= $this->db->query("SELECT * FROM systeme");
            $planete = $requete->result();
            return $planete;
        }    
    
//******************************************************************************        
        public function DetailS($id)
        {
            $requete=$this->db->query("SELECT *FROM systeme WHERE id_systeme=?",array($id));
            $chantier= $requete->row();
            return $chantier;
        }
        
        
}
