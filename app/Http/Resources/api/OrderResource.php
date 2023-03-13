<?php

namespace App\Http\Resources\api;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->org_id,
            'phone' => $this->phone,
            'time' => (integer)$this->time,
            'status' => $this->status,
            'codes' => json_decode($this->codes),
        ];
    }
}
