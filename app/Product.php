<?php

namespace App;



class Product extends GMS
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
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_product');
    }

    /*
     * Assign a relation with ProductImage class
     *
     * @param void
     * @return collection App\ProductImage
     * */
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
