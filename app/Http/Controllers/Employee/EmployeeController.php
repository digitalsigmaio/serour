<?php

namespace App\Http\Controllers\Employee;

use App\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Transformers\EmployeeTransformer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $employees = Employee::all();

        if($request->wantsJson()){
            return  fractal()
                ->collection($employees)
                ->transformWith(new EmployeeTransformer)
                ->toArray();
        }

        return view('employees', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newEmployee');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeRequest $request)
    {
        $employee = new Employee;
        $employee->ar_first_name = $request->ar_first_name;
        $employee->en_first_name = $request->en_first_name;
        $employee->ar_last_name = $request->ar_last_name;
        $employee->en_last_name = $request->en_last_name;
        $employee->ar_position = $request->ar_position;
        $employee->en_position = $request->en_position;
        $employee->gender = $request->gender;
        $employee->phone = (string) $request->phone;
        $employee->email = $request->email;
        $employee->save();
        /*
         * Here stands logo upload function
         * */
        $employee->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($employee)
                ->transformWith(new EmployeeTransformer)
                ->toArray();
        }

        return redirect()->route('employees');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee, Request $request)
    {
        if($request->wantsJson()){
            return  fractal()
                ->item($employee)
                ->transformWith(new EmployeeTransformer)
                ->toArray();
        }

        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('editEmployee', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $employee->ar_first_name = $request->ar_first_name;
        $employee->en_first_name = $request->en_first_name;
        $employee->ar_last_name = $request->ar_last_name;
        $employee->en_last_name = $request->en_last_name;
        $employee->ar_position = $request->ar_position;
        $employee->en_position = $request->en_position;
        $employee->gender = $request->gender;
        $employee->phone = (string) $request->phone;
        $employee->email = $request->email;
        $employee->save();
        /*
         * Here stands logo upload function
         * */
        $employee->uploadImage($request);



        if($request->wantsJson()){
            return  fractal()
                ->item($employee)
                ->transformWith(new EmployeeTransformer)
                ->toArray();
        }

        return redirect()->route('employees');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {

        File::delete($employee->image);
        $employee->delete();


        return redirect()->route('employees');
    }
}
