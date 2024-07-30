<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .img-fluid {width: 100%;height: auto;}.text-overlay {position: absolute;top: 45%;left: 10%;color: #eeb33b;}.text-overlay h1,{margin: 0;}@media (max-width: 768px) {.text-overlay {top: 35%;left: 8%;}}@media (max-width: 480px) {.text-overlay {display: none;}}.text-overlay h1{margin: 0;font-size: 4.3rem;}.btn-container {display: flex;align-items: center;justify-content: center;}.line {border-top: 1px solid white;width: 20%;}#border-dark{padding: 10px 100px;margin: 0;border-top-left-radius:8px; border-bottom-right-radius:8px; outline:none;}
        #grad1 {height: 500px;background-image: linear-gradient(to right, white, lightgreen);}#cardid{height: 200px;overflow: hidden;}#colhove{margin-bottom: 5%;}#colhove .card{background-color:#5bc2e7 ;color:white;}#colhove .card:hover{background-color: white;color:#5bc2e7;}#colhove a{text-decoration: none;}#awards {background-color: #5bc2e7;}#awards a {color: white;font-size: 25px;}#awards:hover{background-color: #B7AEAE;}#awards:hover a {color: #5bc2e7;}.breadcrumb-item + .breadcrumb-item::before {content: "\f105";font-family: "Font Awesome 5 Free";font-weight: 900;color: #6c757d; margin-right: 0.5rem;margin-left: 0.5rem;}#activ{color:blue;}.breadcrumb li:first-child {margin-left: 5%;}@media (max-width:769px){
            #textnone{display: none;}
        }
        @media (max-width:769px){
            .laptop-only{display: none;}}
            .mobile-only{display: none;}
            @media (max-width:769px){
                .mobile-only{display: block;}}
</style>
</head>
<body>
    <?php include "nav.php"; ?>
    <div class="conatiner mx-2 bg-white">
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item mt-2"><a href="index.php" class="text-secondary text-decoration-none">HOME</a></li>
    <li class="breadcrumb-item mt-2">ABOUT ABBOTT</li>
    <li class="breadcrumb-item mt-2 active" aria-current="page" id="activ">RESPONSIBILITY</li>
  </ol>
</nav>

    <div class="conatiner" id="">
    <img src="./image/Responsibility-resized-1440x536.jpg" alt="" class="img-fluid">
        <div class="text-overlay">
            <h1 class="text-lg text-sm text-white">RESPONSIBILITY</h1>
        </div>
    </div>
    <div class="conatiner" id="grad1">
    <div class="row justify-content-center">
            <div class="col-lg-8 mt-4 mb-4 btn-container">
                <div class="line"></div>
                <button class="" id="border-dark">
                   <b>WHO WE ARE</b>
                </button>
                <div class="line"></div>
            </div>
    </div>
    <div class="laptop-only">
    <div class="row justify-content-center mt-5">
    <div class="col-lg-3 md-3 mt-5" id="colhove"><div data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">

        <a href="https://www.abbott.in/about-abbott/responsibility/sustainability.html">
            <div class="card align-items-center" id="cardid">
                <div class="text-center">
                    <h3 class="text-uppercase mt-4">sustainability</h3>
                    <p>Driving positive economic, social and environmental impact through our business</p>
                </div>
            </div>
        </a>
    </div></div>
    <div class="col-lg-3 md-3 mt-5" id="colhove"><div data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
        <a href="https://www.abbott.in/about-abbott/responsibility/social-impact.html">
            <div class="card align-items-center" id="cardid">
                <div class="text-center">
                    <h3 class="text-uppercase mt-4">social impact</h3>
                    <p>Access to healthcare, community engagement, science education and shared impact</p>
                </div>
            </div>
        </a>
    </div></div>
        <div class="col-lg-3 md-3 mt-5" id="colhove"><div data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
            <a href="https://www.abbott.in/about-abbott/responsibility/abbott-fund.html">
                <div class="card align-items-center" id="cardid">
                    <div class="text-center">
                        <h3 class="text-uppercase mt-4">abbott fund</h3>
                        <p>Philanthropic programs that lead to more resilient, healthier communities</p>
                    </div>
                </div>
            </a>
        </div></div>
        
