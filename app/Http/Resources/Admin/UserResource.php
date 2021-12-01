<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            // 'id' => $this->id,
            'name' => $this->name,
            // 'lastname' => $this->lastname,
            // 'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
