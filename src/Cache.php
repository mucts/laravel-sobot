<?php
/**
 * This file is part of the mucts.com.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @version 1.0
 * @author herry<yuandeng@aliyun.com>
 * @copyright © 2020  MuCTS.com All Rights Reserved.
 */

namespace MuCTS\Laravel\Sobot;


class Cache implements \MuCTS\Sobot\Contracts\Cache
{

    public function set(string $key, $value, $tts): bool
    {
        return \Illuminate\Support\Facades\Cache::put($key, $value, $tts);
    }

    public function get(string $key)
    {
        return \Illuminate\Support\Facades\Cache::get($key);
    }

    public function exists(string $key): bool
    {
        return \Illuminate\Support\Facades\Cache::has($key);
    }
}