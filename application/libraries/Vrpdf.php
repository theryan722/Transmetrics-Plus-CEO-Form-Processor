<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require(APPPATH.'libraries/Fpdf.php');

class Vrpdf extends Fpdf
{
    var $filename = '';
    // Extend FPDF using this class
    // More at fpdf.org -> Tutorials
    function __construct($orientation='P', $unit='in', $size='Letter')
    {
        // Call parent constructor
        parent::__construct($orientation,$unit,$size);
    }
    
    function Header() {
        
    }
    
    function Footer() {
        $this->SetY(-5.5);
        $this->SetFont('Arial', '', 8);
        $this->Cell(0,10,$this->PageNo(),0,0,'C');
        $this->Ln(0.2);
        $this->Cell(0,10,'Form Revised Date: 11/1/18',0,0,'L');
        $this->Cell(0,10,$this->filename, 0, 0, 'R');
    }
  
}
