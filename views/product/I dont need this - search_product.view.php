
            <style>
              .search_product{margin: 20px;}
            </style>
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
              <?php foreach($res as $row): ?>
                <div class="panel panel-default search_product">
                  <div class="panel-body">
                    <div class="row">
                      <div class="col-lg-6">
                        <?php $id=$row['product_id']; ?>
                        <img src="<?= $assets_loc ?>assets/img/<?= $id; ?>.jpg" class="img-thumbnail" alt="Image of <?= $row['product_name']; ?>" width="260" height="200"><br />
                        <a href="<?= $assets_loc ?>assets/img/<?= $id; ?>.jpg">View Full Size Image</a>
                      </div>
                      <div class="col-lg-6">
                        <h3><?= $row['product_name']; ?></h3><br>
                        <p>
                           <strong>Price: </strong>$<?= $row['unit_price']; ?><br />
                           <strong>Product type: </strong><?= $row['product_type_name']; ?><br>
                           <strong>Subategory: </strong><?= $row['subcategory_name']; ?><br>
                           <strong>Category: </strong><?= $row['category_name']; ?> <br>
                           <strong>Product description: </strong><br>
                           <?= $row['product_description']; ?>
                        </p>
                        <form action="<?= $cart_loc ?>cart.php" method="POST" role="form">        
                          <input type="hidden"  class="form-control" name="pid" id="pid" value="<?= $id; ?>" />
                          <button type="submit" class="btn btn-primary">Add to Shopping Cart</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>
            <div class="col-lg-2"></div>