@extends('layout.main')
@section('container')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="text-center mt-3    ">
                    <h2>Patient</h2>
                </div>
                <div class="card-body">
                    <!-- <a href="{{ url('/patient/create') }}" class="btn btn-outline-primary">Add Patient</a> -->
                    <!-- <a href="{{ url('/patient') }}" class="btn btn-success">View Patient</a> -->
                </div>

                <div class="col-md-8">
                                <form action="{{ route('patients.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <select class="form-select text-center" name="doctor_id">
                                                <option value="0">---- All Doctors ----</option>
                                                @foreach ($doctors as $doctor)
                                                <option value="{{ $doctor->id }}" {{ $doctor->id == $request->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="name" value="{{ request('name') }}">
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <button class="btn btn-primary w-100" type="submit" id="button-addon2">Search</button>
                                        </div>
                                    </div>
                                </form>
                            </div>

            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr class="table-dark">
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Address</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Date</th>
                        <th scope="col">Doctor Number</th>
                        <!-- <th scope="col">Action</th> -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patients as $patient)
                        <tr>
                            <th scope="row">{{ $patient->id_patient }}</th>
                            <td>{{ $patient->name }}</td>
                            <td>{{ $patient->address }}</td>
                            <td>{{ $patient->phone }}</td>
                            <td>{{ $patient->date }}</td>
                            <td>{{ $patient->doctor->name }}</td>
                            <!-- <td>
                                <form action="{{ url('patient/' . $patient->id) }}" method="post">
                                    {!! csrf_field() !!}
                                    @method("DELETE")
                                    <a href="{{ url('patient/' . $patient->id . '/edit') }}" class="btn btn-success">Edit</a>
                                    <a href="{{ url('patient/' . $patient->id) }}" class="btn btn-primary">Show</a>
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </td> -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $patients->links()}}
        </div>
    </div>
@stop