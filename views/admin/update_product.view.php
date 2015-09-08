                      <?php  
                        if(!empty($data)) echo "<div class='alert alert-danger'>".$data."</div>";
                        if(empty($data)):
                      ?>
                      <div class="row">
                        <div class="col-lg-12">
                          <div class="col-lg-8">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Update Product:</div>
                              <div class="panel-body">
                                <form action="update_product.php" enctype="multipart/form-data" method="POST" role="form">
                                  <div class="form-group">
                                    <label for="">Product Name:</label>
                                    <input value="<?php echo $product_name; ?>" name="product_name" type="text" class="form-control" id="" placeholder="Product Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Product Price:</label>
                                    $<input value="<?php echo $unit_price; ?>" name="unit_price" type="text" class="form-control" id="" placeholder="$ Product Price">
                                  </div>
                                  <div class="form-group">

                                    <label for="sel1">Category:</label>
                                    <select name="category" class="form-control" id="sel1">
                                      <option><?= $category['category_name']; ?></option>
                                    </select>

                                    <label for="sel2">Subcategory:</label>
                                    <select name="subcategory" class="form-control" id="sel2" >
                                      <option><?= $subcategory['subcategory_name']; ?></option>
                                    </select>

                                    <label for="sel3">Product type:</label>
                                    <select name="product_type" class="form-control" id="sel3">
                                      <option><?= $product_type['product_type_name']; ?></option>
                                      <?php foreach($pts as $option): ?>
                                          <option><?= $option['product_type_name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>

                                  </div>
                                  <div class="form-group">
                                    <label for="">Product Details:</label>
                                    <textarea  class="form-control" id="" placeholder="Product Description"name="product_description" id="details" cols="64" rows="5"><?php echo $product_description; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Product Image:</label>
                                    <input type="file" name="fileField" class="form-control" id="" placeholder="Product Image">
                                  </div>

                                  <input name="thisID" type="hidden" value="<?= $targetID; ?>" />
                                  <button type="submit" class="btn btn-primary">Update</button>
                                </form>
                              </div>
                            </div>
                          </div>

                          <div class="col-lg-4">
                            <div class="panel panel-primary">
                              <div class="panel-body">
                                  <img src="../assets/img/<?= $pid_for_img; ?>.jpg" class="img-thumbnail" alt="Image of <?= $pname_for_img; ?>" width="304" height="236">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php endif; ?>




                      <!-- <div class="row">
                        <div class="col-lg-12">
                          <div class="col-lg-8">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Update Product:</div>
                              <div class="panel-body">
                                <form action="update_product.php" enctype="multipart/form-data" method="POST" role="form">
                                  <div class="form-group">
                                    <label for="">Product Name:</label>
                                    <input value="<?php echo $product_name; ?>" name="product_name" type="text" class="form-control" id="" placeholder="Product Name">
                                  </div>
                                  <div class="form-group">
                                    <label for="">Product Price:</label>
                                    $<input value="<?php echo $unit_price; ?>" name="unit_price" type="text" class="form-control" id="" placeholder="$ Product Price">
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
                                    <input name="thisID" type="hidden" value="<?= $targetID; ?>" />
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
                                    <input name="thisID" type="hidden" value="<?= $targetID; ?>" />
                                  </div>

                                  <div class="form-group">
                                    <label for="sel3">Product type:</label>
                                    <select name="product_type" class="form-control" id="sel3">
                                      <option><?= $product_type; ?></option>
                                      <?php $pts=selectProductType($category,$subcategory); foreach($pts as $option): ?>
                                          <option><?= $option['product_type_name'] ?></option>
                                      <?php endforeach; ?>
                                    </select>
                                    <input name="thisID" type="hidden" value="<?= $targetID; ?>" />
                                  </div>

<!--                                   <div class="form-group">

                                    <label for="sel1">Category:</label>
                                    <select name="category" class="form-control" id="sel1">
                                      <option><?//= $category['category_name']; ?></option>
                                    </select>

                                    <label for="sel2">Subcategory:</label>
                                    <select name="subcategory" class="form-control" id="sel2" >
                                      <option><?//= $subcategory['subcategory_name']; ?></option>
                                    </select>

                                    <label for="sel3">Product type:</label>
                                    <select name="product_type" class="form-control" id="sel3">
                                      <option><?//= $product_type['product_type_name']; ?></option>
                                      <?//php foreach($pts as $option): ?>
                                          <option><?//= $option['product_type_name'] ?></option>
                                      <?//php endforeach; ?>
                                    </select>

                                  </div> 
                                  <div class="form-group">
                                    <label for="">Product Details:</label>
                                    <textarea  class="form-control" id="" placeholder="Product Description"name="product_description" id="details" cols="64" rows="5"><?php echo $product_description; ?></textarea>
                                  </div>
                                  <div class="form-group">
                                    <label for="">Product Image:</label>
                                    <input type="file" name="fileField" class="form-control" id="" placeholder="Product Image">
                                  </div>

                                  <input name="thisID" type="hidden" value="<?= $targetID; ?>" />
                                  <button name="btn_submit" value="product_submit" type="submit" class="btn btn-primary">Update</button>
                                </form>
                              </div>
                            </div>
                            <?php if(isset($data['status'])): ?>
                              <?php foreach($data as $show) ?>
                                <div class="alert alert-success">
                                  <?= $show ?>
                                </div>
                              </div>
                            <?php endif; ?>
                          </div>

                          <div class="col-lg-4">
                            <div class="panel panel-primary">
                              <div class="panel-body">
                                  <img src="../assets/img/<?= $pid_for_img; ?>.jpg" class="img-thumbnail" alt="Image of <?= $pname_for_img; ?>" width="304" height="236">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
 -->