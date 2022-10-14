
  <?php
  include("include/head.php");
  ?>


  <link rel="stylesheet" href="aroma-master/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="aroma-master/css/style.css">


<!-- Stylesheets 
<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/owl.carousel.min.css">
	<link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
	<link rel="stylesheet" href="assets/css/jquery.bxslider.min.css">
    <link rel="stylesheet" href="assets/css/magnific-popup.css">
    <link rel="stylesheet" href="assets/css/rating.css">
	<link rel="stylesheet" href="assets/css/spacing.css">
	<link rel="stylesheet" href="assets/css/bootstrap-touch-slider.css">
	<link rel="stylesheet" href="assets/css/animate.min.css">
	<link rel="stylesheet" href="assets/css/tree-menu.css">
	<link rel="stylesheet" href="assets/css/select2.min.css">
	<link rel="stylesheet" href="assets/css/main.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

	<script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"></script>

  -->
</head>

<body class="sub_page">
  <div class="hero_area">
    <!-- header section strats -->
    
    <?php
    include("include/header.php");
    ?>

    <!-- end header section -->
  </div>

  <?php
$statement = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
    $banner_product_category = $row['banner_product_category'];
}
?>

<?php
if( !isset($_REQUEST['id']) || !isset($_REQUEST['type']) ) {
    header('location: index.php');
    exit;
} else {

    if( ($_REQUEST['type'] != 'top-category') && ($_REQUEST['type'] != 'mid-category') && ($_REQUEST['type'] != 'end-category') ) {
        header('location: index.php');
        exit;
    } else {

        $statement = $pdo->prepare("SELECT * FROM tbl_top_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $top[] = $row['tcat_id'];
            $top1[] = $row['tcat_name'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_mid_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $mid[] = $row['mcat_id'];
            $mid1[] = $row['mcat_name'];
            $mid2[] = $row['tcat_id'];
        }

        $statement = $pdo->prepare("SELECT * FROM tbl_end_category");
        $statement->execute();
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
        foreach ($result as $row) {
            $end[] = $row['ecat_id'];
            $end1[] = $row['ecat_name'];
            $end2[] = $row['mcat_id'];
        }

        if($_REQUEST['type'] == 'top-category') {
            if(!in_array($_REQUEST['id'],$top)) {
                header('location: index.php');
                exit;
            } else {

                // Getting Title
                for ($i=0; $i < count($top); $i++) { 
                    if($top[$i] == $_REQUEST['id']) {
                        $title = $top1[$i];
                        break;
                    }
                }
                $arr1 = array();
                $arr2 = array();
                // Find out all ecat ids under this
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid2[$i] == $_REQUEST['id']) {
                        $arr1[] = $mid[$i];
                    }
                }
                for ($j=0; $j < count($arr1); $j++) {
                    for ($i=0; $i < count($end); $i++) { 
                        if($end2[$i] == $arr1[$j]) {
                            $arr2[] = $end[$i];
                        }
                    }   
                }
                $final_ecat_ids = $arr2;
            }   
        }

        if($_REQUEST['type'] == 'mid-category') {
            if(!in_array($_REQUEST['id'],$mid)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($mid); $i++) { 
                    if($mid[$i] == $_REQUEST['id']) {
                        $title = $mid1[$i];
                        break;
                    }
                }
                $arr2 = array();        
                // Find out all ecat ids under this
                for ($i=0; $i < count($end); $i++) { 
                    if($end2[$i] == $_REQUEST['id']) {
                        $arr2[] = $end[$i];
                    }
                }
                $final_ecat_ids = $arr2;
            }
        }

        if($_REQUEST['type'] == 'end-category') {
            if(!in_array($_REQUEST['id'],$end)) {
                header('location: index.php');
                exit;
            } else {
                // Getting Title
                for ($i=0; $i < count($end); $i++) { 
                    if($end[$i] == $_REQUEST['id']) {
                        $title = $end1[$i];
                        break;
                    }
                }
                $final_ecat_ids = array($_REQUEST['id']);
            }
        }
        
    }   
}
?>



  <!-- brand section -->

  <section class="brand_section layout_padding">
    <div class="container">
      <div class="heading_container">
        <h2>
          Featured Brands <?php echo LANG_VALUE_50; ?> <?php echo $title; ?>
        </h2>
      </div>
      <div class="brand_container layout_padding2">
        
        <div class="container">
          <div class="row">
            

         <!-- <div class="col-md-3">
                <?php// require_once('sidebar-category.php'); ?>
            </div> -->



          <!-- php code -->
      <?php
               //include("include/connection.php");
               
               $q="select * from tbl_product order by p_id desc";
               $r=mysqli_query($con,$q);
               while($row=mysqli_fetch_array($r))
               {
                  $id= $row['p_id'];
                  $productname= $row['p_name'];
                  //$category= $row['category'];
                  $price= $row['p_current_price'];
                  //$quantity= $row['quantity'];
                  //$status= $row['status'];
                  $photo= $row['p_featured_photo'];
                  $ecat_id1 = $row['ecat_id'];


// Getting all categories name for breadcrumb
$statement = $pdo->prepare("SELECT
t1.ecat_id,
t1.ecat_name,
t1.mcat_id,

t2.mcat_id,
t2.mcat_name,
t2.tcat_id,

t3.tcat_id,
t3.tcat_name

FROM tbl_end_category t1
JOIN tbl_mid_category t2
ON t1.mcat_id = t2.mcat_id
JOIN tbl_top_category t3
ON t2.tcat_id = t3.tcat_id
WHERE t1.ecat_id=?");
$statement->execute(array($ecat_id1));
$total = $statement->rowCount();
$result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
foreach ($result as $row) {
$ecat_name = $row['ecat_name'];
$mcat_id = $row['mcat_id'];
$mcat_name = $row['mcat_name'];
$tcat_id = $row['tcat_id'];
$tcat_name = $row['tcat_name'];
}
               
               ?>
            
    
            <div class="col-md-6 col-lg-4 col-xl-3">
              <div class="card text-center card-product">
                <div class="card-product__img" style=" display: flex; height: 250px; align-items: center; justify-content: center;" >
                  <img class="card-img" src="assets\uploads\<?php echo $photo; ?>" alt="" style="max-width: fit-content; max-height: 100%; " >
                  <!-- <ul class="card-product__imgOverlay">
                    <li><button style="background: #24d278;" ><i class="ti-search"></i></button></li>
                    <li><a href="product.php?id=<?php //echo $id; ?>"><button style="background: #24d278;" ><i class="ti-shopping-cart"></i></button></a></li>
                    <li><button style="background: #24d278;" ><i class="ti-heart"></i></button></li>
                  </ul> -->
                </div>
                <div class="card-body">
                  <?php
 
                  ?>
                  <p><?php echo $mcat_name; ?></p>
                  <h4 class="card-product__title"><a href="product.php?id=<?php echo $id; ?>"><?php echo $productname; ?></a></h4>
                  <p class="card-product__price"><?php echo LANG_VALUE_1; ?><?php echo $price; ?>.00</p>
                </div>
              </div>
            </div>

            <?php
               }
            ?>
    
            
    
          </div> 
        </div>


      </div>
      <a href="" class="brand-btn">
        See More
      </a>
    </div>
  </section>

  <!-- end brand section -->


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