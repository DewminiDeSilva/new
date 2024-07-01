

<!<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sidebar with Dashboard</title>
    
    
    <link rel="stylesheet" href="{{ asset('assets/css/dashboardC.css')}} ">
</head>
<body>
<div class="container">
    <div class="sidebar">
        <div class="img">
            <img src="{{ asset('assets/images/tt.jpg') }}" alt="SARP Logo" class="logo" style="width: 250px; height: auto border-radius: 15px;">
        </div>
        
        <ul>
            <li><a href="#">Home</a></li>
            <li class="submenu">
                <a href="#">Beneficiary</a>
                <ul class="nested">
                    <li><a href="/beneficiary/create">Beneficiary Registration</a></li>
                    <li><a href="/beneficiary">Beneficiary Profile</a></li>
                    <li class="submenu">
                        <a href="#">Family Member</a>
                        <ul class="nested-n">
                            <li><a href="/family/create/12">Family Member Registration</a></li>
                            <li><a href="/family">Family Member Details</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">Tank</a>
                <ul class="nested">
                    <li><a href="/tank_rehabilitation/create">Tank Rehabilitation</a></li>
                    <li><a href="/tank_rehabilitation">Tank Details</a></li>
                </ul>
            </li>
            <li class="submenu">
                <a href="#">Training Program</a>
                <ul class="nested">
                    <li><a href="training/create">Training Program Registration</a></li>
                    <li><a href="/training">Training Program Details</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>
    
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var submenuLinks = document.querySelectorAll('.submenu > a');

        submenuLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var submenu = this.nextElementSibling;
                if (submenu && submenu.tagName === 'UL') {
                    if (submenu.classList.contains('show')) {
                        submenu.classList.remove('show');
                        this.classList.remove('active');
                    } else {
                        submenu.classList.add('show');
                        this.classList.add('active');
                    }
                }
            });
        });

        // Function to handle nested submenus
        var nestedSubmenuLinks = document.querySelectorAll('.submenu ul li.nested-n > a');

        nestedSubmenuLinks.forEach(function (link) {
            link.addEventListener('click', function (e) {
                e.preventDefault();
                var nestedSubmenu = this.nextElementSibling;
                if (nestedSubmenu && nestedSubmenu.tagName === 'UL') {
                    if (nestedSubmenu.classList.contains('show')) {
                        nestedSubmenu.classList.remove('show');
                        this.classList.remove('active');
                    } else {
                        nestedSubmenu.classList.add('show');
                        this.classList.add('active');
                    }
                }
            });
        });
    });
</script>
</body>
</html>