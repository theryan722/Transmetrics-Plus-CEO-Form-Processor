<?php

function NbLines($pdf, $w,$txt) {

    //Computes the number of lines a MultiCell of width w will take
    $cw=&$pdf->CurrentFont['cw'];

    if($w==0) $w=$pdf->w-$pdf->rMargin-$pdf->x;

    $wmax=($w-2*$pdf->cMargin)*1000/$pdf->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);

    if($nb>0 and $s[$nb-1]=="\n") $nb--;

    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;

    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }

        if($c==' ') $sep=$i;

        $l+=$cw[$c];

        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}

function htmlallentities($str){
    
    $res = '';
    
    $strlen = strlen($str);
    
    for ($i=0; $i<$strlen; $i++){
        
        $byte = ord($str[$i]);
        
        if($byte < 128) // 			1-byte char
        $res .= $str[$i];
        
        elseif($byte < 192);
        // 			invalid utf8
        elseif($byte < 224) // 			2-byte char
        $res .= '&#'.((63&$byte)*64 + (63&ord($str[++$i]))).';';
        
        elseif($byte < 240) // 			3-byte char
        $res .= '&#'.((15&$byte)*4096 + (63&ord($str[++$i]))*64 + (63&ord($str[++$i]))).';';
        
        elseif($byte < 248) // 			4-byte char
        $res .= '&#'.((15&$byte)*262144 + (63&ord($str[++$i]))*4096 + (63&ord($str[++$i]))*64 + (63&ord($str[++$i]))).';';
        
    }
    
    return $res;
    
}