<?php

namespace App;



class Category extends GMS
{
    /*
     * Default values for attributes
     *
     * @var array
     * */
    protected $attributes = [
        'image' => self::DEFAULT_IMAGE_PATH,
        'parent_company_id' => 1
    ];


    /*
     * Assign a relation with Client class
     *
     * @param void
     * @return collection App\Client
     * */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
