<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Beneficiary Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<link rel="stylesheet" href="{{ asset('assets/css/beneficiary_create.css')}} ">
<script>
    $(function() {
        // Initialize datepicker
        $("#dob").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: '0', // Restrict selection to today or earlier
            changeYear: true, // Allow changing year
            yearRange: '-100:+0', // Allow selection of dates up to 100 years ago
            onSelect: function() {
                calculateAge();
            }
        });

        // Function to calculate age
        function calculateAge() {
            var dob = $("#dob").datepicker("getDate");
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var m = today.getMonth() - dob.getMonth();

            if (m < 0 || (m === 0 && today.getDate() < dob.getDate())) {
                age--;
            }

            $("#age").val(age);
        }

        // Call calculateAge function initially to set the age based on the initial dob value
        calculateAge();
    });
</script>
<style>
    .custom-border {
    border: 2px solid green; /* Change 'red' to any color you prefer */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Adding a box shadow for a box effect */
}
.dropdown-label {
    font-weight: bold;
}
.bold-label {
    font-weight: bold;
}

.color-label {
    color: green; /* Change 'red' to any color you prefer */
}



</style>
    
</head>
<body>
    <!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
               Beneficiary Details successfully Registerd.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


    @include('dashboard.dashboardC')

    <div class="container mt-5 border rounded border p-4 custom-border">
    <form class="form-horizontal" method="POST" action="/beneficiary">
        @csrf



        <div class="col-md-12 text-center">
        <h2 style="color: green; font-weight: bold; font-size: 48px;">Beneficiary Registration</h2>

        </div>
            <div class="container mt-5">
            <div class="row mb-4">
            
        
                <div class="container-fluid py-3">
               
            <div class="row">
       

          <div class="col-md-3 mb-3">
                
              <div class="dropdown">
                <label for="tank" class="form-label dropdown-label color-label">Select Tank Name</label>
                <select id="tankDropdown"button class=" form-control dropdown-toggle" name="tank_name"   required>
                    <option value="">Select Tank</option>
                </select>
                <div class="form-group">
                    <label for="provinceDropdown" class="form-label bold-label color-label">Province</label> 
                    <select  class="form-control" id="provinceDropdown" name="province_name" required>
                        
                        <option value="">Select Province</option>
                        <!-- Options will be populated by jQuery -->
                    </select>
                    <input type="hidden" id="provinceName" name="province_name">
                </div>
                
                



                <div class="form-group">
                    <label for="districtDropdown" class="form-label bold-label color-label">District</label>
                    <select class="form-control" id="districtDropdown" name="district" required>
                        <option value="">Select District</option>
                        <!-- Options will be populated by jQuery -->
                    </select>
                    <input type="hidden" id="districtName" name="district_name">
                </div>

                <div class="form-group">
                    <label for="dsDivisionDropdown"  class="form-label bold-label color-label">DS Division</label>
                    <select class="form-control" id="dsDivisionDropdown" name="ds_division" required>
                        <option value="">Select DS Division</option>
                        <!-- Options will be populated by jQuery -->
                    </select>
                    <input type="hidden" id="dsDivisionName" name="ds_division_name">
                </div>

                <div class="form-group">
                    <label for="gndDropdown" class="form-label bold-label color-label">GND</label>
                    <select class="form-control" id="gndDropdown" name="gn_division_name" required>
                        <option value="">Select GND</option>
                        <!-- Options will be populated by jQuery -->
                    </select>
                    <input type="hidden" id="gndName" name="gn_division_name">
                </div>
                
                <div class="form-group">
                    <label for="gndDropdown" class="form-label bold-label color-label">Select ASC</label>
                    <select class="form-control" id="ascDropdown"button  name="as_center"   required>
                        <option value="">Select ASC</option>
                    </select>
