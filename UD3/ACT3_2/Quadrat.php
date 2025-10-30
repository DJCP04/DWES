<?php

class Quadrat extends FiguraGeometrica
{

    public function __construct(string $color,  float $costat)
    {
        parent::__construct($color);
        $this->costat = $costat;
    }
    public function calculaArea(): float
    {
        return pow($this->costat, 2);
    }
}
