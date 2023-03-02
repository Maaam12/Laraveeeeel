<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
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

        return view('patients.index', compact('patients', 'doctors', 'request'));

        
    }

    public function create()
    {
        // return view('patients/create');
        return view('patients/create',[
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
        return redirect('patient')->with('success', 'Patient created successfully.');
    }

    public function show(Patient $patient)
    {
        return view('patients/show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        return view('patients/edit', [
            "doctor" => Doctor::all(),
            "patient" => $patient,
        ]);
    }

    public function update(Request $request, Patient $patient)
    {

        $rules =[
            'id_patient' => 'required',
            'name' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'date' => 'required',
            'doctor_id' => 'required',
    ];
        $validateData = $request->validate($rules);
        Patient::where('id', $patient->id)->update($validateData);
        return redirect('patient')->with('Successfully','Data Berhasil DiUbah !');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        return redirect('patient')->with('success', 'Patient deleted successfully');
    }

    public function doctor() {
        $data_doctor = Doctor::all();
        $data_patient = Patient::with('doctor')->get();
        return view('doctor.index', compact('data_doctor', 'data_patient'));
        
    }

}
