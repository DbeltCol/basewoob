<?php

namespace Service\TaxProduct;

use Interfaces\IDrink;

class Water implements IDrink
{

    private $tax = 0;

    public function calculateBill(int $price):int
    {
        return $price += $price * $this->tax;
    }
}
