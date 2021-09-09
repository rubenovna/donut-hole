<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name . ' ' .$this->surname . ' '. $this->patronymic,
            'gender' => $this->gender,
            'salary' => $this->salary,
           // 'department' => DepartmentResource::collection($this->department),
        ];
    }
}
