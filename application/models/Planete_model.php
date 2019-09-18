<?php
if(!defined('BASEPATH')) exit ('No direct script access allowed');

class Planete_model extends CI_Model
{
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

        Public function liste()
        {
            $requete= $this->db->query("SELECT * FROM planete");
            $planete = $requete->result();
            return $planete;
        }    
    
    
}
