<?php namespace Service\TaxProduct;

use Interfaces\IDrink;

class TaxProductService{

    public function getTotalPrice(int $price, IDrink $tax)
    {
        return $tax->calculateBill($price);
    }
}
