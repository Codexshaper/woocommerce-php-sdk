<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Product extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products';
}
