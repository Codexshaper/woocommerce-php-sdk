<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Review extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'products/reviews';
}
