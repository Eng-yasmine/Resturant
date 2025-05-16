<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'salary'=> $this->salary,
            'gender'=> $this->gender,
            'national_ID'=> $this->national_ID,
            'address' => $this->address,
            'image' => $this->image,
            'date_of_birth'=> $this->date_of_birth,
            'start_date'=> $this->start_date,
            'position'=> $this->position,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}

