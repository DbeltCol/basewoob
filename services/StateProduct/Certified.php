<?php namespace Service\StateProduct;

use Interfaces\IStateProduct;

class Certified implements IStateProduct
{
    public function getOptionState(): array
    {
        return ['cancelled','payed','billed'];
    }
}
