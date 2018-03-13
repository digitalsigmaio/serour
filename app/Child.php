<?php

namespace App;



class Child extends GMS
{
    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'logo' => self::DEFAULT_IMAGE_PATH,
        'parent_company_id' => 1
    ];

}
