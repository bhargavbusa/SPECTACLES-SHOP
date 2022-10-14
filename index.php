
  <?php
  include("include/head.php");
  ?>
  
  
	<link rel="stylesheet" href="aroma-master/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="aroma-master/css/style.css">
  
  
</head>
<?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row)
{
    $cta_title = $row['cta_title'];
    $cta_content = $row['cta_content'];
    $cta_read_more_text = $row['cta_read_more_text'];
    $cta_read_more_url = $row['cta_read_more_url'];
    $cta_photo = $row['cta_photo'];
    $featured_product_title = $row['featured_product_title'];
    $featured_product_subtitle = $row['featured_product_subtitle'];
    $latest_product_title = $row['latest_product_title'];
    $latest_product_subtitle = $row['latest_product_subtitle'];
    $popular_product_title = $row['popular_product_title'];
    $popular_product_subtitle = $row['popular_product_subtitle'];
    $total_featured_product_home = $row['total_featured_product_home'];
    $total_latest_product_home = $row['total_latest_product_home'];
    $total_popular_product_home = $row['total_popular_product_home'];
    $home_service_on_off = $row['home_service_on_off'];
    $home_welcome_on_off = $row['home_welcome_on_off'];
    $home_featured_product_on_off = $row['home_featured_product_on_off'];
    $home_latest_product_on_off = $row['home_latest_product_on_off'];
    $home_popular_product_on_off = $row['home_popular_product_on_off'];
    $home_testimonial_on_off=$row['home_testimonial_on_off'];

}


?>
<body>
  <div class="hero_area" >
    <!-- header section strats -->
    
    <?php
    include("include/header.php");
    ?>

    <!-- end header section -->
    <!-- slider section -->
    <section class="slider_section ">
      <div class="play_btn">
        <a href="">
        <i class="fa fa-circle" style="font-size:30px;color:#24d278" ></i>
        </a>
      </div>
      <div class="number_box">
        <div>
          <ol class="carousel-indicators indicator-2">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active">01</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1">02</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2">03</li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3">04</li>
          </ol>
        </div>
      </div>
      <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                        Glasses
                      </span>
                    </h1>
                    <p>
                    Spectacles glass online shopping system is a process in which people are being provided with the option of purchasing goods and services directly from the seller, all in a real-time environment. 
                    </p>
                    <div class="btn-box">
                      <a href="#<?php echo LANG_VALUE_6; ?>" class="btn-1">
                        <?php echo LANG_VALUE_6; ?>
                      </a>
                      <a href="#<?php echo $contact_title;  ?>" class="btn-2">
                        <?php echo $contact_title;  ?>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="images/a2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                      Glasses
                      </span>
                    </h1>
                    <p>
                    Spectacles glass online shopping system is a process in which people are being provided with the option of purchasing goods and services directly from the seller, all in a real-time environment. 
                    </p>
                    <div class="btn-box">
                      <a href="#<?php echo LANG_VALUE_6; ?>" class="btn-1">
                      <?php echo LANG_VALUE_6; ?>
                      </a>
                      <a href="#<?php echo $contact_title;  ?>" class="btn-2">
                        <?php echo $contact_title;  ?>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="images/a2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                      Glasses
                      </span>
                    </h1>
                    <p>
                    Spectacles glass online shopping system is a process in which people are being provided with the option of purchasing goods and services directly from the seller, all in a real-time environment. 
                    </p>
                    <div class="btn-box">
                      <a href="#<?php echo LANG_VALUE_6; ?>" class="btn-1">
                        <?php echo LANG_VALUE_6; ?>
                      </a>
                      <a href="#<?php echo $contact_title;  ?>" class="btn-2">
                        <?php echo $contact_title;  ?>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="images/a2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="carousel-item ">
              <div class="row">
                <div class="col-md-6">
                  <div class="detail-box">
                    <h1>
                      The Latest
                      <span>
                      Glasses
                      </span>
                    </h1>
                    <p>
                    Spectacles glass online shopping system is a process in which people are being provided with the option of purchasing goods and services directly from the seller, all in a real-time environment.
                    </p>
                    <div class="btn-box">
                      <a href="#<?php echo LANG_VALUE_6; ?>" class="btn-1">
                        <?php echo LANG_VALUE_6; ?>
                      </a>
                      <a href="#<?php echo $contact_title;  ?>" class="btn-2">
                        <?php echo $contact_title;  ?>
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 img-container">
                  <div class="img-box">
                    <img src="images/a2.png" alt="">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end slider section -->
  </div>


  <!-- about section -->

  <?php
