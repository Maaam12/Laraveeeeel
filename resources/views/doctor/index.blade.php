@extends('layout.main')
@section('container')
<div class="row">
    <div class="col-10">
        <h1 class="mt-3">Doctor List</h1>
        <p> </p>
        <table class="table">
            <thead class="table-info">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Address</th>
                    <th scope="col">Specialist</th>
                    <th scope="col">Patient Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_doctor as $doctor)
                <tr>
                    <th scope="row">{{ $doctor->doctor_id }}</th>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->address }}</td>
                    <td>{{ $doctor->specialist }}</td>
                    <td>
                        @foreach ($doctor->patient as $patient)
                            <li>{{ $patient->name }}</li>
                        @endforeach
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@stop