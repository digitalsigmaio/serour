<?php

namespace App;



class Employee extends GMS
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

    public function arFullName()
    {
        return $this->ar_first_name . ' ' . $this->ar_last_name;
    }

    public function enFullName()
    {
        return $this->en_first_name . ' ' . $this->en_last_name;
    }
}
