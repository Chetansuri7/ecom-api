<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'productId'=> $this->id,
            'productSKU'=> $this->sku,
            'productName'=> $this->name,
            'productListPrice'=> $this->list_price,
            'productSalePrice'=> $this->sale_price,
            'productDiscount'=> $this->discount,
            'productTax'=> $this->tax,
            'productPhoto'=> $this->photo,
            'productDescription'=> $this->product_description,
            'productWarranty'=> $this->warranty,
            'productMerchandising Keyword'=> $this->merchandising_keyword,
            'productIsHotProduct'=> $this->is_hot_product,
            'productIsNewArrival'=> $this->is_new_arrival,
        
            
            ];
        
    }
}
