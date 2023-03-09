<?php

namespace Service\Products;

use Illuminate\Support\Collection;
use Interfaces\IProduct;

class ProductJsonService implements IProduct
{


    public function getAll(array $products):Collection
    {
        return collect($products);
    }
}
