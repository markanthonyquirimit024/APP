<div>
<link rel="stylesheet" href="{{asset('assets/home.css')}}">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>


<div class="content-section">
    <h1><b>Having trouble?</b></h1>
    <h2>We Are <b>At Your Service!</b></h2>
    <h4>Repair estimate for your vehicles</h4>
</div>

<div class="content-section-2">
    <h1><b>Top Branches</b></h1>
</div>

<div class="top-branches">
    <div class="branch-container">
        <img src="logo.png" alt="Image 1">
        <p>M.H. Del Pilar Street, Dagupan City, Philippines</p>
        <img src="loc.png" class="loc-img" alt="Location Image">
    </div>
    <div class="branch-container">
        <img src="logo.png" alt="Image 2">
        <p>Arellano Street, Dagupan City, Philippines</p>
        <img src="loc.png" class="loc-img" alt="Location Image">
    </div>
    <div class="branch-container">
        <img src="logo.png" alt="Image 3">
        <p>Dagupan-Lingayen Rd, Dagupan City, Philippines</p>
        <img src="loc.png" class="loc-img" alt="Location Image">
    </div>
</div>

<div class="new-bg-section">
    <div class="contact-section">
        <h1><b>CONTACT US</b></h1>
        <select class="dropdown-box">
            <option value="option1">BRANCH LOCATIONS</option>
            <option value="option2">M.H. Del Pilar Street, Dagupan City, Philippines</option>
            <option value="option3">Arellano Street, Dagupan City, Philippines</option>
            <option value="option4">Dagupan-Lingayen Rd, Dagupan City, Philippines</option>
        </select>
        <div class="display-box">
            EMAIL: atyourservice@gmail.com
        </div>
        <div class="display-box">
            CONTACT NUMBER: +63 402 221 4920
        </div>
    </div>
</div>

<div class="about">
    <center><h1><b>What They Say <span>About Us</span>?</b></h1></center>
</div>

<div class="frame">
    <div class="left-side">
        <p><b>My recent experience with At Your Service was nothing short of exceptional. From their prompt and accommodating customer service to their skilled technicians and transparent communication throughout the repair process, every aspect exceeded my expectations. The welcoming atmosphere, coupled with their dedication to quality and customer satisfaction, left me thoroughly impressed. My vehicle was returned to me in pristine condition, and I couldn't be happier with the outcome. AYS has undoubtedly set the bar high for vehicle repair services, and I wholeheartedly recommend them to anyone in need of reliable and top-notch service.</b></p>
        <img src="client2-modified.png" alt="Small Image">
        <h2><b>Angela Jones</b></h2>
    </div>
    <div class="right-side">
        <img src="goods.jpg" alt="Large Image">
    </div>
</div>

<script>
    function toggleDashboard() {
        const dashboard = document.querySelector('.dashboard');
        const navbar = document.querySelector('.navbar h1');
        const currentLeft = parseInt(getComputedStyle(dashboard).left);

        if (currentLeft === 0) {
            dashboard.style.left = '-250px';
            navbar.classList.remove('dashboard-open');
        } else {
            dashboard.style.left = '0';
            navbar.classList.add('dashboard-open');
        }
    }

    function toggleDropdown(event) {
        event.preventDefault();
        const dropdownContent = document.getElementById("dropdownContent");
        dropdownContent.style.display = dropdownContent.style.display === "block" ? "none" : "block";
    }
</script>




<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
</div>