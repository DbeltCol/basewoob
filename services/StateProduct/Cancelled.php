<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class Cancelled implements IStateProduct
{
    public function getOptionState(): array
    {
        return [];
    }
}
