
  <?php
  include("include/head.php");
  ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="aroma-master/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="aroma-master/css/style.css">



<link rel="stylesheet" href="assets/css/main1.css">
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    
    <?php
    include("include/header.php");
    ?>

    <!-- end header section -->
  </div>

  
<div class="page">
    <div class="container">
        <div class="row">            
            <div class="col-md-12">
                <p>
                    <h3 style="margin-top:20px;"><?php echo LANG_VALUE_121; ?></h3>
                    <a href="index.php" class="btn btn-success"><?php echo "Home" ?></a>
                </p>
            </div>
        </div>
    </div>
</div>


  
  <!-- info section -->
  
  <?php
  include("include/info.php");
  ?>

  <!-- end info_section -->


  <!-- footer section -->
  
  <?php
  include("include/footer.php");
  ?>

  <!-- end  footer section -->


  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.2.1/owl.carousel.min.js">
  </script>
  <script type="text/javascript">
    $(".owl-carousel").owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      navText: [],
      autoplay: true,
      autoplayHoverPause: true,
      responsive: {
        0: {
          items: 1
        },
        420: {
          items: 2
        },
        1000: {
          items: 5
        }
      }

    });
  </script>
  <script>
    var nav = $("#navbarSupportedContent");
    var btn = $(".custom_menu-btn");
    btn.click
    btn.click(function (e) {

      e.preventDefault();
      nav.toggleClass("lg_nav-toggle");
      document.querySelector(".custom_menu-btn").classList.toggle("menu_btn-style")
    });
  </script>
  <script>
    $('.carousel').on('slid.bs.carousel', function () {
      $(".indicator-2 li").removeClass("active");
      indicators = $(".carousel-indicators li.active").data("slide-to");
      a = $(".indicator-2").find("[data-slide-to='" + indicators + "']").addClass("active");
      console.log(indicators);

    })
  </script>

</body>
</body>

</html>