<?php
class Cercle extends FiguraGeometrica
{
    private float $radi;

    public function __construct(string $color, float $radi)
    {
        parent::__construct($color);
        $this->radi = $radi;
    }

    public function calculaArea(): float
    {
        return pi() * pow($this->radi, 2);
    }
    public function __toString(): string
    {
        return "Cercle de color " . $this->color . " i radi " . $this->radi;
    }
}
