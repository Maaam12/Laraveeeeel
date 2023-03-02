@extends('layout.main')
@section('container')
<div class="card">
<div class="card-header">Create Page</div>
<div class="card-body">

    <form action="{{ url('patient') }}" method="post">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="id_patient">ID</label>
            <input type="text" name="id_patient" id="id_patient" class="form-control">
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" class="form-control">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input type="date" name="date" id="date" class="form-control">
        </div>
        <div class="form-group">
            <label for="doctor_name">Doctor Name</label>
            <!-- <input type="text" name="doctor_name" id="doctor_name" class="form-control"> -->
            <select class="form-select" name="doctor_id" id="doctor_id">
                    @foreach ($doctor as $doctor)
                        <option value="{{ $doctor->id }}">{{ $doctor->name }}</option>
                    @endforeach
            </select>
            {{-- <input doctor="form-control"id="id_patient" name="id_patient" value="{{ $siswa->kelas->kelas }}"> --}}
        </div>
        <p> </p>
        <a href="{{ url('patient') }}" class="btn btn-success">Back</a>
        <input type="submit" value="Create" class="btn btn-success">
    </form>

</div>
</div>
@stop