<?php

namespace App\Models;

use App\Http\Requests\EmployeeRequest;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    /**
     * Model
     * @property int id
     * @property string name
     * @property string surname
     * @property string patronymic
     * @property string gender
     * @property int salary
     * @property Carbon $created_at
     * @property Carbon $updated_at
     */
    use HasFactory;
    use SoftDeletes;


    protected $table = 'employees';

    protected $fillable = [
        'name',
        'surname',
        'patronymic',
        'gender',
        'salary',
    ];


    public function department(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_employees', 'employee_id', 'department_id');
    }
}
