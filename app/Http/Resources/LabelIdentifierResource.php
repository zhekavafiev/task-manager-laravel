<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LabelIdentifierResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd($this->all());
        foreach ($this->all() as $key => $label) {
            $result[$key]['id'] = $label->id;
            $result[$key]['text'] = $label->text;
            $result[$key]['color'] = $label->color;
        }
        // dd($result);
        return $result ?? null;
    }
}
