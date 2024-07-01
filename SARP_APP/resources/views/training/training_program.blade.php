<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Training Programme Registration</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include jQuery library -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include jQuery UI library -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
    <div class="container mt-5 border rounded border-primary p-4">
        <form class="form-horizontal" method="POST" action="/training-programme">
        @include('dashboard.dashboardC')
            @csrf
            <div class="col-md-12 text-center">
                <h2>Training Programme Registration</h2>
            </div>
            <div class="container mt-5">
                <div class="row mb-4">
                    <div class="container-fluid py-3">
                        <div class="row">
                            <!-- Province Dropdown -->
                            <div class="col-md-4 mb-3">
                                <div class="dropdown">
                                    <select class="btn btn-secondary dropdown-toggle btn-block" id="provinceDropdown" name="province_name" required>
                                        <option value="">Select Province</option>
                                        <!-- Options will be populated by jQuery -->
                                    </select>
                                    <input type="hidden" id="provinceName" name="province_name">
                                </div>
                            </div>
                            <!-- District Dropdown -->
                            <div class="col-md-4 mb-3">
                                <div class="dropdown">
                                    <select class="btn btn-secondary dropdown-toggle btn-block" id="districtDropdown" name="district" required>
                                        <option value="">Select District</option>
                                        <!-- Options will be populated by jQuery -->
                                    </select>
                                    <input type="hidden" id="districtName" name="district_name">
                                </div>
                            </div>
                            <!-- DS Division Dropdown -->
                            <div class="col-md-4 mb-3">
                                <div class="dropdown">
                                    <select class="btn btn-secondary dropdown-toggle btn-block" id="dsDivisionDropdown" name="ds_division" required>
                                        <option value="">Select DS Division</option>
                                        <!-- Options will be populated by jQuery -->
                                    </select>
                                    <input type="hidden" id="dsDivisionName" name="ds_division_name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- GND Dropdown -->
                    <div class="col-md-4 mb-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="" data-bs-toggle="dropdown" aria-expanded="false">Select GND</button>
                            <ul class="dropdown-menu" aria-labelledby="gndDropdownButton">
                                <li><a class="dropdown-item" href="#">GND1</a></li>
                                <li><a class="dropdown-item" href="#">GND2</a></li>
                                <li><a class="dropdown-item" href="#">GND3</a></li>
                                <!-- Add more items as needed -->
                            </ul>
                        </div>
                    </div>
                    <!-- ASC Dropdown -->
                    <div class="col-md-4 mb-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="" data-bs-toggle="dropdown" aria-expanded="false">Select ASC</button>
                            <ul class="dropdown-menu" aria-labelledby="ascDropdownButton">
                                <li><a class="dropdown-item" href="#">ASC1</a></li>
                                <li><a class="dropdown-item" href="#">ASC2</a></li>
                                <li><a class="dropdown-item" href="#">ASC3</a></li>
                                <!-- Add more items as needed -->
                            </ul>
                        </div>
                    </div>
                    <!-- Place Input -->
                    <div class="col-md-4 mb-3">
                        <label for="place">Place</label>
                        <input type="text" class="form-control" id="place" name="place" placeholder="Enter Place" required>
                    </div>
                </div>
                <div class="row">
                    <!-- Type Input -->
                    <div class="col-md-4 mb-3">
                        <label for="type">Type</label>
                        <input type="text" class="form-control" id="type" name="type" placeholder="Enter Type" required>
                    </div>
                    <!-- Gender Dropdown -->
                    <div class="col-md-4 mb-3">
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle btn-block" type="button" id="" data-bs-toggle="dropdown" aria-expanded="false">Select Gender</button>
                            <ul class="dropdown-menu" aria-labelledby="genderDropdownButton">
                                <li><a class="dropdown-item" href="#">Male</a></li>
                                <li><a class="dropdown-item" href="#">Female</a></li>
                                <li><a class="dropdown-item" href="#">Other</a></li>
                                <!-- Add more items as needed -->
                            </ul>
                        </div>
                    </div>
                    <!-- Youth Checkbox -->
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="youthCheckbox" name="youth">
                            <label class="form-check-label" for="youthCheckbox">Youth</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Start Date Input -->
                    <div class="col-md-4 mb-3">
                        <label for="startDate">Start Date</label>
                        <input type="text" class="form-control" id="startDate" name="start_date" placeholder="Select Start Date" required>
                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="ui-datepicker-trigger" alt="calendar">
                    </div>
                    <!-- Conduct Date Input -->
                    <div class="col-md-4 mb-3">
                        <label for="conductDate">Conduct Date</label>
                        <input type="text" class="form-control" id="conductDate" name="conduct_date" placeholder="Select Conduct Date" required>
                        <img src="https://jqueryui.com/resources/demos/datepicker/images/calendar.gif" class="ui-datepicker-trigger" alt="calendar">
                    </div>
                    <!-- Conducted Checkbox -->
                    <div class="col-md-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="conductedCheckbox" name="conducted">
                            <label class="form-check-label" for="conductedCheckbox">Conducted</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Cost Input -->
                    <div class="col-md-4 mb-3">
                        <label for="cost">Cost</label>
                        <input type="text" class="form-control" id="cost" name="cost" placeholder="Enter Cost" required>
                    </div>
                </div>
            </div>
            <button type="submit" name="button" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    <script>
        // Your jQuery code for populating dropdowns and handling datepickers goes here
    </script>
</body>
</html>
