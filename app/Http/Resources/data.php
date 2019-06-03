<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class data extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'username'=>$this->username,
            'password'=>$this->password,
            'email'=>$this->email,
            'phone'=>$this->phone
        ]; 
    }
}
