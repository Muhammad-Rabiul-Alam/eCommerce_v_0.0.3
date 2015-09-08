 <style>
  .nav-tabs > li, .nav-pills > li {
      float:none;
      display:inline-block;
      *display:inline; /* ie7 fix */
       zoom:1; /* hasLayout ie7 trigger */
  }

  .nav-tabs, .nav-pills {
      text-align:center;
  }
</style>
<section>
  <ul class="nav nav-tabs">
    <?php for($k=0;$k<4;$k++): $tia="active"; if($k!=0) $tia=""; ?>
    <li class="<?= $tia; ?>"><a data-toggle="tab" href="#<?= $tab[$k]; ?>"><?= $tab[$k]; ?></a></li>
    <?php endfor; ?>
  </ul>

  <div class="tab-content">

    <?php for($k=0;$k<4;$k++): $tia="active"; if($k!=0) $tia=""; ?>
      <div id="<?= $tab[$k]; ?>" class="tab-pane fade in <?= $tia; ?>">
        <br>
        <div id="<?= $tab[$k]; ?>1" class="carousel slide">
          <!-- Carousel items -->
          <div class="carousel-inner">
            <?php for($j=0;$j<3;$j++): if($j==0) $ia="active"; else $ia="";?>    
              <div class="item <?= $ia; ?>">
                  <div class="row-fluid">
                    <?php for($i=0;$i<6;$i++): ?>
                      <div class="col-lg-2"><a href="#x" class="thumbnail"><img src="http://placehold.it/250x250" alt="Image" style="max-width:100%;"></a></div>
                    <?php endfor; ?>
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