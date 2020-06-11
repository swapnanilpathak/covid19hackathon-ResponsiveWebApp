<?php

define('__CONFIG__',true);
require_once("include/config.php");
$passid=-1;
if(isset($_POST['passid'])){
	$passid = (int)$_POST['passid'];
}

$query = $con->prepare("SELECT fullname FROM personalpass where id = :id");
$query->bindParam("id",$passid);
$query->execute();
$data = $query->fetch(PDO::FETCH_ASSOC);

$fn = $data['fullname'];

require('fpdf.php');


$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);
$pdf->Cell(45,10,"Personal pass generated for :");
$pdf->ln();
$pdf->Cell(45,30,"Name : ".$fn);
$pdf->Output();
?>