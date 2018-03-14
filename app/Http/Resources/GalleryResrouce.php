<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class GalleryResrouce extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'image' => $this->image,
            'product_id' => $this->product_id
        ];
    }
}