</div>
                
            </div>
            </div>
                </div> 
       
        <form action="#" method="post">
            <div class="row">
                <div class="col-md-6">
                <div class="form-group">
                        <label for="nic">Beneficiary NIC</label>
                        <input type="text" class="form-control" name="nic" placeholder="Enter Beneficiary NIC" required>
                    </div>
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control"  name="first_name" placeholder="Enter Beneficiary Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control"  name="last_name" placeholder="Enter Beneficiary Name" required>

                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob" placeholder="Select Date of Birth" required>
                       
                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="ui-datepicker-trigger" alt="calendar">
                    </div>
                    
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="age">Age</label>
                        <input type="text" class="form-control" id="age" name="age" placeholder="Age" readonly>
                    </div>
                    
                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Mobile Number(s)">
                        <small class="form-text text-muted">Separate multiple numbers with comma (,)</small>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="income">Income</label>
                        <input type="text" class="form-control" id="income" name="income" placeholder="Enter Income" required>
                    </div>
                    <div class="form-group">
                        <label for="familyMembers">Family Members Count</label>
                        <input type="number" class="form-control" id="family_members_count" name="family_members_count" placeholder="Enter Family Members Count" required>
                    </div>
                    <div class="form-group">
                        <label for="education">Education Level</label>
                        <select class="form-control" id="education" name="education" required>
                            <option value="">Select Education Level</option>
                            <option value="Primary">Primary</option>
                            <option value="Secondary">Secondary</option>
                            <option value="Higher Secondary">Higher Secondary</option>
                            <option value="Graduate">Graduate</option>
                            <option value="Post Graduate">Post Graduate</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="landOwnership">Land Ownership</label>
                        <input type="text" class="form-control" id="land_ownership" name="land_ownership" placeholder="Enter Land Ownership" required>
                    </div>
                    <div class="form-group">
                        <label for="latitude">Latitude</label>
                        <input type="text" class="form-control" name="latitude" placeholder="Enter Latitude Cordination" required>
                    </div>
                    <div class="form-group">
                        <label for="Longitude">Longitude</label>
                        <input type="text" class="form-control" name="longitude" placeholder="Enter Longitude Cordination" required>
                    </div>
                    
                    
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title mb-0">Account Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="accountName">Account Name</label>
                                <input type="text" class="form-control" name="acc_name" placeholder="Enter Account Name" required>
                            </div>
                            <div class="form-group">
                                <label for="accountNumber">Account Number</label>
                                <input type="text" class="form-control" name="acc_number" placeholder="Enter Account Number" required>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div> 
            <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" name="button" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
                
        </div>
        </div>
<!-- Success message div -->
<div id="successMessage" class="alert alert-success mt-3" style="display: none;">
    <strong>Success!</strong> Beneficiary registration completed successfully.
</div>
<script>
 $(document).ready(function() {
    // Handle form submission
    $('form').submit(function(event) {
        // Prevent default form submission behavior
        event.preventDefault();

        // Perform AJAX form submission
        $.ajax({
            url: $(this).attr('action'),
            type: $(this).attr('method'),
            data: $(this).serialize(),
            success: function(response) {
                // Show success modal
                $('#successModal').modal('show');

                // Automatically close the modal after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    $('#successModal').modal('hide');
                }, 1000);

                // Optionally, reset the form fields
                $('form')[0].reset();
            },
            error: function(xhr, status, error) {
                // Handle error
                console.error(xhr.responseText);
                // You can display an error message here if needed
            }
        });
    });
});

</script>
        <script>
            $(document).ready(function () {
                // Fetch tank names from the API endpoint
                $.get('/tanks', function (data) {
                    // Populate the dropdown menu with tank names
                    $.each(data, function (index, tank) {
                        $('#tankDropdown').append($('<option>', {
                            value: tank.tank_name,
                            text: tank.tank_name 
                        }));
                    });
                });
            });

            $(document).ready(function () {
                // Fetch ASC names from the API endpoint
                $.get('/asc', function (data) {
                    // Populate the dropdown menu with ASC names
                    $.each(data, function (index, asc) {
                        $('#ascDropdown').append($('<option>', {
                            value: asc.asc_name,
                            text: asc.asc_name 
                        }));
                    });
                });
            });
        </script>


        {{-- dynamicalyy get dsd gnd --}}
       
