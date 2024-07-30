<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <!-- <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet"> -->
    <style>
        .footer {background-color: #343a40;color: white;padding: 20px 0;}
        .footer .social-icons a {margin-right: 15px;font-size: 1.5rem;transition: color 0.2s;}
        .footer .social-icons a:hover{color: rgb(91,206,215);}
        .footer .list-unstyled li {margin-bottom: 10px;}
        .footer .list-unstyled li a:hover{color: rgb(91,206,215);}
        @media screen and (max-width: 768px) {
            .footer {
                text-align: center;
            }
            .footer .row {
                flex-direction: column;
                align-items: center;
            }
            .footer .col-lg-2, .footer .col-lg-3 {
                text-align: center;
                margin-bottom: 20px;
            }
            .footer .social-icons {
                justify-content: center;
                display: flex;
            }
        }
        .text-decoration-none{color:white; font-family:Poppins;}
    </style>
</head>
<body>

<?php include "nav.php"; ?>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-3 col-sm-4 mt-4"><div data-aos="fade-up">
                <a href="#">
                    <img src="./image/logo.png" alt="logo" class="img-fluid" style="height:30px">
                </a>
            </div></div>
            <div class="col-lg-2 col-md-3 col-sm-4 mt-4"><div data-aos="fade-down">
                <ul class="list-unstyled">
                    <li class="list-item"><a href="about.php" class="text-decoration-none ">ABOUT US</a></li>
                    <li class="list-item"><a href="product.php" class="text-decoration-none ">PRODUCT</a></li>
                </ul>
            </div></div>
            <div class="col-lg-2 col-md-3 col-sm-4 mt-4"><div data-aos="fade-up">
                <ul class="list-unstyled">
                    <li class="list-item"><a href="carrer.php" class="text-decoration-none ">CAREERS</a></li>
                    <li class="list-item"><a href="responsibility.php" class="text-decoration-none ">RESPONSIBILITY</a></li>
                    <li class="list-item"><a href="media.php" class="text-decoration-none ">MEDIA</a></li>
                    <li class="list-item"><a href="contact.php" class="text-decoration-none ">CONTACTS</a></li>
                    <li class="list-item"><a href="biomedical.php" class="text-decoration-none ">BIO MEDICAL WASTE MANAGEMENT</a></li>
                    <li class="list-item"><a href="./pdf/Public_Notices.pdf" download target="_blank" class="text-decoration-none ">PUBLIC NOTICE</a></li>
                </ul>
            </div></div>
            <div class="col-lg-3 col-md-3 col-sm-6 mt-4"><div data-aos="fade-down">
                <ul class="list-unstyled">
                    <li class="list-item"><a href="socialmediaterms.php" class="text-decoration-none">SOCIAL MEDIA TERMS OF USE</a></li>
                    <li class="list-item"><a href="privacy.php" class="text-decoration-none ">PRIVACY POLICY</a></li>
                    <li class="list-item"><a href="termofuse.php" class="text-decoration-none ">TERMS & CONDITIONS</a></li>
                </ul>
            </div></div>
            <div class="col-lg-3 col-md-6 col-sm-6 mt-4 text-lg-end text-md-end text-center"><div data-aos="fade-down">
                <div class="social-icons">
                    <a href="https://www.facebook.com/Abbott" target="_blank" class="text-decoration-none"><i class="fab fa-facebook"></i></a>
                    <a href="https://www.instagram.com/abbottglobal/" target="_blank" class="text-decoration-none"><i class="fab fa-instagram"></i></a>
                    <a href="https://www.linkedin.com/uas/login?session_redirect=%2Fcompany%2F1612" target="_blank" class="text-decoration-none"><i class="fab fa-linkedin"></i></a>
                    <a href="https://x.com/AbbottNews?mx=2" target="_blank" class="text-decoration-none"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.youtube.com/c/abbott" target="_blank" class="text-decoration-none"><i class="fab fa-youtube"></i></a>
                </div>
            </div></div>
        </div>
        
        <div class="row">
            <div class="col-12 text-center mt-4"><div data-aos="fade-down"><hr>
                &copy; 2024 Your Company. All rights reserved.
            </div></div>
        </div>
    </div>
</footer>

<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> -->
<!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script> -->
</body>
</html>
