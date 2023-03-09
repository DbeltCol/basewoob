<?php

namespace Service\TaxProduct;

use Interfaces\IDrink;

class Alcohol implements IDrink
{

    private $tax = 0.16;

    public function calculateBill(int $price):int
    {
        return $price += $price * $this->tax;
    }
}
