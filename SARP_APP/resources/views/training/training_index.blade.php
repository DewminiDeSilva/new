<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    !-- Add jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Add Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} "> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
     

     
    <title>Training Program</title>
</head>
<body>
@include('dashboard.dashboardC')
    @csrf
    <div class="container">
    <div class="container-fluid">
        <div class="center-heading" style="text-align: center;">
            <h1>Training Program Details</h1>
        </div>

        <div class="d-flex justify-content-end">
            <a class="btn btn-primary" href="{{ route('training.create') }}">Add Training Program</a>
        </div>

        
    
        <div class="row table-container">
            <div class="col">
                <table  class="table table-bordered ">
</div>
        <thead class="thead-light">
            <tr>
             
                <th scope="col">Program</th>
                <th scope="col">Males</th>
                <th scope="col">Females</th>
                <th scope="col">Youth</th>
                <th scope="col">Senior</th>
                <th scope="col">Date</th>
                <th scope="col">Location</th>
                <th scope="col">Program Conductor</th>
                <th scope="col">Cost</th>
                <th scope="col">Province</th>
                <th scope="col">District</th>
                <th scope="col">DSD</th>
                <th scope="col">GND</th>
                <th scope="col">ASC</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trainings as $training)
            <tr>
                <td>{{ $training->program_name }}</td>
                <td>{{ $training->male }}</td>
                <td>{{ $training->female }}</td>
                <td>{{ $training->youth }}</td>
                <td>{{ $training->senior }}</td>
                <td>{{ $training->date }}</td>
                <td>{{ $training->place }}</td>
                <td>{{ $training->conductor_name }}</td>
                <td>{{ $training->conductor_payment }}</td>
                <td>{{ $training->province }}</td>
                <td>{{ $training->district }}</td>
                <td>{{ $training->ds_division }}</td>
                <td>{{ $training->gn_division}}</td>
                <td>{{ $training->as_center}}</td>

                
                <td>
                   <div class="d-flex">
                        <a class="btn btn-primary  mr-2" href='training/{{$training->id}}/edit'>Edit</a>

                        <form action="/training/{{ $training->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</a>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>