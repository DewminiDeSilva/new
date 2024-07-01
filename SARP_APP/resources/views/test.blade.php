<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cascading Dropdowns</title>
<bootsrap>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Include Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Include jQuery library -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Include jQuery UI library -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</head>
<body>
  <h2>Select Location</h2>
  <label for="province">Province:</label>
  <select id="province" class="btn btn-secondary dropdown-toggle" onchange="populateDistricts()">
    <option value="">Select Province</option>
    <!-- Sample Province Data -->
    <option value="1">North Central 1 </option>
    <option value="2">Northern 2</option>
    <option value="3">Central 3</option>
    <option value="4">North Western 4</option>
    <!-- Add more options as needed -->
  </select>
  
  <label for="district">District:</label>
  <select id="district" onchange="populateDSDs()" disabled>
    <option value="">Select District</option>
    <!-- Add a default option -->
    <option value="" disabled hidden>Select District</option>
    <!-- Sample District Data -->
    {{-- <option value=" NorthCentral"> North Central</option> --}}
    <option value="Vavuniya">Vavuniya</option>
    <option value="Mannar">Mannar</option>
    <option value="Mathale">Mathale</option>
    <option value="Kurunagala">Kurunagala</option>
    <option value="Puttalam">Puttalam</option>
    <!-- Add more options as needed -->
  </select>
  
  <label for="dsd">DSD:</label>
  <select id="dsd" onchange="populateGNDASC()" disabled>
    <option value="">Select DSD</option>
  </select>
  
  <label for="gnd">GND:</label>
  <select id="gnd" disabled>
    <option value="">Select GND</option>
  </select>
  
  <label for="asc">ASC:</label>
  <select id="asc" disabled>
    <option value="">Select ASC</option>
  </select>

