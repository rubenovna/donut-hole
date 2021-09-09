<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class Department extends Model
{
    /**
     * Model
     * @property int id
     * @property string name
     * @property int emp_count
     * @property int max_salary
     * @property Carbon $created_at
     * @property Carbon $updated_at
     */
    use HasFactory;
    use SoftDeletes;

    protected $table = 'departments';

    protected $fillable = [
        'id',
        'name',
    ];


    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Employee::class, 'department_employees', 'department_id', 'employee_id');
    }

    public static function getDepartment()
    {
        return DB::table('departments')
             ->selectRaw('departments.id, departments.name, count(employees.id) as emp_count, max(employees.salary) as max_salary')
             ->join('department_employees',  'departments.id', '=', 'department_employees.department_id')
             ->join('employees',  'department_employees.employee_id', '=', 'employees.id')
             ->groupBy('departments.id')
             ->paginate();


        /*select d.id, d.name, count(emps.id) as emp_count, max(emps.salary) as max_salary from departments d
join department_employees de on d.id=de.department_id
join employees emps on de.employee_id=emps.id group by d.id;*/

    }
}
