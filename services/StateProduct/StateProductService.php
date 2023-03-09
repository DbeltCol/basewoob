<?php

namespace Service\StateProduct;

class StateProductService
{
    const STRATEGY = [
        'billed' => Billed::class,
        'cancelled' => Cancelled::class,
        'in_transit' => InTransit::class,
        'certified' => Certified::class,
        'destintation' => Destination::class,
        'payed' => Payed::class
    ];
}
