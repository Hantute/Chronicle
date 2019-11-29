<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proverbe 
{
    protected $CI;
    
    // We'll use a constructor, as you can't directly call a function
    // from a property definition.
    public function __construct()
    {
        // Assign the CodeIgniter super-object
        $this->CI =& get_instance();
    }
    
    public function lesproverbes()
    {
        $aleatoire=mt_rand(1,10);
        
        switch ($aleatoire)
        {
            case"1":
                $citation="Une hirondelle ne fait pas le Printemps.";
                break;
                
            case"2":
                $citation="Avec du temps et de la patience, on vient à bout de tout.";
                break;
                
            case"3":
                $citation="Les paroles s'envolent, les écrits restent.";
                break;
                
            case"4":
                $citation="En octobre tonnerre, vendanges prospères.";
                break;
                
            case"5":
                $citation="Si il gèle à la Saint-Sulpice, le printemps sera propice.";
                break;
                
            case"6":
                $citation="L'arbre tombe toujours du côté où il penche.";
                break;
                
            case"7":
                $citation="D'un petit gland sourd naît un grand chêne.";
                break;
                
            case"8":
                $citation="C'est l'intention qui compte.";
                break;
                
            case"9":
                $citation="L'enfer est pavé de bonne intention.";
                break;
                
            case"10":
                $citation="Mai frileux: an langoureux. Mai fleuri: an réjoui. Mai venteux: an douteux.";
                break;
        }
        return $citation;
        
    }
}
//$citation= proverbe();
//echo "$citation";
        
?>