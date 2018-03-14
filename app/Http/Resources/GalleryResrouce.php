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
            'id' => $request->id,
            'image' => $request->image,
            'product_id' => $request->product_id
        ];
    }
}
