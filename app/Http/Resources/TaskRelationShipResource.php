<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskRelationShipResource extends JsonResource
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
            'creator' => [
                'data' => new CreatorIdentifierResource($this->creator)
            ],
            'assigner' => [
                'data' => new CreatorIdentifierResource($this->assigner)
            ],
            'labels' => [
                'data' => new LabelIdentifierResource($this->label)
            ]
        ];
    }
}
