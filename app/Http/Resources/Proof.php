<?php

namespace App\Http\Resources;

use App\Models\Proof as ModelsProof;
use Illuminate\Http\Resources\Json\JsonResource;

class Proof extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'tenant_id' => $this->description,
            'subject' => $this->subject,
            'questions' => new QuestionResource($this->whenLoaded('questions')),
            'discipline' => $this->discipline,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }

}
