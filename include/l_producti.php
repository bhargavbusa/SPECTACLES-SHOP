<!-- ================ trending product section start ================= -->  

<?php if($home_popular_product_on_off == 1): ?>
  <section class="contact_section layout_padding" style="padding-bottom: 45px;padding-top: 70px;">
    <div class="container ">
      <div class="heading_container">
      <h2 style="margin-bottom: 0px;"><?php echo $popular_product_title; ?></h2>
      </div>
      <h6 style="margin-bottom: 65px;" ><?php echo $popular_product_subtitle; ?></h6>
      
    </div>
    <div class="container">
      <div class="row">
      
      <!-- php code -->
      <?php
               //include("include/connection.php");
               
               $statement = $pdo->prepare("SELECT * FROM tbl_product WHERE p_is_active=? ORDER BY p_total_view DESC LIMIT ".$total_popular_product_home);
                $statement->execute(array(1));
                $result = $statement->fetchAll(PDO::FETCH_ASSOC);                            
                foreach ($result as $row)
               {
                  $id= $row['p_id'];
                  $productname= $row['p_name'];
                  $p_quantity = $row['p_qty'];
                 // $category= $row['category'];
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
  </section>
  <?php endif; ?>
  <!-- ================ trending product section end ================= -->  
