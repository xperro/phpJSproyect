<?php
require_once 'PHPWord.php';

$PHPWord = new PHPWord();

$document = $PHPWord->loadTemplate('Template.docx');

$document->setValue('descarga', 'Sun');/*
$document->setValue('carga', 'Mercury');
$document->setValue('vdm', 'Venus');
$document->setValue('vcm', 'Earth');
$document->setValue('dispositivo', 'Mars');
$document->setValue('conexion', 'Jupiter');
$document->setValue('vzona', 'Saturn');
$document->setValue('bcomp', 'Uranus');
$document->setValue('valor1', 'Neptun');
$document->setValue('valor2', 'Pluto');
$document->setValue('compania', 'Pluto');

/*

$document->setValue('1', 'Sun');
$document->setValue('2', 'Mercury');
$document->setValue('3', 'Venus');
$document->setValue('4', 'Earth');
$document->setValue('5', 'Mars');
$document->setValue('6', 'Jupiter');
$document->setValue('7', 'Saturn');
$document->setValue('8', 'Uranus');
$document->setValue('9', 'Neptun');
$document->setValue('10', 'Pluto');
$document->setValue('11', 'Sun');
$document->setValue('12', 'Mercury');
$document->setValue('13', 'Venus');
$document->setValue('14', 'Earth');
$document->setValue('15', 'Mars');
$document->setValue('16', 'Jupiter');
$document->setValue('17', 'Saturn');
$document->setValue('18', 'Uranus');
$document->setValue('19', 'Neptun');
$document->setValue('20', 'Pluto');


$document->setValue('fecha', date('H:i'));*/

$document->save('reporte.docx');
?>