$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
   $about_title = $row['about_title'];
    $about_content = $row['about_content'];
    $about_banner = $row['about_banner'];
}
?>
  <section class="about_section layout_padding" id="<?php echo LANG_VALUE_6; ?>">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
              <?php echo $about_title; ?>
              </h2>

            </div>
            <p>
              <?php echo $about_content; ?>
            </p>
            <a href="">
              <?php echo LANG_VALUE_6; ?>
            </a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="assets/uploads/<?php echo $about_banner; ?>" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end about section -->

  <!-- trending section -->

  <section class="trending_section layout_padding">
    <div id="accordion">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="detail-box">
              <div class="heading_container">
                <h2>
                  Trending Categories
                </h2>
              </div>
              <div class="tab_container">
                <div class="t-link-box" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                  aria-controls="collapseOne">
                  <div class="number">
                    <h5>
                      01
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      eye Glass
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseTwo"
                  aria-expanded="false" aria-controls="collapseTwo">
                  <div class="number">
                    <h5>
                      02
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      eye Glass
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseThree"
                  aria-expanded="false" aria-controls="collapseThree">
                  <div class="number">
                    <h5>
                      03
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      eye Glass
                    </h5>
                  </div>
                </div>
                <div class="t-link-box collapsed" data-toggle="collapse" data-target="#collapseFour"
                  aria-expanded="false" aria-controls="collapseFour">
                  <div class="number">
                    <h5>
                      04
                    </h5>
                  </div>
                  <hr>
                  <div class="t-name">
                    <h5>
                      eye Glass
                    </h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">

                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>
            <div class="collapse" id="collapseFour" aria-labelledby="headingfour" data-parent="#accordion">
              <div class="img_container ">
                <div class="box b-1">
                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>

                  <div class="img-box">
                    <img src="images/t-1.jpg" alt="">
                  </div>
                </div>
                <div class="box b-2">
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                  <div class="img-box">
                    <img src="images/t-2.jpg" alt="">
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>

  <!-- end trending section -->

  <!-- discount section -->

  <section class="discount_section  layout_padding">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <div class="detail-box">
            <h2>
              The Latest Collection
            </h2>
            <h2 class="main_heading">
              50% DISCOUNT
            </h2>

            <div class="">
              <a href="">
                Buy Now
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img-box">
            <img src="images/discount-img.png" alt="">
          </div>
        </div>
      </div>
    </div>
  </section>


  <!-- end discount section -->

  <!-- brand section -->

  <?php
  //POPULAR PRODUCTS
  include("include/producti.php");
  //LATEST PRODUCTS
  include("include/l_producti.php");
  //FEATURED PRODUCTS
  include("include/f_producti.php");

  ?>

  <!-- end brand section -->
  <?php if($home_service_on_off == 1): ?>
<div class="service bg-gray" style="padding-top: 50px;">
<div class="container ">
      <div class="heading_container">
      <h2 style="margin-bottom: 65px;">Product Service </h2>
      </div>
      
    </div>
    <div class="container">
        <div class="row">
            <?php
                $statement = $pdo->prepare("SELECT * FROM tbl_service");
                $statement->execute();
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row) {
                    ?>
                    <div class="col-md-4" style="    text-align: center;" >
                        <div class="item">
                            <div class="photo"><img src="assets/uploads/<?php echo $row['photo']; ?>" width="150px" alt="<?php echo $row['title']; ?>"></div>
                            <h3><?php echo $row['title']; ?></h3>
                            <p>
                                <?php echo nl2br($row['content']); ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
            ?>
        </div>
    </div>
</div>
<?php endif; ?>
  <!-- contact section -->

  <?php
  if($home_testimonial_on_off == 1):
  include("include/contacti.php"); 
endif; 

  ?>

  <!-- end contact section -->

  
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