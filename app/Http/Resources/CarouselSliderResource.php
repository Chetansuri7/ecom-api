<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CarouselSliderResource extends JsonResource
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
            'id'=>$this->id,
            'carouselSliderName'=> $this->name,
            'carouselSliderImage' => $this->carousel_sliders_Image,
            'carouselSliderSlotNumber' => $this->carousel_sliders_slot_number,
            ];
    }
}
