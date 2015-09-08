 <style>
  .tab-content{background: white;}
  .nav-tabs > li, .nav-pills > li {
      float:none;
      display:inline-block;
      *display:inline; /* ie7 fix */
       zoom:1; /* hasLayout ie7 trigger */
  }

  .nav-tabs, .nav-pills {
      text-align:center;
  }

  .carousel-control{max-width: 80px;}
  .carousel .carousel-control { visibility: hidden; }
  .carousel:hover .carousel-control { visibility: visible; }
</style>

<section>
  <ul class="nav nav-tabs">
    <?php for($k=0;$k<4;$k++): $tia="active"; if($k!=0) $tia=""; ?>
    <li class="<?= $tia; ?>"><a data-toggle="tab" href="#<?= $tab[$k]; ?>"><?= $tab[$k]; ?></a></li>
    <?php endfor; ?>
  </ul>

  <div class="tab-content">

    <?php for($k=0;$k<4;$k++): $tia="active"; if($k!=0) $tia=""; $qa['cat_name']=$tab[$k]; ?>
      <div id="<?= $tab[$k]; ?>" class="tab-pane fade in <?= $tia; ?>">
        <br>
        <div id="<?= $tab[$k]; ?>1" class="carousel slide">
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php for($j=0;$j<2;$j++): 
                    if($j==0) $ia="active"; 
                    else $ia="";
                    $sql=search($j*6,6,$qa);
                    $show=$sql->fetchAll(PDO::FETCH_ASSOC);
            ?>    
              <div class="item <?= $ia; ?>">
                  <div class="row-fluid">
                    <?php foreach($show as $print): ?>
                      <div class="col-lg-2">

                        <a href="product/single_product.php?product_id=<?= $print['product_id']; ?>" class="thumbnail">
                          <img src="assets/img/<?= $print['product_id']; ?>.jpg" alt="Image of <?= $print['product_name']; ?>" style="max-width:100%;"> <!-- src="http://placehold.it/250x250" style="max-width:100%;" -->
                        </a>
                        
                      </div>
                    <?php endforeach; ?>
                  </div><!--/row-fluid-->
              </div><!--/item-->
            <?php endfor; ?>
          </div><!--/carousel-inner-->
          <!-- Left and right controls -->
    
          <a class="left carousel-control" href="#<?= $tab[$k]; ?>1" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#<?= $tab[$k]; ?>1" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>    
        <script> $(document).ready(function() { id='#<?= $tab[$k]; ?>1'; $(id).carousel({ interval: 2000  }) }); </script>
      </div>
    <?php endfor; ?>
      
  </div>
</section>