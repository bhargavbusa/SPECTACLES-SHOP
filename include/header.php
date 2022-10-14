<?php echo $after_body; ?>
<header class="header_section">
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container">
          <a class="navbar-brand" href="index.php">
            <img style="width: 110px;" src="assets/uploads/<?php echo $logo; ?>" alt="" />
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
              </li>
              

              <?php
							$statement = $pdo->prepare("SELECT * FROM tbl_top_category WHERE show_on_menu=1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								?>
								<li class="nav-item"><a class="nav-link" href="product-category.php?id=<?php echo $row['tcat_id']; ?>&type=top-category"><?php echo $row['tcat_name']; ?></a>
								</li>
								<?php
							}
							?>
              
              <?php
							$statement = $pdo->prepare("SELECT * FROM tbl_page WHERE id=1");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);		
							foreach ($result as $row) {
								$faq_title = $row['faq_title'];
								$blog_title = $row['blog_title'];
								$contact_title = $row['contact_title'];
								$pgallery_title = $row['pgallery_title'];
								$vgallery_title = $row['vgallery_title'];
							}
							?>

              <li class="nav-item">
                <a class="nav-link" href="contact.php"><?php echo $contact_title;  ?></a>
              </li>
              
              
              <?php
                if(isset($_SESSION['customer'])){
                  ?>
                  <li class="nav-item">
                    <a class="nav-link" href="customer-order.php"><?php echo LANG_VALUE_24; ?></a>
                  </li>
                  <li class="nav-item">
                   <a class="nav-link" href="logout.php"><?php echo LANG_VALUE_14; ?></a>
                  </li>
                  <?php
                }
              ?>
            </ul>
            
          

            <div class="user_option">
            <a href="cart.php">
                <span>
                  <i class='fas fa-cart-arrow-down'></i>
                  <?php echo LANG_VALUE_18; ?> (<?php echo LANG_VALUE_1; ?>
                  <?php
                  if(isset($_SESSION['cart_p_id'])) 
                  {
                    $table_total_price = 0;
                    $i=0;
                    foreach($_SESSION['cart_p_qty'] as $key => $value) 
	                  {
                      $i++;
	                    $arr_cart_p_qty[$i] = $value;
	                  }                    $i=0;
	                  foreach($_SESSION['cart_p_current_price'] as $key => $value) 
	                  {
	                    $i++;
	                    $arr_cart_p_current_price[$i] = $value;
	                  }
	                  for($i=1;$i<=count($arr_cart_p_qty);$i++) 
                    {
	                   	$row_total_price = $arr_cart_p_current_price[$i]*$arr_cart_p_qty[$i];
	                    $table_total_price = $table_total_price + $row_total_price;
	                  }
                    echo $table_total_price;
                  } 
                  else 
                  {
                    echo '0.00';
                  }
                  ?>)
                  &nbsp;&nbsp;
                </span>
              </a>

            
            <?php
             if(isset($_SESSION['customer']))
             {
              ?>
              <a href="customer-profile-update.php">
                <img src="images/user.png" alt="">
                <span>
                <?php echo LANG_VALUE_13; ?> <?php echo $_SESSION['customer']['cust_name']; ?> 
                </span>
              </a>

             
              <?php
             }
             else
             {
              ?>
              <a href="login.php">
                <img src="images/user.png" alt="">
                <span>
                  Login
                </span>
              </a>

              <a href="register.php">
                &nbsp;&nbsp;
                <span>
                  Register
                </span>
              </a>
              <?php
             }
          ?>
              
              <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit"></button>
              </form>
            </div>
          </div>
          <div>
            <div class="custom_menu-btn ">
              <button>
                <span class=" s-1">

                </span>
                <span class="s-2">

                </span>
                <span class="s-3">

                </span>
              </button>
            </div>
          </div>

        </nav>
      </div>
    </header>