<?php

namespace Codexshaper\WooCommerce\PHP\Models;

use Codexshaper\WooCommerce\PHP\Traits\QueryBuilderTrait;

class TaxClass extends BaseModel
{
    use QueryBuilderTrait;

    protected $endpoint = 'taxes/classes';
}
