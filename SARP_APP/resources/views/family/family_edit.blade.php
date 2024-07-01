<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>family edit</title>
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
        /* Optional: Style for calendar icon */
        .ui-datepicker-trigger {
            margin-left: 5px;
            cursor: pointer;
        }
    </style>

<script>
    $(function() {
        // Initialize datepicker
        $("#dob").datepicker({
            dateFormat: 'yy-mm-dd',
            maxDate: '0', // Restrict selection to today or earlier
            changeYear: true, // Allow changing year
            yearRange: '-100:+0', // Allow selection of dates up to 100 years ago
            onSelect: function(selectedDate) {
                calculateAge(selectedDate); // Calculate age when date is selected
            }
        });

        function calculateAge(selectedDate) {
            var dob = new Date(selectedDate);
            var today = new Date();
            var age = today.getFullYear() - dob.getFullYear();
            var month = today.getMonth() - dob.getMonth();
            if (month < 0 || (month === 0 && today.getDate() < dob.getDate())) {
                age--;
            }
            // Update the youth field based on age
            if (age < 35) {
                $("#youth").val("Youth");
            } else {
                $("#youth").val("Not Youth");
            }
        }
    });
</script>
</head>
<body>
@include('dashboard.dashboardC')
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
               Family Member Details successfully Edited.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
        
    <div class="container mt-5 border rounded border-primary p-4">
        <h2 class="text-center mb-4">Family Member Details Edit</h2>
    <form class="form-horizontal" method="POST" action="/family/{{$family->id}}">
    
    @csrf
    @method('PUT')
    
        
       
            <div class="row">
                <div class="col-md-12">
                
                    <div class="form-group">
                        <label for="name">First Name</label>
                        <input type="text" class="form-control"  name="first_name" value="{{$family->first_name}}" placeholder="Enter  First Name" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Last Name</label>
                        <input type="text" class="form-control"  name="last_name" value="{{$family->last_name}}" placeholder="Enter  Last Name" required>
    
                    </div>
                    

                    <div class="form-group">
                        <label for="dob">Date Of Birth</label>
                        <input type="text" class="form-control" id="dob" name="dob" value="{{$family->dob}}" placeholder="Select Date of Birth" required>
                       
                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="ui-datepicker-trigger" alt="calendar">
                    </div>
                    
                    <div class="form-group">
                        <label>Gender</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="male" value="Male" {{ $family->gender == 'Male' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="male">Male</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="female" value="Female" {{ $family->gender == 'Female' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="female">Female</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gender" id="other" value="Other" {{ $family->gender == 'Other' ? 'checked' : '' }} required>
                            <label class="form-check-label" for="other">Other</label>
                        </div>
                    </div>
                    
                   
                    <div class="form-group">
                        <label for="age">Youth</label>
                        <input type="text" class="form-control" id="youth" name="youth" value="{{$family->youth}}" placeholder="Youth" readonly >
                    </div>
                    
                    
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{$family->phone}}" placeholder="Phone" required>
                </div>
               
                
                    
                    <div class="form-group">
                        <label for="education">Education Level</label>
                        <select class="form-control" id="education" name="education" required>
                            {{-- <option value="">Select Education Level</option> --}}
                            <option value="Primary" {{ $family->education == 'Primary' ? 'selected' : '' }}>Primary</option>
                            <option value="Secondary" {{ $family->education == 'Secondary' ? 'selected' : '' }}>Secondary</option>
                            <option value="Higher Secondary" {{ $family->education == 'Higher Secondary' ? 'selected' : '' }}>Higher Secondary</option>
                            <option value="Graduate" {{ $family->education == 'Graduate' ? 'selected' : '' }}>Graduate</option>
                            <option value="Post Graduate" {{ $family->education == 'Post Graduate' ? 'selected' : '' }}>Post Graduate</option>
                            <option value="Others" {{ $family->education == 'Others' ? 'selected' : '' }}>Others</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="employement">Employment Status</label>
                        <input type="text" class="form-control" id="employment" name="employment" value="{{$family->employment}}" placeholder="Employement" >
                    </div>
                    
                    <div class="form-group">
                        <label for="nutrition">Nutrition Level</label>
                        <input type="text" class="form-control" id="nutrition_level" name="nutrition_level" value="{{$family->nutrition_level}}" placeholder="Nutrition Level" >
                    </div>

    
    <button type="submit" class="btn btn-primary">Save Changes</button>
</form>
<!-- Success message js -->
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
                   }, 2000);
   
                   // Optionally, reset the form fields
                   $('form')[0].reset();
               },
               error: function(xhr, status, error) {
                   
                   console.error(xhr.responseText);

                  
               }
           });
       });
   });
</script>
</body>
</html>