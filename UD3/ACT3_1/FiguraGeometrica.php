<?php class FiguraGeometrica
{
    protected String $color;

    public function __construct(string $color)
    {
        $this->color = $color;
    }

    public function toString(): void
    {
        echo "Color: " . $this->color;
    }
}
