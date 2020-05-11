<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Category extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/categories';
}
