<?php
require_once "FiguraGeometrica.php";
require_once "Cercle.php";
require_once "Quadrat.php";

$cercle = new Cercle("verde", 1);
echo ("El area es de" . $cercle->calculaArea());
