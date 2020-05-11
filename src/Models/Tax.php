<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class Tax extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'taxes';
}
