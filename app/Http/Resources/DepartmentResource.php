<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
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
            'name' => $this->name,
            'emp_count' =>$this->emp_count,
            'max_salary' =>$this->max_salary,
            //'employee' => EmployeeResource::collection($this->employee),
        ];
    }
}
