<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
       $dep = Department::getDepartment();

        return  DepartmentResource::collection($dep);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param DepartmentRequest $request
     * @return DepartmentResource
     */
    public function store(DepartmentRequest $request): DepartmentResource
    {
        $department = Department::create($request->validated());
        return new DepartmentResource($department);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return DepartmentResource
     */
    public function show(Department $department): DepartmentResource
    {
        //TODO вывести ошибку
       return new DepartmentResource($department);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param DepartmentRequest $request
     * @param Department $department
     * @return DepartmentResource
     */
    public function update(DepartmentRequest $request, Department $department): DepartmentResource
    {
        $department->update($request->validated());
        return new DepartmentResource($department);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Department $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department): \Illuminate\Http\Response
    {
        $department->delete();
        return response(null, 204);

    }
}
