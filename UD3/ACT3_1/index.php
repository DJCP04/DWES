<?php
require_once "FiguraGeometrica.php";
require_once "Cercle.php";
require_once "Quadrat.php";

// CIRCULO
$cercle = new Cercle("rojo", 1);
echo ($cercle->__toString());
echo "<br>";

echo ("El area es de " . $cercle->calculaArea());

echo "<br>";

//CUADRADO
$cuadrado = new Quadrat("rosa", 3);
echo ($cuadrado->__toString());
echo "<br>";

echo ("El area es de " . $cuadrado->calculaArea() . "u");