<script>
  function populateDistricts() {
    var provinceSelect = document.getElementById("province");
    var districtSelect = document.getElementById("district");
    districtSelect.innerHTML = ""; // Clear previous options
    var selectedProvince = provinceSelect.value;
    if (selectedProvince !== "") {
      // Sample Data: Districts based on Province
      var districts = {
        "1": ["Select District","Anuradhapura"],
        "2": ["Select District","Vavuniya", "Mannar"],
        "3": ["Select District","Mathale"],
        "4": ["Select District","Kurunagala", "Puttalam"]
        // Add more districts as needed
      };
      districts[selectedProvince].forEach(function(district) {
        var option = document.createElement("option");
        option.value = district;
        option.textContent = district;
        districtSelect.appendChild(option);
      });
      districtSelect.disabled = false; // Enable district dropdown
    } else {
      districtSelect.disabled = true; // Disable district dropdown if no province selected
    }
    // Reset downstream dropdowns
    document.getElementById("dsd").innerHTML = "<option value=''>Select DSD</option>";
    document.getElementById("gnd").innerHTML = "<option value=''>Select GND</option>";
    document.getElementById("asc").innerHTML = "<option value=''>Select ASC</option>";
    document.getElementById("dsd").disabled = true;
    document.getElementById("gnd").disabled = true;
    document.getElementById("asc").disabled = true;
  }

  function populateDSDs() {
    var districtSelect = document.getElementById("district");
    var dsdSelect = document.getElementById("dsd");
    dsdSelect.innerHTML = ""; // Clear previous options
    var selectedDistrict = districtSelect.value;
    if (selectedDistrict !== "") {
      // Sample Data: DSDs based on District
      var dsds = {
        "Anuradhapura": ["Select DSD","Galenbidunuwewa", "Ma.Nu.Pa", "Mahavilachchiya", "Medawachchiya", "Mihintale", "N.P.C", "Na.Nu.Pa", "Palugaswewa", "Rambewa", "Thirappane"],
        "Vavuniya": ["Select DSD","Vengalacheddikulam", "Vavuniya", "Vavuniya South"],
        "Mannar": ["Select DSD","Musali","Nanattan","Manthai West","Mannar Town"],
        "Mathale": ["Select DSD","Yatawatta"],
        "Kurunagala": ["Select DSD","Giribawa","Polpithigama","Galgamuwa","Ehetuwewa","Kobeigane","Ambanpola"],
        "Puttalam": ["Select DSD","Wanathavilluwa","Pallama","Anamaduwa","Nawagaththegama"]
        // Add more DSDs as needed
      };
      if (dsds[selectedDistrict]) {
        dsds[selectedDistrict].forEach(function(dsd) {
          var option = document.createElement("option");
          option.value = dsd;
          option.textContent = dsd;
          dsdSelect.appendChild(option);
        });
        dsdSelect.disabled = false; // Enable DSD dropdown
      } else {
        dsdSelect.disabled = true; // Disable DSD dropdown if no DSDs found for the district
      }
    } else {
      dsdSelect.disabled = true; // Disable DSD dropdown if no district selected
    }
    // Reset downstream dropdowns
    document.getElementById("gnd").innerHTML = "<option value=''>Select GND</option>";
    document.getElementById("asc").innerHTML = "<option value=''>Select ASC</option>";
    document.getElementById("gnd").innerHTML = "<option value=''>Select gnd</option>";
    document.getElementById("asc").disabled = true;
  }

  function populateGNDASC() {
    var dsdSelect = document.getElementById("dsd");
    var gndSelect = document.getElementById("gnd");
    var ascSelect = document.getElementById("asc");
    gndSelect.innerHTML = ""; // Clear previous options
    ascSelect.innerHTML = ""; // Clear previous options
    var selectedDSD = dsdSelect.value;
    if (selectedDSD !== "") {
      // Sample Data: GNDs and ASCs based on DSD
      var gnds = {
        "Galenbidunuwewa": ["Select GND","Manankattiya"],
        "Ma.Nu.Pa": ["Select GND","Maha Ehetuwewa"],
        "Mahavilachchiya": ["Select GND"," 369-Sadamaleliya"],
        "Medawachchiya": ["Select GND","Lindawewa", "Karambankulama", "Madawachchiya East","Sangilikanadarawa","Puleliya","Prabodhagama","Kidawarankulama","Poonewa","Maha Kumbukgollewa","Kadawath Rambewa","Kidagalegama",],
        "Mihintale": ["Select GND","Katukeliyawa", "Seeppukulama"],
        "N.P.C": ["Select GND","Galpottegama"],
        "Na.Nu.Pa": ["Select GND","Kawarakkulama"],
        "Palugaswewa": ["Select GND","Horiwila"],
        "Rambewa": ["Select GND","Kallanachiya", "Kapiriggama", "Pihimbiyagollewa"],
        "Thirappane": ["Select GND","Labunoruwa"],
        "Vengalacheddikulam": ["Select GND","Kanthasaminager", "Sooduventhapulavu", "Kannadi"],
        "Vavuniya": ["Select GND","Asikulam"],
        "Vavuniya South": ["Select GND","Kalukunnammaduwa", "Allagalla"],
        "Musali": ["Select GND","Veppankulam", "S.P Potkerni", "Puthuveli", "Maruthamadu", "Poonochchi", "P.P Potkerni", "Kondachchi","Arippu west","Koolankulam","Akathimurippu"],
        "Nanattan": ["Select GND","Sirukkandal", "Ilahadipiddy", "Vanchiyankulam", "Isamalaithalvu", "Valkkaipettankandal", "Parikarikandal", "Razoolputhuveli", "Ilanthaimoddai"],
        "Manthai West": ["Select GND","Minnukkan", "Pappamoddai"],
        "Mannar Town": ["Select GND","Puthukkamam", "Periyanavatkulam"],
        "Yatawatta": ["Select GND","Udagama West", "Aluthwatta", "Mathalapitiya", "Mathalapitiya South", "Raththinda"],
        "Giribawa": ["Select GND","Sangappalaya", "Wannikudawewa", "Gampola", "Aliyawetunawewa"],
        "Polpithigama": ["Select GND","Galgiriyawa", "IhalaThimbiriyawa", "Kambuwatawana", "Kubukkadawala", "Moragollagama", "Nikawewa", "Niyandawanaya", "Serugasyaya"],
        "Galgamuwa": ["Select GND","Nahettikulama", "Madadombe"],
        "Ehetuwewa": ["Select GND","Thimbiriyawa", "Hunugallewa", "Ethinimole", "Galapitadigana", "Ihala Embogama", "Kaduruwewa", "Eriyawa", "Ratnadivulwewa", "Hiddewa"],
        "Kobeigane": ["Select GND","Mawathagama"],
        "Ambanpola": ["Select GND","Bakmeewewa"],
        "Wanathavilluwa": ["Select GND","Mailankulama"],
        "Pallama": ["Select GND","Wathupola"],
        "Anamaduwa": ["Select GND","Alankulama", "Kottukachchiya", "Colony 1"],
        "Nawagaththegama": ["Select GND","Mahameddewa", "Rambakanayagama", "Miyellewa","Amunuwewa"]
        // Add more GNDs as needed
      };
      var ascs = {
        "Galenbidunuwewa": ["Select ASC","ASC A1-1-1", "ASC A1-1-2", "ASC A1-1-3"],
  "Ma.Nu.Pa": ["Select ASC","ASC A1-2-1", "ASC A1-2-2", "ASC A1-2-3"],
  "Mahavilachchiya": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Medawachchiya": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Mihintale": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "N.P.C": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Na.Nu.Pa": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Palugaswewa": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Rambewa": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Thirappane": ["Select ASC","ASC A1-3-1", "ASC A1-3-2", "ASC A1-3-3"],
  "Vengalacheddikulam": ["Select ASC","Kanthasaminager", "Sooduventhapulavu", "Kannadi"],
  "Vavuniya": ["Select ASC","Asikulam","test"],
  "Vavuniya South": ["Select ASC","Kalukunnammaduwa", "Allagalla"],
  "Musali": ["Select ASC","Veppankulam", "S.P Potkerni", "Puthuveli", "Maruthamadu", "Poonochchi", "P.P Potkerni", "Kondachchi","Arippu west","Koolankulam","Akathimurippu"],
  // Add more ASCs as needed
      };
      gnds[selectedDSD].forEach(function(gnd) {
        var option = document.createElement("option");
        option.value = gnd;
        option.textContent = gnd;
        gndSelect.appendChild(option);
      });
      ascs[selectedDSD].forEach(function(asc) {
        var option = document.createElement("option");
        option.value = asc;
        option.textContent = asc;
        ascSelect.appendChild(option);
      });
      gndSelect.disabled = false; // Enable GND dropdown
      ascSelect.disabled = false; // Enable ASC dropdown
    } else {
      gndSelect.disabled = true; // Disable GND dropdown if no DSD selected
      ascSelect.disabled = true; // Disable ASC dropdown if no DSD selected
    }
  }
