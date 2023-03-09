<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class Destination implements IStateProduct
{
    public function getOptionState(): array
    {
        return ['cancelled','payed'];
    }
}
