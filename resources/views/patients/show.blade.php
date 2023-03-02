@extends('layout.main')
@section('container')
<!-- <p> </p> -->
<div class="mb-10">
<div class="card">
<div class="card-header">Patient Detail</div>
<div class="card-body">

    <div class="card-body">
        <h5 class="card-title">ID: {{ $patient->id_patient }}</h5>
        <h5 class="card-title">Name: {{ $patient->name }}</h5>
        <p class="card-text">Address: {{ $patient->address }}</p>
        <p class="card-text">Phone: {{ $patient->phone }}</p>
        <p class="card-text">Date: {{ $patient->date }}</p>
        <p class="card-text">Doctor Name: {{ $patient->doctor->name }}</p>
        <a href="{{ url('patient') }}" class="btn btn-success">Back</a>
    </div>
</div>
</div>
</div>
@stop