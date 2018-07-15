<?php
require_once("af7.php");
$name="Karan Prasad"; 
$rank=300;
$branch="UIT IT";
if(!$name || !$rank)
{
    echo "<h3>Error:</h1><p>This page was called incorrectly</p>";
}
else
{
    //generate header
    header('Content-Type: application/msword');
    //header('Content-Disposition: inline, filename=cert.rtf');
    $date=date('F d, Y');
    //open our template file
    $filename='PHPCertification.rtf';
    $output=file_get_contents($filename);
    
    //replace the place holder
    $output=str_replace('<<NAME>>',strtoupper($name),$output);
    $output=str_replace('<<RANK>>',$rank,$output);
	$output=str_replace('<<BRANCH>>',$branch,$output);
	
    //$output=str_replace('<<mm/dd/yyyy>>',$date,$output);
    echo $output;
}
?>