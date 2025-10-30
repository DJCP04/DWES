<?php
require_once "FiguraGeometrica.php";

class Quadrat extends FiguraGeometrica
{
    private float $costat;

    function __construct(string $color, float $costat)
    {
        parent::__construct($color);
        $this->costat = $costat;
    }

    function calculaArea(): float
    {
        return pow($this->costat, 2);
    }
    function __toString(): string
    {
        return "Esto es un cuadrado con " . $this->costat . " costat";
    }
}
