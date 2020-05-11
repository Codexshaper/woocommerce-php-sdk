<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Tag extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/tags';
}
