<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    /*
     * Fetch all device tokens from database
     *
     * @param void
     * @return array $tokens
     * */
    protected static function tokens()
    {
        $tokens = Device::all()->pluck('token')->chunk(500);

        return $tokens->toArray();
    }
}
