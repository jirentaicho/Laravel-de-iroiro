<?php

namespace App\MaruValidationSet\SampleModel;

class SampleModel{

    private string $name;

    private int $point;

    public function __construct(string $name, int $point)
    {
        $this->name = $name;
        $this->point = $point;
    }

    public function overPoint() : bool
    {
        return $this->point > 99;
    }

    public function isMisaka() : bool
    {
        return $this->name === "misaka";
    }

}