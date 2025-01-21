<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use TCG\Voyager\Facades\Voyager;

class QuestionResource extends JsonResource
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
            'title' => $this->title,
            'image' => Voyager::image($this->image),
            'title_image' => Voyager::image($this->title_image),
            'category' => new CategoryResource($this->category),
            'answer' => $this->answer,
            'choices' => ChoiceResource::collection($this->choices)
        ];
    }
}
