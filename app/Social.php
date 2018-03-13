<?php

namespace App;



class Social extends GMS
{
    /*
     * Default values for attributes
     *
     * @val array
     * */
    protected $attributes = [
        'logo' => self::DEFAULT_IMAGE_PATH,
        'parent_company_id' => 1
    ];
}
