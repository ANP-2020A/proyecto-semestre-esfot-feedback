<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

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
        $answers = [];
        $user = Auth::user();
        if ($user->role == "ROLE_STUDENT") {
            $answers = new AnswerCollection($this->answers->where('FK_idUser', $user->id));
        } else {
            $answers = new AnswerCollection($this->answers);
        }
        return [
            'id' => $this->id,
            'Topic' => $this->Topic,
            'Objetives' => $this->Objetives,
            'Subject' => "/api/subjects/" . $this->FK_idSubject,
            'answers' => $answers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
