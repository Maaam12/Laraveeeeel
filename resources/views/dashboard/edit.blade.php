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
                <p> </p>
                <div class="card">
                    <div class="card-header">Edit Page</div>
                    <div class="card-body">

                        <form action="{{ url('dashboard/patient/' . $patient->id) }}" method="post">
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
                            <a href="{{ url('dashboard/patient') }}" class="btn btn-success">Back</a>
                            <input type="submit" value="Update" class="btn btn-success">
                        </form>
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