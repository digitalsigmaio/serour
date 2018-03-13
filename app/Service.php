<?php

namespace App;



class Service extends GMS
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

    /*
     * Constant value for Arabic tagline
     *
     * @var string
     * */
    const AR_TAGLINE = "خدماتنا في الاستثمار فى تكنولوجيا المعلومات , الانتاج , و تطبيقات الهاتف و المحتوى الرقمى بالإضافة إلى التجارة الإلكترونية";

    /*
     * Constant value for English tagline
     *
     * @var string
     * */
    const EN_TAGLINE = "Our services in investing in information technology, production, phone applications and digital content In addition to e-commerce and digital content marketing";

    /*
     * Assign a relation with Client class
     *
     * @param void
     * @return collection App\Client
     * */
    public function clients()
    {
        return $this->belongsToMany(Client::class, 'client_service');
    }

    /*
     * Assign a relation with ServiceImage class
     *
     * @param void
     * @return collection App\ServiceImage
     * */
    public function images()
    {
        return $this->hasMany(ServiceImage::class, 'service_id');
    }
}
