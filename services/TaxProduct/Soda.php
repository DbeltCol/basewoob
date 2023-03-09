<?php

namespace Service\TaxProduct;

use Interfaces\IDrink;

class Soda implements IDrink
{

    private $tax = 0.13;

    public function calculateBill(int $price): int
    {
        return $price += $price * $this->tax;
    }
}
