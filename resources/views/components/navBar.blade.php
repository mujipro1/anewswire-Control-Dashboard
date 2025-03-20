<div class="d-flex justify-content-center py-2 align-items-center headerbar">
    <h6>Control Dashboard</h6>
</div>
<div class="d-flex justify-content-center align-items-center navbar">
    <div class="nav-item" onclick = "handleNavClick(1)">Home</div>
    <div class="nav-item" onclick = "handleNavClick(6)">Dashboard</div>
    <div class="nav-item" onclick = "handleNavClick(2)">RSS Data</div>
    <div class="nav-item" onclick = "handleNavClick(3)">Websites</div>
    <div class="nav-item" onclick = "handleNavClick(4)">Headers</div>
    <div class="nav-item" onclick = "handleNavClick(5)">Profile</div>
</div>


<script>
    const handleNavClick = (item) => {
        if (item == 6){ window.location.href="/home" }
        if (item == 1){ window.location.href="/" }
        if (item == 2){ window.location.href="/data" }
        if (item == 3){ window.location.href="/websites" }
        if (item == 4){ window.location.href="/headers" }
        if (item == 5){ window.location.href="/user" }
    }
</script>