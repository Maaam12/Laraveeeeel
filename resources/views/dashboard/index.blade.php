<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.108.0">
    <title>Dashboard Template · Bootstrap v5.3</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>
    @include('dashboard.layouts.header')

    <div class="container-fluid">
        <div class="row">
            @include('dashboard.layouts.sidebar')
            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                @yield('container')
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 margin-tb">
                            <div class="mt-3">
                                <h2>Patient</h2>
                            </div>
                            <div class="card-body">
                                <a href="{{ url('/dashboard/patient/create') }}" class="btn btn-outline-primary mb-4 mt-3">Add Patient</a>
                                <!-- <a href="{{ url('/patient') }}" class="btn btn-success">View Patient</a> -->
                            </div>

                            <!-- <div class="col-md-8">
                                <div class="row">
                                    <form action="/dashboard/patients/index">
                                        <div class="col-md-4">
                                            <form action="{{ url('/dashboard/patients') }}" method="GET">
                                                @csrf
                                                <select class="form-select" name="doctor_id">
                                                    <option value="0">-- Semua Doctor --</option>
                                                    @foreach ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}" {{ $doctor->id == $request->doctor_id ? 'selected' : '' }}>{{ $doctor->name }}</option>
                                                    @endforeach
                                                </select>
                                            </form>

                                        </div>
                                        <div class="col-md-12">
                                            <form action="{{ url('/dashboard/patient') }}" method="GET">
                                                @csrf
                                                <div class="input-group mb-3">
                                                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" name="name" value="{{ request('name') }}">
                                                    <input type="hidden" name="doctor_id" value="{{ request('doctor_id') }}">
                                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                                                </div>
                                            </form>
                                        </div>
                                </div> -->

                            <div class="col-md-8">
                                <form action="{{ route('dashboard.patients.index') }}" method="GET">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <select class="form-select" name="doctor_id">
                                                <option class="text-center" value="0">---- All Doctors ----</option>
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
                                    <th scope="col">Action</th>
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
                                    <td>
                                        <form action="{{ url('dashboard/patient/' . $patient->id) }}" method="post">
                                            {!! csrf_field() !!}
                                            @method("DELETE")
                                            <a href="{{ url('dashboard/patient/' . $patient->id . '/edit') }}" class="btn btn-success">Edit</a>
                                            <a href="{{ url('dashboard/patient/' . $patient->id) }}" class="btn btn-primary">Show</a>
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $patients->links()}}


                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script>
    <script src="/js/dashboard.js"></script>
</body>

</html>