</script>
<div class="container">
  <h1 class="text-center mb-4">Tank Details</h1>

  <div class="row">
    <div class="col">
      <div class="dropdown">
        <label for="formGroupExampleInput" class="form-label dropdown-label">Tank Name</label>
        <!-- Tank Name Dropdown -->
        <button class="btn btn-secondary dropdown-toggle" type="button" id="tankNameDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
          Select Tank Name
        </button>
        <ul class="dropdown-menu" aria-labelledby="tankNameDropdownButton" id="tankNames">
          <li>
            <input type="search" class="form-control" id="searchInput" placeholder="Search..." onkeyup="filterDropdown('searchInput', 'tankNames')">
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Anuradhapura Wewa</a></li>
          <li><a class="dropdown-item" href="#"></a></li>
          <li><a class="dropdown-item" href="#"></a></li>
        </ul>
      </div>
    </div>
    <div class="col">
      <div class="dropdown">
        <label for="formGroupExampleInput" class="form-label dropdown-label">Tank Progress</label>
        <!-- Tank Progress Dropdown -->
        <button class="btn btn-secondary dropdown-toggle" type="button" id="tankProgressDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
          Tank Progress
        </button>
        <ul class="dropdown-menu" aria-labelledby="tankProgressDropdownButton" id="tankProgress">
          <li>
            <input type="search" class="form-control" id="progressSearchInput" placeholder="Search..." onkeyup="filterDropdown('progressSearchInput', 'tankProgress')">
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">10%</a></li>
          <li><a class="dropdown-item" href="#">20%</a></li>
          <li><a class="dropdown-item" href="#">30%</a></li>
        </ul>
      </div>
    </div>
    <div class="col">
      <div class="dropdown">
        <label for="formGroupExampleInput" class="form-label dropdown-label">Tank Status</label>
        <!-- Tank Status Dropdown -->
        <button class="btn btn-secondary dropdown-toggle" type="button" id="tankStatusDropdownButton" data-bs-toggle="dropdown" aria-expanded="false">
          Tank Status
        </button>
        <ul class="dropdown-menu" aria-labelledby="tankStatusDropdownButton" id="tankStatus">
          <li>
            <input type="search" class="form-control" id="statusSearchInput" placeholder="Search..." onkeyup="filterDropdown('statusSearchInput', 'tankStatus')">
          </li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item" href="#">Normal</a></li>
          <li><a class="dropdown-item" href="#">Low</a></li>
          <li><a class="dropdown-item" href="#">High</a></li>
        </ul>
      </div>
    </div>

  </div>
  <div>
    
