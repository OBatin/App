<?php

/**
 *
 * @author Batin
 */

namespace App\Cache;

interface Cache
{

    /**
     * @param $key string
     * @param $value string
     * @return mixed
     */
    public function set($key, $value);

    /**
     * @param $key
     * @return mixed
     */
    public function get($key);

    /**
     * @param $key string
     * @return string
     */
    public function getKey($key);
}
