<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>

    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/pagination.css')}} ">    overrite navbar need to check        --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">

    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    @include('dashboard.navbar')
</head>
<body>

    {{-- <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;"> --}}
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
    
   





    <div class="container-fluid">
        <div class="center-heading" style="text-align: center;">
            <h1>Beneficiary Details</h1>
        </div>
       
                <!-- Search form -->
                <form method="GET" action="{{ route('search') }}">
                    <div class="input-group mt-3 mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Search beneficiary">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                          </div>
                    </div>
                    </form>
                   
                    <div class="form-group">
                        <div class="d-flex justify-content-between">
                <a href="{{ route('beneficiary.create') }}" class="btn btn-primary"> + Add New </button>
                <a href="{{route('download.csv')}}"  class="btn btn-primary">Generate CSV Report</a>
                
            </div>
                    
            </div>
            
           
    
        </div>
       
        <div class="row table-container">
            <div class="col">
                
                <table id="beneficiariesTable" class="table table-bordered  table-sm">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">NIC</th>
                            <th scope="col">First Name</th>
                            <th scope="col">Last Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Date Of Birth</th>
                            <th scope="col">gender</th>
                            <th scope="col">Age</th>
                            <th scope="col">phone</th>
                            <th scope="col">Income</th>
                            <th scope="col">Family Members</th>
                            <th scope="col">Education level</th>
                            <th scope="col">Land Ownership</th>
                            <th scope="col">Province</th>
                            <th scope="col">District</th>
                            <th scope="col">DS Division</th>
                            <th scope="col">GN Division</th>
                            <th scope="col">ASC</th>
                            <th scope="col">Tank Name</th>
                            <th scope="col">Account Name</th>
                            <th scope="col">Account Number</th>
                            <th scope="col">Latitude</th>
                            <th scope="col">Longitude</th>
                            <th scope="col">Actions</th> 
                            <th scope="col">Actions</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                       
                        @foreach ($beneficiaries as $beneficiary)
                        <tr>
                            <td>{{$beneficiary->nic}}</td>
                            <td>{{$beneficiary->first_name}}</td>
                            <td>{{$beneficiary->last_name}}</td>
                            <td>{{$beneficiary->address}}</td>
                            <td>{{$beneficiary->dob}}</td>
                            <td>{{$beneficiary->gender}}</td>
                            <td>{{$beneficiary->age}}</td>
                            <td>{{$beneficiary->phone}}</td>
                            <td>{{$beneficiary->income}}</td>
                            <td>{{$beneficiary->family_members_count}}</td>
                            <td>{{$beneficiary->education}}</td>
                            <td>{{$beneficiary->land_ownership}}</td>
                            <td>{{$beneficiary->province_name}}</td>
                            <td>{{$beneficiary->district_name}}</td>
                            <td>{{$beneficiary->ds_division_name}}</td>
                            <td>{{$beneficiary->gn_division_name}}</td>
                            <td>{{$beneficiary->as_center}}</td>
                            <td>{{$beneficiary->tank_name}}</td>
                            <td>{{$beneficiary->acc_name}}</td>
                            <td>{{$beneficiary->acc_number}}</td>
                            <td>{{$beneficiary->latitude}}</td>
                            <td>{{$beneficiary->longitude}}</td>

                            <td>
                                
                                <a href="{{ route('beneficiary.show', $beneficiary->id) }}" class="btn btn-info btn-sm">View Details</a>

                                <a href="{{ route('family/create', ['beneficiaryId' => $beneficiary->id]) }}" class="btn btn-primary btn-sm" type="button">Add Members</a>
                            
                            </td>
                            
                            <td>
                                
                            {{-- </td> --}}
                            {{-- <td> --}}
                                {{-- <a href="{{ route('beneficiary/edit', ['id' => $beneficiary->id]) }}" class="btn btn-primary">Edit</a>
                                <a href="{{ route('beneficiary/delete', ['id' => $beneficiary->id]) }}" class="btn btn-danger">Delete</a> --}}
                                <a href="beneficiary/{{$beneficiary->id}}/edit" class="btn btn-primary btn-sm">Edit</a>
                            {{-- </td> --}}
                            {{-- <td> --}}
                                
                                <form action="beneficiary/{{$beneficiary->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        
                        
                        </tbody>
                </table>
            
        
    


    
<!-- Pagination Section -->
<nav aria-label="Page navigation example">
    <ul class="pagination">
        <li class="page-item {{ $beneficiaries->onFirstPage() ? 'disabled' : '' }}">
            <a class="page-link" href="{{ $beneficiaries->previousPageUrl() }}" tabindex="-1" aria-disabled="true">Previous</a>
        </li>
        @for ($i = 1; $i <= $beneficiaries->lastPage(); $i++)
            <li class="page-item {{ $i == $beneficiaries->currentPage() ? 'active' : '' }}">
                <a class="page-link" href="{{ $beneficiaries->url($i) }}">{{ $i }}</a>
            </li>
        @endfor
        <li class="page-item {{ $beneficiaries->hasMorePages() ? '' : 'disabled' }}">
            <a class="page-link" href="{{ $beneficiaries->nextPageUrl() }}">Next</a>
        </li>
    </ul>
</nav>



<h1>BAR CHART </h1>
<div id="donut-chart"></div>
<div id="myChart" style="width:100%;max-width:600px"></div>

                </nav>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>



    
    @foreach ($beneficiaries as $beneficiary)
    {{-- popup modal --}}
    <!-- Bootstrap modal code -->
{{-- <div class="modal fade" id="editBeneficiary" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true"> --}}
 <!-- Modal for editing beneficiary -->
 <div class="modal fade" id="editBeneficiary{{ $beneficiary->id }}" tabindex="-1" role="dialog" aria-labelledby="editBeneficiaryLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editBeneficiaryLabel">Edit Beneficiary Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Edit form goes here -->
                <form id="editBeneficiaryForm" method="POST" action="{{ route('beneficiary.update', $beneficiary->id) }}">
                    {{-- <form class="form-horizontal" id="editBeneficiaryForm" method="POST" action="/beneficiary/{{$beneficiary->id}}"> --}}
                    @csrf
                    @method('PUT')
                    <!-- Form fields for editing beneficiary details -->
                   
                    <div class="form-group">
                        <label for="editNic">NIC</label>
                        <input type="text" class="form-control" name="nic">
                    </div>
                    <div class="form-group">
                        <label for="editFirstName">First Name</label>
                        <input type="text" class="form-control" name="first_name">
                    </div>
                    <div class="form-group">
                        <label for="editlastName">Last Name</label>
                        <input type="text" class="form-control" name="last_name">
                    </div>
                    <div class="form-group">
                        <label for="editAddress">Address</label>
                        <input type="text" class="form-control" name="address">
                    </div>
                    <div class="form-group">
                        <label for="editDob">Date Of Birth</label>
                        <input type="text" class="form-control" name="dob">
                    </div>
                    <div class="form-group">
                        <label for="editGender">Gender</label>
                        <input type="text" class="form-control" name="gender">
                    </div>
                    <div class="form-group">
                        <label for="editAge">Age</label>
                        <input type="text" class="form-control" name="age">
                    </div>
                    <div class="form-group">
                        <label for="editPhone">Phone</label>
                        <input type="text" class="form-control" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="editIncome">Income</label>
                        <input type="text" class="form-control" name="income">
                    </div>
                    <div class="form-group">
                        <label for="editFamilyMembersCount">Family Members Count</label>
                        <input type="text" class="form-control" name="family_members_count">
                    </div>
                    <div class="form-group">
                        <label for="editEducation">Education Level</label>
                        <input type="text" class="form-control" name="education">
                    </div>
                    <div class="form-group">
                        <label for="editLandOwnership">Land Ownership </label>
                        <input type="text" class="form-control" name="land_ownership">
                    </div>

                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach






{{-- PIE CHART TEST --}}
<script src=
"https://d3js.org/d3.v4.min.js"></script>
<script src=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.js"></script>
<link rel="stylesheet"
      href=
"https://cdn.jsdelivr.net/npm/billboard.js/dist/billboard.min.css" />
<link rel=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"
      type="text/css" />
 
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>
<script src=
"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js">
</script>
 
<script src=
"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.1/Chart.min.js">
</script>


<style>
    body {
        text-align: center;
        color: green;
    }
 
    h2 {
        text-align: center;
        font-family: "Verdana", sans-serif;
        font-size: 40px;
    }
</style>



</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>


{{-- <script>
  


    let chart = bb.generate({
        data: {
            columns: [
                ["Male", {{ $maleCount }}],
                ["Female", {{ $femaleCount }}],
            ],
            type: "pie",
            onclick: function (d, i) {
                console.log("onclick", d, i);
            },
            onover: function (d, i) {
                console.log("onover", d, i);
            },
            onout: function (d, i) {
                console.log("onout", d, i);
            },
        },
        donut: {
            title: "Beneficiaries by Gender",
        },
        bindto: "#donut-chart",
    });
</script> --}}

            {{-- <a href="{{ route('beneficiary/create') }}" class="btn btn-primary">Add Beneficiary</a> --}}
            <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
            <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

        </body>
</html>