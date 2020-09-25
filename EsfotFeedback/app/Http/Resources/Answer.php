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

            'User' => "/api/user/" . $this->id_user,
            'Chapter' => "/api/chapter/" . $this->id_chapter,
            'question_ud' => "/api/question/" . $this->question_id,
            'Subjesct_User' => "/api/subject_Users/" . $this->user_subject_id,
            'question_text' => $this->question->text,
            'Value' => $this->email,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            ];
    }
}