<form>
  <h2 class="text-center mt-5">Constructor Information</h2>
  <div class="mb-3">
    <label for="paymentNameInput" class="form-label">Payment Name</label>
    <input type="text" class="form-control" id="paymentNameInput" required>
  </div>
  <div class="mb-3">
    <label for="accountNumberInput" class="form-label">Payment Account</label>
    <input type="text" class="form-control" id="accountNumberInput" required>
  </div>
  <div class="mb-3">
    <label for="eotInput" class="form-label">EOT (End of Term)</label>
    <input type="text" class="form-control" id="eotInput" required>
  </div>
  <div class="mb-3">
    <label for="bondDetailsInput" class="form-label">Bond Details</label>
    <input type="text" class="form-control" id="bondDetailsInput">
  </div>
  <div class="mb-3">
    <label for="constructionPeriodInput" class="form-label">Construction Period (Months)</label>
    <input type="number" class="form-control" id="constructionPeriodInput" required>
  </div>
  <div class="mb-3">
    <label for="constructionPeriodInput" class="form-label">Number Of Family Members</label>
    <input type="number" class="form-control" id="constructionPeriodInput" required>
  </div>
  <div class="mb-3">
    <label for="latitudeInput" class="form-label">Latitude</label>
    <input type="number" class="form-control" id="latitudeInput" required>
  </div>
  <div class="mb-3">
    <label for="longitudeInput" class="form-label">Longitude</label>
    <input type="number" class="form-control" id="longitudeInput" required>
  </div>
  <div class="text-center">
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
</form>

  <!-- Footer -->
  <footer class="mt-5">
    <p class="text-center">Tank Details 2024</p>
  </footer>
</div>

<!-- Bootstrap Bundle JS (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Function to handle dropdown item selection
  document.querySelectorAll('.dropdown-menu a.dropdown-item').forEach(item => {
    item.addEventListener('click', event => {
      const dropdownMenu = event.target.closest('.dropdown-menu');
      const button = dropdownMenu.previousElementSibling;
      button.textContent = event.target.textContent;
    });
  });

  function filterDropdown(inputId, dropdownId) {
    var input, filter, ul, li, a, i;
    input = document.getElementById(inputId);
    filter = input.value.toUpperCase();
    ul = document.getElementById(dropdownId);
    li = ul.getElementsByTagName("a");
    for (i = 0; i < li.length; i++) {
      if (li[i].innerHTML.toUpperCase().indexOf(filter) > -1) {
        li[i].style.display = "";
      } else {
        li[i].style.display = "none";
      }
    }
  }
</script>
</body>
</html>

