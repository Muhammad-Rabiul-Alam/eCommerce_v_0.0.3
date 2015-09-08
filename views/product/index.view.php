<style>
  .onepro{
    text-align: center; 
    margin-bottom: 20px; 
    padding: 4px;
    border-radius: 11px;
  }
  .onepro:hover{box-shadow: 0 0 10px rgba(0,0,0,2);}
  .products{margin-top: 70px}
  
</style>

<div class="products">

  <div class="col-lg-2">
    <div class="panel panel-primary">
      <div class="panel-heading">Active Filters</div>

      <div class="panel-body">
         Basic panel example
      </div>
      
      <div class="panel-footer"></div>
    </div>
  </div>

  <div class="col-lg-10">
    <div class="panel panel-default">
      <div class="panel-body">

        <?php $err=1; if(empty($data)): foreach($res as $row): ?>
          <div class="col-lg-2 onepro">
            <a href="single_product.php?product_id=<?= $row['product_id']; ?>"  alt="<?= $row['product_name']; ?>" class="thumbnail">
              <img src="../assets/img/<?= $row['product_id']; ?>.jpg" alt="Pulpit Rock" style="width:150px;height:150px">
              <?= $row['product_name']; ?> <br>
              $ <?= $row['unit_price']; ?> <br>
            </a>
            <div class="input-group ">
              <span class="input-group-btn">
                <form action="../customer/cart.php" method="POST" role="form">        
                  <input type="hidden"  class="form-control" name="pid" id="pid" value="<?= $row['product_id']; ?>" />
                  <button type="submit" class="btn btn-info btn-xs"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                </form>
              </span>
              <span class="input-group-btn">
                <a href="single_product.php?product_id=<?= $row['product_id']; ?>" class="btn btn-info btn-xs"><span class="glyphicon glyphicon glyphicon-eye-open"></span> See</a>
              </span>
            </div>
          </div>
        <?php $err=0; endforeach; endif; 
          if($err){
            foreach($data as $error){
              $disable_nxt="disabled";
              if(!empty($error)) echo "<div class='alert alert-warning' style='text-align:center;'><strong>Sorry!</strong> ".$error.".</div>";
            }
          }
        ?>

      </div>
    </div>
    <?php  include "../views/paginate.view.php"; ?>
  </div>
</div>