<script> 
        $(document).ready(function() {
            // Fetch provinces
            $.ajax({
                url: '/provinces',
                type: 'GET',
                success: function(data) {
                    // Populate province dropdown
                    $.each(data, function(index, province) {
                        $('#provinceDropdown').append($('<option>', {
                            value: province.id,
                            text: province.name
                        }));
                    });
                }
            });
        
            // Fetch districts based on selected province
            $('#provinceDropdown').change(function() {
                var provinceId = $(this).val();
        
                // Check if a province is selected
                if (provinceId !== '') {
                    // Clear the district and DS Division dropdowns
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
        
                    // Fetch districts only if a valid province ID is selected
                    $.ajax({
                        url: '/provinces/' + provinceId + '/districts',
                        type: 'GET',
                        success: function(data) {
                            // Populate district dropdown
                            $.each(data, function(index, district) {
                                $('#districtDropdown').append($('<option>', {
                                    value: district.id,
                                    text: district.district
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the district and DS Division dropdowns if no province is selected
                    $('#districtDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select District'
                    }));
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden fields
                $('#provinceName').val('');
                $('#districtName').val('');
                $('#dsDivisionName').val('');
                $('#gndName').val('');
            });
        
            // Fetch DS Divisions based on selected district
            $('#districtDropdown').change(function() {
                var districtId = $(this).val();
        
                // Check if a district is selected
                if (districtId !== '') {
                    // Fetch DS Divisions only if a valid district ID is selected
                    $.ajax({
                        url: '/districts/' + districtId + '/ds-divisions',
                        type: 'GET',
                        success: function(data) {
                            // Clear the DS Division dropdown
                            $('#dsDivisionDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select DS Division'
                            }));
        
                            // Populate DS Division dropdown
                            $.each(data, function(index, dsDivision) {
                                $('#dsDivisionDropdown').append($('<option>', {
                                    value: dsDivision.id,
                                    text: dsDivision.division
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the DS Division dropdown if no district is selected
                    $('#dsDivisionDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select DS Division'
                    }));
                }
                // Reset hidden field
                $('#dsDivisionName').val('');
            });

            // Fetch GNDs based on selected DS Division
            $('#dsDivisionDropdown').change(function() {
                var dsDivisionId = $(this).val();
        
                // Check if a DS Division is selected
                if (dsDivisionId !== '') {
                    // Fetch GNDs only if a valid DS Division ID is selected
                    $.ajax({
                        url: '/ds-divisions/' + dsDivisionId + '/gn-divisions',
                        type: 'GET',
                        success: function(data) {
                            console.log(data);
                            // Clear the GND dropdown
                            $('#gndDropdown').empty().append($('<option>', {
                                value: '',
                                text: 'Select GND'
                            }));
        
                            // Populate GND dropdown
                            $.each(data, function(index, gnd) {
                                $('#gndDropdown').append($('<option>', {
                                    value: gnd.id,
                                    text: gnd.gn_division
                                }));
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                            // Handle error - show a message to the user or handle it as needed
                        }
                    });
                } else {
                    // Clear the GND dropdown if no DS Division is selected
                    $('#gndDropdown').empty().append($('<option>', {
                        value: '',
                        text: 'Select GND'
                    }));
                }
                // Reset hidden field
                $('#gndName').val('');
            });
        
            // Update hidden fields when options are selected
            $('#provinceDropdown').change(function() {
                $('#provinceName').val($(this).find('option:selected').text());
            });
        
            $('#districtDropdown').change(function() {
                $('#districtName').val($(this).find('option:selected').text());
            });
        
            $('#dsDivisionDropdown').change(function() {
                $('#dsDivisionName').val($(this).find('option:selected').text());
            });

            $('#gndDropdown').change(function() {
                $('#gndName').val($(this).find('option:selected').text());
            });
        });
</script>
    
        
    
    
</body>
</html>