<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $employee = Employee::all();
        return view('employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        // Handle photo update
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  

            $request->photo->move(public_path('images'), $imageName);

            $imagePath =  $imageName;
        }

        Employee::create([
            'name' => $request->name,
            'email' => $request->email,
            'birthdate' => $request->birthdate,
            'gender' => $request->gender,
            'position' => $request->position,
            // get app url http://localhost:8000
            'photo' => url('/'). '/images/'. $imagePath,
            'province' => $request->province,
            'city' => $request->city,
            'district' => $request->district,
            'subdistrict' => $request->subdistrict,
            'address' => $request->address,
            'phone' => $request->phone,
            'notes' => $request->notes,
        ]);

        return redirect()
            ->route('employee.index')
            ->with('message', 'New employee created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'gender' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'province' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'district' => 'nullable|string|max:255',
            'subdistrict' => 'nullable|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);

        $employee = Employee::find($id);
        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->birthdate = $request->birthdate;
        $employee->gender = $request->gender;
        $employee->position = $request->position;

        // Handle photo update
        if ($request->hasFile('photo')) {
            $imageName = time().'.'.$request->photo->extension();  
            $request->photo->move(public_path('images'), $imageName);
            $employee->photo = url('/'). '/images/'. $imageName;
        }

        $employee->province = $request->province;
        $employee->city = $request->city;
        $employee->district = $request->district;
        $employee->subdistrict = $request->subdistrict;
        $employee->address = $request->address;
        $employee->phone = $request->phone;
        $employee->notes = $request->notes;

        $employee->save();

        return redirect()->route('employee.index')->with('message', 'Employee updated successfully');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()
            ->route('employee.index')
            ->with('message', 'Employee deleted successfully');
    }
}
