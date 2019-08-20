<?php

namespace medrex\mercadopago\Facades;

use Illuminate\Support\Facades\Facade;

class mercadopago extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'mercadopago';
    }
}
