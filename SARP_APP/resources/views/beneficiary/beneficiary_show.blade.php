<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Details</title>
<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Font Awesome CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<style>
    /* Custom styling */
    body {
        background-color: #f8f9fa;
        font-family: Arial, sans-serif;
    }
    .container {
        max-width: 900px;
        margin: auto;
        padding-top: 50px;
    }
    .beneficiary-section,
    .family-section {
        background-color: #fff;
        border-radius: 10px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .beneficiary-section h1,
    .family-section h2 {
        text-align: center;
        margin-bottom: 30px;
        
    }
    .beneficiary-details,
    .family-members {
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .beneficiary-details p,
    .family-member p {
        margin: 5px 0;
    }
    .icon-container {
        margin-top: 10px;
    }
    .icon-container a {
        margin-right: 10px;
    }
</style>

</head>
<body>
    @include('dashboard.navbar')

    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Beneficiary Details Section -->
                <div class="beneficiary-section">
                    <h1>Beneficiary Details</h1>
                    <div class="beneficiary-details">
                    <div class="row">
                        <div class="col-md-3">
                            <h4>ID:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->id}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4>First Name:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->first_name}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Last Name:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->last_name}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Phone:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->phone}}</p>
                        </div>
                        <!-- Add other beneficiary details as needed -->
                        <div class="col-md-3">
                            <h4>NIC:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->nic}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4>Gender:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->gender}}</p>
                        </div>
                        <div class="col-md-3">
                            <h4>dob:</h4>
                        </div>
                        <div class="col-md-9">
                            <p>{{$beneficiary->dob}}</p>
                        </div>
                        <div class="col-md-3">
                        <h4>Address:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->address}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Phone:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->phone}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Income:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->income}}</p>
                    </div>
                  

                    <div class="col-md-3">
                        <h4>Family Members Count:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->family_members_count}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Education:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->education}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Land Ownership:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->land_ownership}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Age:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->age}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>Province Name:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->province_name}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>District Name:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->district_name}}</p>
                    </div>
                    <div class="col-md-3">
                        <h4>DS Division Name:</h4>
                    </div>
                    <div class="col-md-9">
                        <p>{{$beneficiary->ds_division_name}}</p>
                    </div>
                        <!-- Add more beneficiary details here -->
                    </div>
                </div>

                <!-- Family Member Details Section -->
                <div class="family-section">
                    <h2>Family Members:</h2>
                    <div class="row">
                        @foreach($beneficiary->family as $familyMember)
                        <div class="col-md-6">
                            <div class="family-member">
                                <h4>{{$familyMember->first_name}} {{$familyMember->last_name}}</h4>
                                <p>ID: {{$familyMember->id}}</p>
                                <p>Phone: {{$familyMember->phone}}</p>
                                <p>Gender: {{$familyMember->gender}}</p>
                                <p>Date of Birth: {{$familyMember->dob}}</p>
                                <p>Youth: {{$familyMember->youth}}</p>
                                <p>Education: {{$familyMember->education}}</p>
                                <p>Employment: {{$familyMember->employment}}</p>
                                <p>Nutrition Level: {{$familyMember->nutrition_level}}</p>
                                <!-- Add other family member details as needed -->
                                <div class="icon-container">
                                    <a href="" class="text-primary me-2"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-primary  mr-2" href='/family/{{$familyMember->id}}/edit'>Edit</a>
                                    <form action="/family/{{ $familyMember->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Font Awesome JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
</body>
</html>
