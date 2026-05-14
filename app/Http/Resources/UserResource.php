<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'         => $this->id,
            'first_name' => $this->first_name,
            'last_name'  => $this->last_name,
            'name'       => $this->name,
            'email'      => $this->email,
            'image'      => $this->image,
            'provider'   => $this->provider,
            'last_login' => $this->last_login,
            'type'       => $this->type,
            'created_at' => $this->created_at,
            
        ];
    }
}