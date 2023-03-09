<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class Payed implements IStateProduct
{
    public function getOptionState(): array
    {
        return ['certified'];
    }
}
