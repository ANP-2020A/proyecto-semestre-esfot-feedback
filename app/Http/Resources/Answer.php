<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Answer extends JsonResource
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

            'User' => "/api/user/" . $this->FK_idUser,
            'Chapter' => "/api/chapter/" . $this->FK_idChapter,
            'Question' => "/api/question/" . $this->FK_idQuestion,
            'Subjesct_User' => "/api/subject_Users/" . $this->user_subject_id,
            'Value' => $this->Value,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
