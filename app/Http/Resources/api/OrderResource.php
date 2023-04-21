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
     * @return array|\Illuminate\Contracts\Support\Arrayable
     */
    public function toArray($request)
    {
        return [
            'id' => (integer)$this->org_id,
            'phone' => $this->phone,
            'time' => (integer)$this->start_time,
            'status' => (integer)$this->status,
            'codes' => json_decode($this->codes),
            'country' => $this->country->org_id,
            'service' => $this->service,
            'cost' => $this->price_final / 100
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
            'time' => $order->start_time,
            'status' => (integer)$order->status,
            'codes' => $order->codes,
            'country' => $order->country->org_id,
            'operator' => $order->operator,
            'service' => $order->service,
            'cost' => $order->price_final / 100
        ];
    }
}
