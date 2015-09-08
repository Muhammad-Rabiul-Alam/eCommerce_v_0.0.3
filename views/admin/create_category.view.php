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

                      <div class="row">
                        <div class="col-lg-12">
                          <div class="col-lg-2"></div>
                          <div class="col-lg-8">
                            <div class="panel panel-primary">
                              <div class="panel-heading">Create New Categories:</div>
                              <div class="panel-body">

                                  <form action="create_category.php" method="POST" role="form">
                                    
                                    <ul class="nav nav-tabs">
                                      <li class="active"><a data-toggle="tab" href="#home">Create New Category</a></li>
                                      <li><a data-toggle="tab" href="#menu1">Create New Subategory</a></li>
                                      <li><a data-toggle="tab" href="#menu2">Create New Product Type</a></li>
                                    </ul>

                                    <div class="tab-content">
                                      <?php 
                                        if(!empty($data['cat'])){
                                          foreach($data['cat'] as $show)
                                            if(!empty($show)) echo "<br><div class='alert alert-danger'>".$show.".</div>";
                                        }
                                        elseif(!empty($data['scat'])){
                                          foreach($data['scat'] as $show)
                                            if(!empty($show)) echo "<br><div class='alert alert-danger'>".$show.".</div>";
                                        }
                                        elseif(!empty($data['pt'])){
                                          foreach($data['pt'] as $show)
                                            if(!empty($show)) echo "<br><div class='alert alert-danger'>".$show.".</div>";
                                        }
                                      ?>

                                      <!-- CREATE CATEGORY FORM -->
                                      <div id="home" class="tab-pane fade in active">
                                        <br>
                                        <div class="form-group">
                                          <input name="category" type="text" class="form-control" id="" placeholder="Category Name">
                                        </div>
                                        <div class="form-group">
                                          <button  name="btn_submit" value="crt_cat" type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                      </div>

                                      <!-- CREATE SUBCATEGORY FORM -->
                                      <div id="menu1" class="tab-pane fade">
                                        <br>
                                        <div class="form-group">
                                          <select name="category_subcat" class="form-control" id="sel2">
                                            <option>--- select category</option>
                                            <?php $cats=selectCategory(); foreach($cats as $option): ?>
                                              <option><?= $option['category_name']; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input name="subcategory" type="text" class="form-control" id="" placeholder="Subcategory Name" value="<?= $value_scat; ?>">
                                        </div>
                                        <div class="form-group">
                                          <button  name="btn_submit" value="crt_scat" type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                      </div>

                                      <!-- CREATE PRODUCT TYPE FORM -->
                                      <div id="menu2" class="tab-pane fade">
                                        <br>
                                        <div class="form-group">
                                          <div class="input-group ">
                                              <select name="category_pt" class="form-control" id="sel2">
                                                <option><?= $catpt_value; ?></option>
                                                <?php $catspt=selectCategory(); foreach($catspt as $option): ?>
                                                  <option><?= $option['category_name']; ?></option>
                                                <?php endforeach; ?>
                                              </select>
                                              <span class="input-group-btn">
                                                <button name="btn_submit" value="slct_cat" class="btn btn-primary" type="submit">Go!</button>
                                              </span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <select name="subcategory_pt" class="form-control" id="sel2">
                                            <option>--- select subcategory</option>
                                            <?php $subcats=selectSubcategory($catpt_value);foreach($subcats as $option): ?>
                                              <option><?= $option['subcategory_name']; ?></option>
                                            <?php endforeach; ?>
                                          </select>
                                        </div>
                                        <div class="form-group">
                                          <input name="product_type" type="text" class="form-control" id="" placeholder="Product Type"  value="<?= $value_pt; ?>">
                                        </div>
                                        <div class="form-group">
                                          <button  name="btn_submit" value="crt_pt" type="submit" class="btn btn-primary">Create</button>
                                        </div>
                                      </div>

                                    </div>

                                  </form>
                              </div>
                              <div class="col-lg-2"></div>
                            </div>
                          </div>
                        </div>
                      </div>

<script>
  $(function() { 
      // for bootstrap 3 use 'shown.bs.tab', for bootstrap 2 use 'shown' in the next line
      $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
          // save the latest tab; use cookies if you like 'em better:
          localStorage.setItem('lastTab', $(this).attr('href'));
      });

      // go to the latest tab, if it exists:
      var lastTab = localStorage.getItem('lastTab');
      if (lastTab) {
          $('[href="' + lastTab + '"]').tab('show');
      }
  });
</script>                      