</div></div>
<div class="mobile-only">
<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <a href="https://www.abbott.in/about-abbott/responsibility/sustainability.html" target="_blank" class="accordion-button text-decoration-none" role="button">
       SUSTAINABILITY
      </a>
    </h2>
  </div>
  <div class="accordion-item mt-3 mb-3">
    <h2 class="accordion-header">
      <a href="https://www.abbott.in/about-abbott/responsibility/social-impact.html" target="_blank" class="accordion-button text-decoration-none" role="button">
        SOCIAL IMPACT
      </a>
    </h2>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header">
      <a href="https://www.abbott.in/about-abbott/responsibility/abbott-fund.html" target="_blank" class="accordion-button text-decoration-none" role="button">
        ABBOTT FUND
      </a>
    </h2>
  </div>
</div>
</div>
</div>
<div class="conatiner bg-white">
    <div class="container">
        <div class="row position-relative">
            <div class="col mt-5">
            <img src="./image/honors-banner-4.jpg" alt="not found" class="img-fluid">
            </div>
            <div class="text position-absolute">
                <div class="col btn-container" style="margin-top:7%;">
                    <div class="line"></div>
                        <button class="" id="border-dark">
                            <b>WHO WE ARE</b>
                        </button>
                    <div class="line"></div>
                </div>
            </div>
            <div class="text1 text-lg text-sm position-absolute" style="bottom:0; left:15px;" id="textnone">
                <h1 class="text-white">WE'RE RECOGNIZED AROUND THE WORKD<br> FOR RESPONSIBLE AND SUSTAINABLE 
                <br>BUSINESS</h1>
            </div>
        </div>
        <div class="row mt-4 justify-content-center">
        <div class="col mb-4"><div data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1500">
            <div class=""style="margin-left:5%">
                <a href="#" style="text-decoration: none; color:black;">
                <div class="">
                    <h4>Dow Jones Sustainability Index</h4>
                    <p>We were named the global healthcare industry Group Leader for seven consecutive years(2013-2019) for our strong economic, environmental and social perfomance.</p>
                </div></a>
            </div>
        </div></div>
        <div class="col mb-4"><div data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
        <div class="">
                <a href="#" style="text-decoration: none; color:black;">
                <div class="">
                    <h4>Best Corporate Citizens</h4>
                    <p>Corporate Responsibility maganize named us among the top 100 compaines for 11 consecutive years (2009-2019), and the healthcare sector leader in 2017.</p>
                </div></a>
            </div>
        </div></div>
        <div class="col mb-4"><div data-aos="fade-up"
     data-aos-easing="linear"
     data-aos-duration="1500">
        <div class="">
                <a href="#" style="text-decoration: none; color:black;">
                <div class="">
                    <h4>Fortune's Change the world </h4>
                    <p>Fortune magazine included us on their 2018 "Change the World" list, which recognizes companies for delivering shared value by makuing positive social impacts through their core business</p>
                </div></a>
            </div>
        </div></div>
        <div class="col mb-4"><div data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
        <div class="">
                <a href="#" style="text-decoration: none; color:black;">
                <div class="">
                    <h4>Fortune's Most Admired Companies</h4>
                    <p>We've been named one of the World's Most Admired Companies by Fortune magazine every year since 1984 and ranked No. 1 in our industry sector for seven consecutive years (2014-2020).</p>
                </div></a>
            </div>
        </div>
</div>
        </div>
    </div>
</div>
<div class="conatiner" id="awards"style="">
<div class="row">
<div class="col" >
    <div class="text-center mt-4 mb-4">
        <a href="#" class="text-uppercase" style="text-decoration: none;">see all honors and awards <i class="fa-solid fa-caret-down" style="transform: rotate(270deg);"></i></a>
    </div>
</div>
</div>
</div>
<div class="conatiner bg-white">
    <div class="row">
        <div class="col-lg-12">
            <br><br><br><?php include "footer.php" ?>
        </div>
    </div>
</div></div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
  // Get all accordion headers
  const accordionHeaders = document.querySelectorAll('.accordion-header');

  // Add click event listeners to each accordion header
  accordionHeaders.forEach(header => {
    header.addEventListener('click', function () {
      // Toggle active class for accordion button (if needed)
      this.classList.toggle('active');
      
      // Optionally, you can handle accordion collapsing/expanding behavior here
      
      // Get the link from the accordion header
      const link = this.querySelector('a');
      
      // Redirect to the link
      if (link) {
        const url = link.getAttribute('href');
        if (url) {
          window.open(url, '_blank');
        }
      }
    });
  });
});
</script>
</body>
</html>