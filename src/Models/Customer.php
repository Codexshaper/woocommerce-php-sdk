<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Customer extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'customers';

    protected function downloads($id)
    {
        $this->endpoint = "customers/{$id}/downloads";

        return self::all();
    }
}
