<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class InTransit implements IStateProduct
{
    public function getOptionState(): array
    {
        return ['cancelled','destination'];
    }
}
