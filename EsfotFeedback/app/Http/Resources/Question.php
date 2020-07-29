<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Question extends JsonResource
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
            'Type' => $this->Type,
            'Text' => $this->Text,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
