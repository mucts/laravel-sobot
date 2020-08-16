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

namespace MuCTS\Laravel\Sobot\Facades;


use Illuminate\Support\Facades\Facade;

/**
 * Class Sobot
 * @method static \MuCTS\Laravel\Sobot\Sobot connection(?string $name = null)
 * @mixin \MuCTS\Laravel\Sobot\Sobot
 * @package MuCTS\Laravel\Sobot\Facades
 */
class Sobot extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \MuCTS\Laravel\Sobot\Sobot::class;
    }
}