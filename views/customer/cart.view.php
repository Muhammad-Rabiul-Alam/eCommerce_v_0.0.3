<style>
  .cart{margin-top: 10px;}
  th,td {text-align: center;}
  .table-responsive {border-radius: 6px;}
</style>

<div class="panel panel-default cart">
  <div class="panel-body">
       <div class="table-responsive">          
        <table class="table table-bordered table-hover">
          <?php if(isset($status)): ?>
              <h2 align='center'><?= $status['cart_empty_err'] ?></h2>
          <?php endif; ?>
          <thead bgcolor="#596">
            <tr>
              <th>Product</th>
              <th>Product Description</th>
              <th>Unit Price</th>
              <th>Quantity</th>
              <th>Subtotal</th>
              <th>Remove</th>
            </tr>
          </thead>

          <?php if(isset($cartOutput)): ?>
            <?php foreach($cartOutput as $show): ?>
              <tbody>
                <tr>
                  <td>
                    <a href="../product/single_product.php?product_id=<?= $show['item_id'] ?>"><?= $show['product_name'] ?></a><br />
                    <img src="../assets/img/<?= $show['item_id'] ?>.jpg" alt="<?= $show['product_name'] ?>" width="40" height="52" border="1" />
                  </td>
                  <td><?= $show['details'] ?></td>
                  <td><?= $show['price'] ?></td>
                  <td>
                    <form method="post" action="cart.php" class="form-inline">
                      <input name="quantity" type="text" class="form-control" value="<?= $show['quantity'] ?>" size="1" maxlength="2" />
                      <button name="adjustBtn<?= $show['item_id'] ?>"  type="submit" class="btn btn-info">change</button>
                      <input name="item_to_adjust" type="hidden" value="<?= $show['item_id'] ?>" />
                    </form>
                  </td>
                  <td><?= $show['pricetotal'] ?></td>
                  <td>
                    <form action="cart.php" method="post" class="form-inline">
                      <button type="submit" class="btn btn-default" name="deleteBtn<?= $show['item_id'] ?>">
                        <span class="glyphicon glyphicon-remove">
                      </button>
                      <input name="index_to_remove" type="hidden" value="<?= $show['item_index'] ?>" />
                    </form>
                  </td>
                </tr>
              </tbody>
              <?php $cartTotal=$show['cartTotal'];?>
            <?php endforeach; ?>
          <?php endif; ?>
        </table>
        <?php if(!empty($cartOutput)): ?>
          <div style='font-size:18px; margin-top:12px;' align='right'>Cart Total : $<?= $cartTotal ?> USD</div>
        <?php endif; ?>
      </div>
      <?php $txt="Buy"; if(!empty($cartOutput)): ?>
        <a href="cart.php?cmd=emptycart" class="btn btn-danger">Empty Your Cart</a> or
        <?php $txt="Buy More"; ?>
      <?php endif; ?>
      <a href="../product/" class="btn btn-info"><?= $txt; ?></a> 
  </div>
</div>