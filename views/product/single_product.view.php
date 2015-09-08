
            <style>
              .single_product{
                margin-top: 90px; 
                margin-bottom: 90px;
                box-shadow: 0 0 50px #111;
                border-radius: 12px;
              }
              .viewImg{text-align: center;}
            </style>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <div class="panel panel-default single_product">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-lg-6 viewImg">
                      <img src="<?= $assets_loc ?>assets/img/<?= $id; ?>.jpg" class="img-thumbnail" alt="Image of <?= $product_name; ?>" width="260" height="200"><br />
                      <a href="<?= $assets_loc ?>assets/img/<?= $id; ?>.jpg" class="btn btn-lg">View Full Size Image</a>
                    </div>
                    <div class="col-lg-6">
                      <h3><?= $product_name; ?></h3><br>
                      <p>
                         <strong>Price: </strong>$<?= $price; ?><br />
                         <strong>Product type: </strong><?= $product_type ?><br>
                         <strong>Subategory: </strong><?= $subcategory ?><br>
                         <strong>Category: </strong><?= $category ?> <br>
                         <strong>Product description: </strong><br>
                         <?= $details; ?>
                      </p>
                      <div class="input-group">
                        <div class="input-group-btn">
                          <form action="<?= $cart_loc ?>cart.php" method="POST" role="form">        
                            <input type="hidden"  class="form-control" name="pid" id="pid" value="<?= $id; ?>" />
                            <button type="submit" class="btn btn-info"><span class="glyphicon glyphicon-shopping-cart"></span> Buy</button>
                          </form>
                        </div>
                        <div class="input-group-btn">
                          <a href="index.php" class="btn btn-info"><< Back</a> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-2"></div>