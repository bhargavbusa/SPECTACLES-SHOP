
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

  <!-- trending section -->
  <?php
  
  if(isset($_POST['oks']))
      {
         $email = $_POST['email'];
         $oldpassword = $_POST['oldpassword'];
         $password = $_POST['newpassword'];
         $confirmpassword = $_POST['confirmPassword'];
         
        
         $q="select * from tbl_customer where cust_email='$email';";
         $r=mysqli_query($con,$q);
         $count=mysqli_num_rows($r);
         if($count ==1)
         {
            while($row=mysqli_fetch_array($r))
            {
               $dconfirmpassword=$row['cust_password'];
               
            }
      
            if($dconfirmpassword == md5($oldpassword))
            {
               if($password == $confirmpassword)
               {  $newpassword = md5($password);
                  $qa="UPDATE tbl_customer SET 	cust_password = '$newpassword' WHERE cust_email = '$email';";
                  $ra=mysqli_query($con,$qa);
         
                  echo "<script>alert('change password sucessfully')</script>";
                  echo "<script>window.location='login.php';</script>";
               }
               else{
                  echo "<script>alert('confirm Password is wrong');</script>";
               }
            }
            else{
               echo "<script>alert('old Password is wrong');</script>";
            }
         }
         else{
            echo "<script>alert('Email address invalid');</script>";
         }
         
      }
      

  ?>

  <!--================Login Box Area =================-->
	<section class="login_box_area section-margin">
		<div class="container" style="margin-top: 5%;margin-bottom: 5%;" >
			<div class="row">
				<div class="col-lg-6">
					<div class="login_box_img">
						<div class="hover">
							<h4> Forgot Password? </h4>
							<p>There are advances being made in science and technology everyday, and a good example of this is the</p>
							<a class="button button-account" href="login.php">Login Now</a>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="login_form_inner register_form_inner">
						<h3> Forgot Password </h3>
						<form class="row login_form" name="f" method="post" id="register_form" >
							
							<div class="col-md-12 form-group">
								<input type="text" class="form-control" id="email" name="email" placeholder="Email Address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="oldpassword" name="oldpassword" placeholder="Old Password" onfocus="this.placeholder = ''" onblur="this.placeholder = ' old Password'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="newpassword" name="newpassword" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'">
                            </div>
                            <div class="col-md-12 form-group">
								<input type="text" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'">
							</div>
							<div class="col-md-12 form-group">
								
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" name="oks" class="button button-register w-100">Forgot Password</button>
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