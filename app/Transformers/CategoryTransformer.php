<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:56 AM
 */
namespace App\Transformers;

use App\Category;
use League\Fractal\TransformerAbstract;

class CategoryTransformer extends TransformerAbstract
{
    protected $availableIncludes = [
        'products'
    ];
    public function transform(Category $category)
    {
        return [
            'id'             => $category->id,
            'ar_name'        => $category->ar_name,
            'en_name'        => $category->en_name,
            'logo'           => $category->image,
        ];
    }

    public function includeProducts(Category $category)
    {
        return $this->collection($category->products, new ProductTransformer);
    }
}