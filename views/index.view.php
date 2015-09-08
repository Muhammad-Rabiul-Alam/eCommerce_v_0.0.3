<style>
  .carousel-big{background: radial-gradient(#C3C7CC, #A2A8AF, #878F98);}
  .carousel-caption{text-align: left;}
  .image{margin-left: 600px;}
  .product-cat{color:#DD4E4E;font-size: 55px;}
</style>
<br>
<section>
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner carousel-big" role="listbox">
          <div class="item active">
            <img class="image" src="assets/img/carousel/s-slide-4.png" alt="Chania" style="height:400px;">
            <div class="carousel-caption" align="left">
              <p class="product-cat">Sale day</p>
              <h1 class="title">$50 off</h1>
              <h2 class="subtitle">on orders over $199</h2>
            </div>
          </div>

          <div class="item">
            <img class="image" src="assets/img/carousel/s-slide-5.png" alt="Chania" style="height:400px;">
            <div class="carousel-caption" align="left">
              <p class="product-cat">Sale day</p>
              <h1 class="title">All The Trends</h1>
              <h2 class="subtitle">You Need This Season</h2>
            </div>
          </div>

          <div class="item">
            <img class="image" src="assets/img/carousel/s-slide-6.png" alt="Chania" style="height:400px;">
            <div class="carousel-caption" align="left">
              <p class="product-cat">Sale day</p>
              <h1 class="title">Luxury Collection</h1>
              <h2 class="subtitle">on orders over $39</h2>
            </div>
          </div>
        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>
<br>

<?//php $tab=array("Best-Seller","Featured","Deals","New-Arrivals");?>
<?//php include "views/cat_wise_gellary.view.php"; ?>
<!-- <br><br> -->

<?//php include "views/parallex.view.php"; ?>
<!-- <br><br> -->

<?php $tab=array("Men","Women","Kids","Accessories");?>
<?php include "views/cat_wise_gellary.view.php"; ?>
<br><br>

<?php 
  $img="assets/img/bg/bg-demo-3.jpg"; 
  $txt="
        <div style='text-align: center;'>
          <h1>GIFT VOUCHER</h1><br>
          <p>Excepteur sint occaecat cupidatat non proident, 
             sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p><br>
          <a href='' class='btn btn-danger'>Get Gift Voucher</a>
        </div>
       ";
  include "views/parallex.view.php"; 
?>
<br><br>

<?php $tab=array("Electronics","Computer","Smartphone","Camera");?>
<?php include "views/cat_wise_gellary.view.php"; ?>
<br><br>

<?php 
  $img="assets/img/bg/bg-demo-4.jpg"; 
  $txt="
    <div class='panel panel-default' style='text-align: center; background: linear-gradient(to right, rgba(255,0,0,.06), rgba(255,0,0,.4));'>
      <div class='panel-body'>
        <h1> OUR STORE </h1>
        <p>Pzza Martiri Olivetta, 16, 16034, Portofino, Italy </p>
        
        ----------------
        
        <h3>Opening Hours</h3>
        <br>
        <p>Monday to Friday: 9am - 6pm</p>
        <p>Saturday to Sunday: 10am - 4pm</p>
      </div>
    </div>
  "; 
  include "views/parallex.view.php"; 
?>