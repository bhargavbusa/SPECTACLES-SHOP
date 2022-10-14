
  <?php
  include("include/head.php");
  ?>

  <link rel="stylesheet" href="aroma-master/vendors/themify-icons/themify-icons.css">
  <link rel="stylesheet" href="aroma-master/css/style.css">

  
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
    $banner_registration = $row['banner_registration'];
}
?>

<?php
if (isset($_POST['form1'])) {

    $valid = 1;

    if(empty($_POST['cust_name'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_123."<br>";
    }

    if(empty($_POST['cust_email'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_131."<br>";
    } else {
        if (filter_var($_POST['cust_email'], FILTER_VALIDATE_EMAIL) === false) {
            $valid = 0;
            $error_message .= LANG_VALUE_134."<br>";
        } else {
            $statement = $pdo->prepare("SELECT * FROM tbl_customer WHERE cust_email=?");
            $statement->execute(array($_POST['cust_email']));
            $total = $statement->rowCount();                            
            if($total) {
                $valid = 0;
                $error_message .= LANG_VALUE_147."<br>";
            }
        }
    }

    if(empty($_POST['cust_phone'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_124."<br>";
    }

    if(empty($_POST['cust_address'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_125."<br>";
    }

    if(empty($_POST['cust_country'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_126."<br>";
    }

    if(empty($_POST['cust_city'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_127."<br>";
    }

    if(empty($_POST['cust_state'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_128."<br>";
    }

    if(empty($_POST['cust_zip'])) {
        $valid = 0;
        $error_message .= LANG_VALUE_129."<br>";
    }

    if( empty($_POST['cust_password']) || empty($_POST['cust_re_password']) ) {
        $valid = 0;
        $error_message .= LANG_VALUE_138."<br>";
    }

    if( !empty($_POST['cust_password']) && !empty($_POST['cust_re_password']) ) {
        if($_POST['cust_password'] != $_POST['cust_re_password']) {
            $valid = 0;
            $error_message .= LANG_VALUE_139."<br>";
        }
    }

    if($valid == 1) {

        $token = md5(time());
        $cust_datetime = date('Y-m-d h:i:s');
        $cust_timestamp = time();

        // saving into the database
        $statement = $pdo->prepare("INSERT INTO tbl_customer (
                                        cust_name,
                                        cust_cname,
                                        cust_email,
                                        cust_phone,
                                        cust_country,
                                        cust_address,
                                        cust_city,
                                        cust_state,
                                        cust_zip,
                                        cust_b_name,
                                        cust_b_cname,
                                        cust_b_phone,
                                        cust_b_country,
                                        cust_b_address,
                                        cust_b_city,
                                        cust_b_state,
                                        cust_b_zip,
                                        cust_s_name,
                                        cust_s_cname,
                                        cust_s_phone,
                                        cust_s_country,
                                        cust_s_address,
                                        cust_s_city,
                                        cust_s_state,
                                        cust_s_zip,
                                        cust_password,
                                        cust_token,
                                        cust_datetime,
                                        cust_timestamp,
                                        cust_status
                                    ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $statement->execute(array(
                                        strip_tags($_POST['cust_name']),
                                        '',
                                        strip_tags($_POST['cust_email']),
                                        strip_tags($_POST['cust_phone']),
                                        strip_tags($_POST['cust_country']),
                                        strip_tags($_POST['cust_address']),
                                        strip_tags($_POST['cust_city']),
                                        strip_tags($_POST['cust_state']),
                                        strip_tags($_POST['cust_zip']),
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        '',
                                        md5($_POST['cust_password']),
                                        $token,
                                        $cust_datetime,
                                        $cust_timestamp,
                                        0
                                    ));

        // Send email for confirmation of the account
        $to = $_POST['cust_email'];
        
        $subject = LANG_VALUE_150;
        $verify_link = BASE_URL.'verify.php?email='.$to.'&token='.$token;
        $message = '
'.LANG_VALUE_151.'<br><br>

<a href="'.$verify_link.'">'.$verify_link.'</a>';

        $headers = "From: noreply@" . BASE_URL . "\r\n" .
                   "Reply-To: noreply@" . BASE_URL . "\r\n" .
                   "X-Mailer: PHP/" . phpversion() . "\r\n" . 
                   "MIME-Version: 1.0\r\n" . 
                   "Content-Type: text/html; charset=ISO-8859-1\r\n";
        
        // Sending Email
        //mail($to, $subject, $message, $headers);

        unset($_POST['cust_name']);
        unset($_POST['cust_cname']);
        unset($_POST['cust_email']);
        unset($_POST['cust_phone']);
        unset($_POST['cust_address']);
        unset($_POST['cust_city']);
        unset($_POST['cust_state']);
        unset($_POST['cust_zip']);

        $success_message = LANG_VALUE_152;
    }
}
?>


  <!-- trending section -->

  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container" style="margin-top: 5%;margin-bottom: 5%;" >
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img" style="height: 885px;" >
						<div class="hover">
							<h4>Already have an account?</h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3><?php echo LANG_VALUE_16; ?></h3>
            <?php
                                if($error_message != '') {
                                    echo "<div class='error' style='padding: 10px;background:#f1f1f1;color:red;margin-bottom:20px;'>".$error_message."</div>";
                                }
                                if($success_message != '') {
                                    echo "<div class='success' style='padding: 10px;background:#f1f1f1;margin-bottom:20px;'>".$success_message."</div>";
                                }
                                ?>
						<form class="row login_form" action="" id="register_form"  method="post" >
            <?php $csrf->echoInputField(); ?>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="name" name="cust_name" value="<?php if(isset($_POST['cust_name'])){echo $_POST['cust_name'];} ?>" placeholder="<?php echo LANG_VALUE_102; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Full Name'">
							</div>
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="cust_email" value="<?php if(isset($_POST['cust_email'])){echo $_POST['cust_email'];} ?>" placeholder="<?php echo LANG_VALUE_94; ?>"  onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
              </div>
              
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="phoneno" value="<?php if(isset($_POST['cust_phone'])){echo $_POST['cust_phone'];} ?>" name="cust_phone" placeholder="<?php echo LANG_VALUE_104; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'phoneno'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="address" name="cust_address" value="<?php if(isset($_POST['cust_address'])){echo $_POST['cust_address'];} ?>" placeholder="<?php echo LANG_VALUE_105; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'address'">
              </div>
              
              <div class="col-md-12 form-group">
                <select name="cust_country" class="form-control select2">
                  <option value="">Select country</option>
                    <?php
                      $statement = $pdo->prepare("SELECT * FROM tbl_country ORDER BY country_name ASC");
                      $statement->execute();
                      $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                      foreach ($result as $row) {
                      ?>
                      <option value="<?php echo $row['country_id']; ?>"><?php echo $row['country_name']; ?></option>
                      <?php
                      }
                      ?>    
                </select>                                    
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="city" name="cust_city" value="<?php if(isset($_POST['cust_city'])){echo $_POST['cust_city'];} ?>" placeholder="<?php echo LANG_VALUE_107; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'city'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="state" name="cust_state" value="<?php if(isset($_POST['cust_state'])){echo $_POST['cust_state'];} ?>" placeholder="<?php echo LANG_VALUE_108; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'state'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="pincode" name="cust_zip" value="<?php if(isset($_POST['cust_zip'])){echo $_POST['cust_zip'];} ?>" placeholder="<?php echo LANG_VALUE_109; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'pincode'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="password" name="cust_password" placeholder="<?php echo LANG_VALUE_96; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
              </div>
              <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="password" name="cust_re_password" placeholder="<?php echo LANG_VALUE_98; ?>" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
              </div>
              
							<div class="col-md-12 form-group">
								<div class="creat_account">
									
									
								</div>
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="button button-register w-100" name="form1" ><?php echo LANG_VALUE_15; ?></button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Login Box Area =================-->



  <!-- end trending section -->


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