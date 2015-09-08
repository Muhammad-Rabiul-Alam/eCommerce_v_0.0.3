    <form action="<?= $search_action_loc; ?>search_product.php">
			<div class="input-group">
        <div class="input-group-btn search-panel">
          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <span id="search_concept">All</span> <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" role="menu">
            <?php  $cats=selectCategory(); foreach($cats as $cat): ?>
            	<li><a href="#"><?= $cat['category_name']; ?></a></li>
            <?php endforeach; ?>
          </ul>
        </div>
        <input type="hidden" name="search_param" value="all" id="search_param">         
        <input type="text" class="form-control" name="search_query" placeholder="Search term...">
        <span class="input-group-btn">
            <button class="btn btn-default" type="submit" method="POST"><span class="glyphicon glyphicon-search"></span></button>
        </span>
      </div>
    </form>
    

	<script>
		$(document).ready(function(e){
		    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		        e.preventDefault();
		        var param = $(this).attr("href").replace("#","");
		        var concept = $(this).text();
		        $('.search-panel span#search_concept').text(concept);
		        $('.input-group #search_param').val(concept);
		    });
		});
	</script>