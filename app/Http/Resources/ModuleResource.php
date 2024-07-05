<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ModuleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $thumbPath = storage_path('app/public/thumbnail/' . $this->thumbnail);

        return [
            'id' => $this->id,
            'title' => $this->title,
            'thumbnail' =>  $thumbPath,
            'created_at' => $this->created_at,
        ];
    }
}
