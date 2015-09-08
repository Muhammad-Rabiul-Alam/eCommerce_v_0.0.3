                      <style>
                        .signin{
                          margin: 120px 0 120px 0;
                          box-shadow: 0 0 70px rgba(0,0,0,0.8);
                          border-radius: 10px;
                        }
                      </style>
                      <div class="col-lg-4"></div>
                      <div class="col-lg-4">
                        <div class="panel panel-default signin">
                          <div class="panel-body">
                            <h3><?= $formheader; ?></h3>
                            <form role="form" method="post" action="">
                              <div class="form-group">
                                <?php if(isset($status)): ?>
                                    <div class="alert alert-danger"><?= $status; ?></div>
                                <?php endif; ?>
                              </div>
                              <div class="form-group">
                                <label for= "<?= $name; ?>" ><?= $label; ?></label>
                                <input name= "<?= $name; ?>" type="text" class="form-control" value="<?= $value; ?>" id="<?= $name; ?>" >
                              </div>
                              <div class="form-group">
                                <label for="pwd">Password:</label>
                                <input name="password" type="password" class="form-control" id="pwd">
                              </div>
                              <button type="submit" class="btn btn-default">Signin</button>
                              <?php if(isset($signup)): ?>
                                <?= $text; ?>
                                <a href="<?= $link; ?>"><?= $signup ?></a>
                              <?php endif; ?>
                            </form>   
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-4"></div>