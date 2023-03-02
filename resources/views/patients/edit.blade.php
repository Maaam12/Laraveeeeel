@extends('layout.main')
@section('container')
<p> </p>
<div class="card">
<div class="card-header">Edit Page</div>
<div class="card-body">
    
    <form action="{{ url('patient/' . $patient->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <div class="form-group">
            <label for="id_patient">ID</label>
            <h1> </h1>
            <input type="text" name="id_patient" id="id_patient" class="form-control" value="{{ $patient->id_patient }}">
            <p> </p>
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <h1> </h1>
            <input type="text" name="name" id="name" class="form-control" value="{{ $patient->name }}">
            <p> </p>
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <h1> </h1>
            <input type="text" name="address" id="address" class="form-control" value="{{ $patient->address }}">
            <p> </p>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <h1> </h1>
            <input type="text" name="phone" id="phone" class="form-control" value="{{ $patient->phone }}">
            <!-- <p> </p> -->
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <h1> </h1>
            <input type="date" name="date" id="date" class="form-control" value="{{ $patient->date }}">
            <p> </p>
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor Name</label>
            <h1> </h1>
            <!-- <input type="text" name="doctor_name" id="doctor_name" class="form-control" value="{{ $patient->doctor_name }}"> -->
            <select class="form-select" name="doctor_id" id="doctor_id">
                    @foreach ($doctor as $doctor)
                            <option name="{{ $doctor->id }}" value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
            </select>
            {{-- <input doctor="form-control"id="id_patient" name="id_patient" value="{{ $doctor->name }}"> --}}
            <p> </p>
        </div>
        <p> </p>
        <a href="{{ url('patient') }}" class="btn btn-success">Back</a>
        <input type="submit" value="Update" class="btn btn-success">
    </form>
</div>
</div>
@stop