<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class answer extends JsonResource
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
            'FK_idUser' => $this->FK_idUser,
            'FK_idChapter' => $this->FK_idChapter,
            'FK_idQuestion' => $this->FK_idQuestion,
            'user_subject_id' => $this->user_subject_id,
            'Value' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            ];
    }
}
