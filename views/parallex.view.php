<style>
 /* #intro { 
    background: url(assets/img/1.jpg) 50% 0 fixed; 
    height: auto;  
    margin: 0 auto; 
    width: 100%; 
    position: relative; 
    box-shadow: 0 0 50px rgba(0,0,0,0.8);
    padding: 100px 0;
}*/
/*#home { 
    background: url(assets/img/2.jpg) 50% 0 fixed; 
    height: auto;  
    margin: 0 auto; 
    width: 100%; 
    position: relative; 
    box-shadow: 0 0 50px rgba(0,0,0,0.8);
    padding: 200px 0;
}*/
#about { 
    background: url(<?= $img; ?>) 50% 0 fixed; 
    height: auto;
    margin: 0 auto; 
    width: 100%; 
    position: relative; 
    /*box-shadow: 0 0 50px rgba(0,0,0,0.8);*/
    padding: 100px 0;
    color: #fff;
}
</style>


<!-- Section 3 -->
<section id="about" data-speed="8" data-type="background">
    <div class="container">
        <div class="col-lg-12">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <?= $txt; ?>
          </div>
          <div class="col-lg-3"></div>
        </div>
    </div>
</section>

<script>
  document.createElement("section");
  $(document).ready(function(){
   // cache the window object
   $window = $(window);
 
   $('section[data-type="background"]').each(function(){
     // declare the variable to affect the defined data-type
     var $scroll = $(this);
                     
      $(window).scroll(function() {
        // HTML5 proves useful for helping with creating JS functions!
        // also, negative value because we're scrolling upwards                             
        var yPos = -($window.scrollTop() / $scroll.data('speed')); 
         
        // background position
        var coords = '50% '+ yPos + 'px';
 
        // move the background
        $scroll.css({ backgroundPosition: coords });    
      }); // end window scroll
   });  // end section function
}); // close out script
</script>