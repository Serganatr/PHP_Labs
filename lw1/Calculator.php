<?php
class calculator

{
    public int $res = 0;
    public int $number = 0;
    public bool $false = false;
    function sum($number): self
    {
        $this->res += $number;
        return $this;
    }
    function minus($number): self
    {
        $this->res -= $number;
        return $this;
    }
    function product($number): self
    {
        $this->res *= $number;
        return $this;
    }
    function division($number): self
    {
        if ($number === 0) {
            $this->false = true;
        } else {
            $this->res = $this->res / $number;
            return $this;
        }
    }
    function getResult(): int
    {
        if ($this->false === false) {
            return $this->res;
        }
        if ($this->false === true) {
            $this->res = 0;
            return $this->res;
        }
    }
}

$calculator = new calculator();
echo $calculator->sum(3)->sum(3)->minus(3)->division(3)->getResult();
