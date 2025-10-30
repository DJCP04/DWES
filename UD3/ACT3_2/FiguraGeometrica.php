<?php

abstract class FiguraGeometrica
{

    function __construct(
        protected string $color
    ) {}

    abstract public function calculaArea(): float;
}
