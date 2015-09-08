                      <div class="row">
                        <div class="col-lg-12">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-8">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Create New Product:</div>
                              <div class="panel-body">
                                 <form action="create_product.php" enctype="multipart/form-data" method="POST" role="form">

                                  <?php 
                                    if(!empty($data)){
                                      foreach($data as $show)
                                        if(!empty($show)) echo "<div class='alert alert-danger'>".$show.".</div>";
                                    }
                                  ?>

                                  <div class="form-group">
                                    <label for="">Product Name:</label>
                                    <input value="<?= $product_name ?>" name="product_name" type="text" class="form-control" id="" placeholder="Product Name">
                                  </div>

                                  <div class="form-group">
                                    <label for="">Product Price:</label>
                                    $<input value="<?= $unit_price ?>" name="unit_price" type="text" class="form-control" id="" placeholder="$ Product Price">
                                  </div>

                                  <div class="form-group">
                                    <label for="sel1">Category:</label>
                                    <div class="input-group ">
                                      <select name="category" class="form-control" id="sel1">
                                        <option><?= $category; ?></option>
                                        <?php $cats=selectCategory();foreach($cats as $option): ?>
                                            <option><?= $option['category_name'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <span class="input-group-btn">
                                        <button name="btn_submit" value="slct_cat" class="btn btn-primary" type="submit">Go!</button>
                                      </span>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="sel2">Subcategory:</label>
                                    <div class="input-group ">
                                      <select name="subcategory" class="form-control" id="sel2">
                                        <option><?= $subcategory; ?></option>
                                        <?php $subcats=selectSubcategory($category); foreach($subcats as $option): ?>
                                            <option><?= $option['subcategory_name'] ?></option>
                                        <?php endforeach; ?>
                                      </select>
                                      <span class="input-group-btn">
                                        <button name="btn_submit" value="slct_scat" class="btn btn-primary" type="submit">Go!</button>
                                      </span>
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="sel3">Product type:</label>
                                    <select name="product_type" class="form-control" id="sel3">
                                      <option><?= $product_type; ?></option>
                                      <?php $pts=selectProductType($category,$subcategory); foreach($pts as $option): ?>
                                          <option><?= $option['product_type_name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Product Details:</label>
                                    <textarea name="product_description" class="form-control" rows="5" id="" placeholder="Product Details"><?php echo $product_description; ?></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="">Product Image:</label>
                                    <input type="file" name="fileField" class="form-control" id="fileField" placeholder="Product Image">
                                  </div>

                                  <button name="btn_submit" value="product_submit" type="submit" class="btn btn-primary">Add Product</button>
                                
                                </form>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-2"></div>
                      </div>
                      