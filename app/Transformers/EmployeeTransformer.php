<?php
/**
 * Created by PhpStorm.
 * User: Manson
 * Date: 11/26/2017
 * Time: 11:13 AM
 */
namespace App\Transformers;


use App\Employee;
use League\Fractal\TransformerAbstract;

class EmployeeTransformer extends TransformerAbstract
{
    public function transform(Employee $employee)
    {
        return [
            'ar_name'      => $employee->arFullName(),
            'en_name'      => $employee->enFullName(),
            'ar_position'  => $employee->ar_position,
            'en_position'  => $employee->en_position,
            'gender'    => $employee->gender,
            'phone'     => $employee->phone,
            'email'     => $employee->email,
            'image'     => $employee->image
        ];
    }
}