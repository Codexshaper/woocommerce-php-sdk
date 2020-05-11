<?php

namespace Codexshaper\WooCommerce\PHP;

use Automattic\WooCommerce\Client;
use Codexshaper\WooCommerce\PHP\Traits\WooCommerceTrait;

class WooCommerce
{
    use WooCommerceTrait;

    /**
     *@var \Automattic\WooCommerce\Client
     */
    protected $client;

    /**
     *@var array
     */
    protected $headers = [];

    /**
     * Build Woocommerce connection.
     *
     * @return void
     */

    protected $properties = [];

    /**
     * Get  Inaccessible Property.
     *
     * @param string $name
     *
     * @return int|string|array|object|null
     */
    public function __get($name)
    {
        return $this->$name;
    }

    /**
     * Set Option.
     *
     * @param string $name
     * @param string $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __call($method, $parameters)
    {
        if (!method_exists($this, $method)) {
            preg_match_all('/((?:^|[A-Z])[a-z]+)/', $method, $partials);
            $method = array_shift($partials[0]);
            if (!method_exists($this, $method)) {
                throw new \Exception('Sorry! you are calling wrong method');
            }
            array_unshift($parameters, strtolower(implode('_', $partials[0])));
        }

        return $this->$method(...$parameters);
    }

    public static function __callStatic($method, $parameters)
    {
        return (new static() )->$method(...$parameters);
    }
    
    public function __construct()
    {
        try {
            $this->headers = [
                'header_total'       => config('woocommerce.header_total') ?? 'X-WP-Total',
                'header_total_pages' => config('woocommerce.header_total_pages') ?? 'X-WP-TotalPages',
            ];

            $this->client = new Client(
                config('woocommerce.store_url'),
                config('woocommerce.consumer_key'),
                config('woocommerce.consumer_secret'),
                [
                    'version'           => 'wc/'.config('woocommerce.api_version'),
                    'wp_api'            => config('woocommerce.wp_api_integration'),
                    'verify_ssl'        => config('woocommerce.verify_ssl'),
                    'query_string_auth' => config('woocommerce.query_string_auth'),
                    'timeout'           => config('woocommerce.timeout'),
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), 1);
        }
    }
}
