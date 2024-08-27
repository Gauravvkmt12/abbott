<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Montserrat:wght@400;700&display=swap"
    rel="stylesheet">
<link rel="stylesheet" href="style1.css">
<nav class="navbar navbar-expand-lg bg-danger main-nav">
    <div class="container-fluid">
        <!-- Logo/Brand -->
        <a class="navbar-brand" href="index.php">
            <h5 class="brand-logo">Pharmatech Solutions</h5>
        </a>

        <!-- Mobile Menu Button -->
        <button class="navbar-toggler border-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span><i class="fa-solid fa-bars"></i></span>
        </button>

        <!-- Navbar Menu Items -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        PRODUCT
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php">ALL PRODUCT</a></li>
                        <li><a class="dropdown-item" href="therpy.php">THERAPY AREAS</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CAREERS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT</a>
                </li>
            </ul>

            <div class="">
                <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#contactModal">Contact
                    Us</button>
            </div>
        </div>
    </div>
</nav>
<!-- Contact Us Modal -->
<div class="modal fade" id="contactModal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="contactModalLabel">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="submit_form.php" method="POST">
    <div class="mb-3">
        <div class="inputForm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
            </svg>
            <input placeholder="Enter your Name" class="input" name="name" type="text" required>
        </div>
    </div>
    <div class="mb-3">
        <div class="inputForm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                <g data-name="Layer 3" id="Layer_3">
                    <path d="m30.853 13.87a15 15 0 0 0 -29.729 4.082 15.1 15.1 0 0 0 12.876 12.918 15.6 15.6 0 0 0 2.016.13 14.85 14.85 0 0 0 7.715-2.145 1 1 0 1 0 -1.031-1.711 13.007 13.007 0 1 1 5.458-6.529 2.149 2.149 0 0 1 -4.158-.759v-10.856a1 1 0 0 0 -2 0v1.726a8 8 0 1 0 .2 10.325 4.135 4.135 0 0 0 7.83.274 15.2 15.2 0 0 0 .823-7.455zm-14.853 8.13a6 6 0 1 1 6-6 6.006 6.006 0 0 1 -6 6z">
                    </path>
                </g>
            </svg>
            <input placeholder="Enter your Email" class="input" name="email" type="email" required>
        </div>
    </div>
    <div class="mb-3">
        <div class="inputForm">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 32 32" height="20">
                <g data-name="Layer 3" id="Layer_3">
                    <path d="M16 4a12 12 0 1 0 12 12A12.014 12.014 0 0 0 16 4Zm0 22a10 10 0 0 1 -7.958-16.146A2 2 0 0 0 10 10h4a2 2 0 0 1 2 2v6a2 2 0 0 0 2 2h6a2 2 0 0 0 1.957-1.854A10 10 0 0 1 16 26Z">
                    </path>
                </g>
            </svg>
            <input placeholder="Enter your Message" id="message" class="input" name="message" type="text" required>
        </div>
    </div>
    <button type="submit" class="button-submit">Send</button>
</form>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>