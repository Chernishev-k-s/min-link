<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LinkResource extends JsonResource
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
            'url'           => $this->url,
            'short'         => route('link.show', ['hash' => $this->hash]),
            'expired_at'    => $this->expired_at,
            'expired_use'   => $this->expired_use,
        ];
    }
}
