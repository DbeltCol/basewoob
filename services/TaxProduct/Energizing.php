<?php

namespace Service\TaxProduct;

use Interfaces\IDrink;

class Energizing implements IDrink
{

    private $tax = 0.10;

    public function calculateBill(int $price):int
    {
        return $price += $price * $this->tax;
    }
}
