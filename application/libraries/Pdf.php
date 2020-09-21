<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/Fpdf.php');

class Pdf extends Fpdf
{
    // Extend FPDF using this class
    // More at fpdf.org -> Tutorials
    function __construct($orientation='P', $unit='in', $size='Letter')
    {
        // Call parent constructor
        parent::__construct($orientation,$unit,$size);
    }
  
}
