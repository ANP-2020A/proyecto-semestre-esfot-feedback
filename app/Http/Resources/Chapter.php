<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Chapter extends JsonResource
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
            'Topic' => $this->Topic,
            'Objetives' => $this->Objetives,
            'Subject' => "/api/subjects/" . $this->FK_idSubject,
            'answers' => new AnswerCollection($this->answers),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
