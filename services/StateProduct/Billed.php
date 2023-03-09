<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class Billed implements IStateProduct
{
    public function getOptionState(): array
    {
        return ['certified','payed'];
    }
}
