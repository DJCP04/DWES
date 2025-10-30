<?php

class Quadrat extends FiguraGeometrica
{
    public  string $color;
    public  float $costat;

    public  function __construct(string $color, float $costat)
    {
        $this->color = $color;
        $this->costat = $costat;
    }
    public  function calculaArea(): float
    {
        return pow($this->costat, 2);
    }
}
