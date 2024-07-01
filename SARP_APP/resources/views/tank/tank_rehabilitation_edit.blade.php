<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>tank edit</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<!-- Include Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include jQuery UI library -->
<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <style>
        /* Custom styles */
        body {
          background-color: #f8f9fa;
        }
    
        .container {
          margin-top: 50px;
        }
        
        .dropdown {
          margin-bottom: 20px;
          display: flex;
          flex-direction: column;
          align-items: center;
        }
    
        .dropdown-menu {
          min-width: auto;
        }
    
        .dropdown-item {
          padding: 10px;
          font-size: 16px;
        }
    
        /* Adjust button width to fit the content */
        .dropdown-toggle {
          min-width: 250px; /* Increase the width */
        }
    
        /* Center align labels */
        .dropdown-label {
          text-align: center;
          font-size:20px;
        }
        /* Adjust dropdown button text alignment */
    
    
      </style>
         @include('dashboard.dashboardC')

</head>
<body>
 
    <div class="container mt-6 border rounded border-primary p-4">
        <h2 class="text-center mb-4">Tank Details Edit</h2>
    <form action="/tank_rehabilitation/{{ $tankRehabilitation->id }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col">
                <div class="dropdown">
          <label for="province" class="form-label dropdown-label">Province</label>
          
          <select id="provinceDropdown" name="province" button class="btn btn-secondary dropdown-toggle" required>
        
            {{-- <option value="{{ $tankRehabilitation->province }}">{{ $tankRehabilitation->province }}</option> --}}
            
            <option value= "province"{{ $tankRehabilitation->province == 'province' ? 'selected' : '' }}>{{ $tankRehabilitation->province }}</option>
          </select>
              <input type="hidden" id="provinceName" name="province">
          </div>
            </div>
          <div class="col">
             
               
            <div class="dropdown">
          <label for="district" class="form-label dropdown-labelbutton">District</label>
          <select id="districtDropdown" name="district" button class="btn btn-secondary dropdown-toggle" required>
            <option value="{{ $tankRehabilitation->district }}">{{ $tankRehabilitation->district }}</option>
          </select>
          <input type="hidden" id="districtName" name="district">
          </div>
        </div>
          <div class="col">
            <div class="dropdown">
          <label for="dsd" class="form-label dropdown-label">DSD</label>
          <select id="dsDivisionDropdown" name="ds_division" button class="btn btn-secondary dropdown-toggle"required>
            <option value="{{ $tankRehabilitation->ds_division }}">{{ $tankRehabilitation->ds_division }}</option>
          </select>
          <input type="hidden" id="dsDivisionName" name="ds_division">
        
          </div>
        </div>
          <div class="col">
            <div class="dropdown">
          <label for="gnd" class="form-label dropdown-label">GND</label>
          <select id="gndDropdown" name="gn_division" button class="btn btn-secondary dropdown-toggle" required>
            <option value="{{ $tankRehabilitation->gn_division }}">{{ $tankRehabilitation->gn_division }}</option>
          </select>
          <input type="hidden" id="gndName" name="gn_division">
        
          </div>
        </div>
          <div class="col">
            <div class="dropdown">
          <label for="asc"  class="form-label dropdown-label">ASC</label>
          <select id="ascDropdown" name="as_centre" button class="btn btn-secondary dropdown-toggle"  required>
            <option value="{{ $tankRehabilitation->as_centre }}"> {{ $tankRehabilitation->as_centre }}</option>
          </select>
          </div>
        </div>
        
        
        
        </div>  
            
        <div class="container">
        
          <div class="row">
            <div class="col">
                
              <div class="dropdown">
                <label for="tank">Select Tank Name</label>
                <select class="form-control btn btn-secondary" id="tankDropdown" name="tank_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                  <option value="{{ $tankRehabilitation->tank_name }}">{{ $tankRehabilitation->tank_name }}</option>
                   
                </select>
            </div>
            </div>
            
            
            
        
            <div class="col">
             
               
              <div class="dropdown">
                <label for="tank">Tank Progress</label>
                <select class="form-control btn btn-secondary"  name="progress" data-bs-toggle="dropdown" aria-expanded="false" required>
                    <option value="{{ $tankRehabilitation->progress }}">{{ $tankRehabilitation->progress }}</option>
                    <option value="0%">0%</option>
                    <option value="20%">20%</option>
                    <option value="40%">40%</option>
                    <option value="60%">60%</option>
                    <option value="80%">80%</option>
                    <option value="100%">100%</option>
                    
                </select>
            </div>
            </div>
            <div class="col">
             
              <div class="dropdown">
                <label for="tank">Tank Status</label>
                <select class="form-control btn btn-secondary"  name="status" data-bs-toggle="dropdown" aria-expanded="false" required>
                    <option value="{{ $tankRehabilitation->status }}">{{ $tankRehabilitation->status }}</option>
                    <option value="Identified">Identified</option>
                    <option value="Started">Started</option>
                    <option value="On Going">On Going</option>
                    <option value="Finished">Finished</option>
                    
                </select>
            </div>
            </div>
            <div class="col">
             
              <div class="dropdown">
                <label for="tank">Implmenting Agency</label>
                <select class="form-control btn btn-secondary"  name="agency" data-bs-toggle="dropdown" aria-expanded="false" required>
                    <option value="{{ $tankRehabilitation->agency }}">{{ $tankRehabilitation->agency }}</option>
                    <option value="Central(ID)">Central(ID)</option>
                    <option value="DAD">DAD</option>
                    <option value="PID">PID</option>
                    <option value="ID">ID</option>
                    <option value="DI">DI</option>
                </select>
          </div>
            </div>
            <div class="col">
             
                <div class="dropdown">
                    <label for="tank">Cascade Name</label>
                    <select class="form-control btn btn-secondary" id="cascadeDropdown" name="cascade_name" data-bs-toggle="dropdown" aria-expanded="false" required>
                        <option value="{{ $tankRehabilitation->cascade_name }}">{{ $tankRehabilitation->cascade_name }}</option>
                        
                    </select>
              </div>
              
              
            </div>
          </div>
        
        
            
                <div class="mb-3">
                    <label for="paymentNameInput" class="form-label">Tank Id</label>
                    <input type="text" value="{{ $tankRehabilitation->tank_id }}" class="form-control" name="tank_id" id="tank_id" required>
                  </div>
                  <div class="mb-3">
                    <label for="paymentNameInput" class="form-label">River basin</label>
                    <input type="text" class="form-control" name="river_basin" id="river_basin" value="{{ $tankRehabilitation->river_basin}}" required>
                  </div>
        
          <h2 class="text-center mt-5">Contract Information</h2>
          <div class="mb-3">
            <label for="" class="form-label">Contracter Name</label>
            <input type="text" class="form-control" id="" name="contractor" value="{{ $tankRehabilitation->contractor }}" required>
          </div>
          <div class="mb-3">
            <label for="accountNumberInput" class="form-label">Payment</label>
            <input type="text" class="form-control" id="payment" name="payment" value="{{ $tankRehabilitation->payment }}" required>
          </div>
          <div class="mb-3">
            <label for="eotInput" class="form-label">EOT</label>
            <input type="text" class="form-control" id="" name="eot" value="{{ $tankRehabilitation->eot }}" required>
          </div>
          
          <div class="mb-3">
            <label for="constructionPeriodInput" class="form-label">Construction Period (Months)</label>
            <input type="text" class="form-control" id="" name="contract_period" value="{{ $tankRehabilitation->contract_period }}" required>
          </div>
          <div class="mb-3">
            <label for="constructionPeriodInput" class="form-label">Number Of Family Members</label>
            <input type="text" class="form-control" id="" name="no_of_family" value="{{ $tankRehabilitation->no_of_family }}" required>
          </div>
          <div class="mb-3">
            <label for="latitudeInput" class="form-label">Latitude</label>
            <input type="text" class="form-control" id="" name="latitude" value="{{ $tankRehabilitation->latitude }}" required>
          </div>
          <div class="mb-3">
            <label for="longitudeInput" class="form-label">Longitude</label>
            <input type="text" class="form-control" id="" name="longitude" value="{{ $tankRehabilitation->longitude }}" required>
          </div>
          <div class="mb-3">
            <label for="longitudeInput" class="form-label">Remarks</label>
            <input type="text" class="form-control" id="" name="remarks" value="{{ $tankRehabilitation->remarks }}" required>
          </div>
          
          <div class="text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        {{-- <div class="row">
            <div class="col">
                <div class="dropdown">
       
        
    

        <label for="tank_name" class="form-label dropdown-labelbutton">Tank Name:</label>
        <input class="btn btn-secondary dropdown-toggle" type="text" name="tank_name" id="tank_name" value="{{ $tankRehabilitation->tank_name }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="river_basin">River Basin:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="river_basin" id="river_basin" value="{{ $tankRehabilitation->river_basin }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="cascade_name">Cascade Name:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="cascade_name" id="cascade_name" value="{{ $tankRehabilitation->cascade_name }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="province">Province:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="province" id="province" value="{{ $tankRehabilitation->province }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="district">District:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="district" id="district" value="{{ $tankRehabilitation->district }}">
    </div>

</div>
        </div>
   
    <div class="container">
        <div class="row">
            <div class="col">
  <div class="dropdown">
        <label for="ds_division">DS Division:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="ds_division" id="ds_division" value="{{ $tankRehabilitation->ds_division }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="gn_division">GN Division:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="gn_division" id="gn_division" value="{{ $tankRehabilitation->gn_division }}">
    </div>

</div>
<div class="col">
   
     
  <div class="dropdown">
        <label for="as_centre">AS Centre:</label>
        <input type="text" class="btn btn-secondary dropdown-toggle" name="as_centre" id="as_centre" value="{{ $tankRehabilitation->as_centre }}">
    </div>

</div>
</div>



        <button type="submit">Submit</button> --}}
    </form>

{{-- Tank names and asc  --}}
  <script>
    $(document).ready(function () {
        // Fetch tank names from the API endpoint
        $.get('/tanks', function (data) {
          // console.log(data);
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

    $(document).ready(function () {
        // Fetch cascade names from the API endpoint
        $.get('/cascades', function (data) {
            // Populate the dropdown menu with cascade names
            $.each(data, function (index, cascade) {
                $('#cascadeDropdown').append($('<option>', {
                    value: cascade.cascade_name,
                    text: cascade.cascade_name 
                }));
            });
        });
    });


    </script>
  
  
  
  <!--  JavaScript to cascade dropdown -->
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