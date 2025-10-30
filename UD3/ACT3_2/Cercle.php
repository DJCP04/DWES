<?php

class Cercle extends FiguraGeometrica
{

    public function __construct(string $color,  float $radi)
    {
        parent::__construct($color);
        $this->radi = $radi;
    }

    public function calculaArea(): float
    {
        return M_PI * pow($this->radi, 2);
    }
}
