<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Coupon extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'coupons';
}
