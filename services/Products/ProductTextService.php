<?php

namespace Service\Products;

use Interfaces\IProduct;

class ProductTextService implements IProduct{


    public function getAll(array $products)
    {
        $menu = "Id\tNombre\t\tPrecio\n";
        $menu .= str_repeat("=",30) . "\n";

        foreach($products as $product)
        {
            $menu .= $product['name'] . "\t"
            . str_pad($product['precio'], 15,' '). "\t"
            . $product['estado'] . "\n";
        }

        return $menu;
    }

}
