<?php

namespace Service\Products;

use Interfaces\IProduct;

class ProductService
{


    public function getAll(array $products, IProduct $output)
    {
        return $output->getAll($products);
    }
}
