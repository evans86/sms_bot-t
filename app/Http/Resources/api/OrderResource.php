<?php

namespace App\Http\Resources\api;

use App\Models\Order\SmsOrder;
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
            'status' => (integer)$this->status,
            'codes' => json_decode($this->codes),
            'country' => $this->country,
            'operator' => $this->operator,
            'service' => $this->service,
            'cost' => $this->price / 100
        ];
    }

    /**
     * @param SmsOrder $order
     * @return array
     */
    public static function generateOrderArray(SmsOrder $order): array
    {
        return [
            'id' => (integer)$order->org_id,
            'phone' => $order->phone,
            'time' => $order->time,
            'status' => (integer)$order->status,
            'codes' => $order->codes,
            'country' => $order->country,
            'operator' => $order->operator,
            'service' => $order->service,
            'cost' => $order->price / 100
        ];
    }
}
