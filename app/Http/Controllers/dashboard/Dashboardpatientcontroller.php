<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Doctor;

class Dashboardpatientcontroller extends Controller
{
    // public function index(Request $request)
    // {
    //     $doctors = Doctor::all();

    //     $patients = Patient::query()
    //         ->when($request->doctor_id, function ($query) use ($request) {
    //             return $query->where('doctor_id', $request->doctor_id);
    //         })
    //         ->when($request->name, function ($query) use ($request) {
    //             return $query->where('name', 'LIKE', '%' . $request->name . '%');
    //         })
    //         ->paginate(5);

    //     return view('dashboard/index', compact('patients', 'doctors', 'request'));
    // }

    public function index(Request $request)
    {
        $doctors = Doctor::all();

        $patients = Patient::query();

        // search by name
        $patients->when($request->name, function ($query) use ($request) {
            return $query->where('name', 'LIKE', '%' . $request->name . '%');
        });

        // filter by doctor
        $patients->when($request->doctor_id, function ($query) use ($request) {
            return $query->where('doctor_id', $request->doctor_id);
        });

        $patients = $patients->paginate(5);

        return view('dashboard.index', compact('patients', 'doctors', 'request'));
    }

    public function create()
    {
        // return view('patients/create');
        return view('dashboard/create', [
            "doctor" => Doctor::all()
        ]);
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'id_patient' => 'required',
        //     'name' => 'required',
        //     'address' => 'required',
        //     'phone' => 'required',
        //     'date' => 'required',
        //     'room' => 'required',
        // ]);
        // Patient::create($request->all());
        // return redirect()->route('patient.index')->with('success', 'Patient created successfully.');

        $request->validate([
            'id_patient' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',

        ]);
        Patient::create($request->all());
        return redirect('dashboard/patient')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('dashboard/show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('dashboard/edit', [
            "doctor" => Doctor::all(),
            "patient" => $patient,
        ]);
    }

    public function update(Request $request, Patient $patient)
    {

        $rules = [
            'id_patient' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',
        ];
        $validateData = $request->validate($rules);
        Patient::where('id', $patient->id)->update($validateData);
        return redirect('dashboard/patient')->with('Successfully', 'Data Berhasil DiUbah !');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('dashboard/patient')->with('success', 'Patient deleted successfully');
    }

    public function doctor()
    {
        $data_doctor = Doctor::all();
        $data_patient = Patient::with('doctor')->get();
        return view('dashboard.doctor.index', compact('data_doctor', 'data_patient'));
    }
}
