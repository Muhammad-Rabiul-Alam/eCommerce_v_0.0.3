  <style>
    .signup{margin: 80px 0 80px 0;box-shadow: 0 0 70px rgba(0,0,0,0.8);border-radius: 10px;}
  </style>
  <div class="col-lg-4"></div>
  <div class="col-lg-4">
    <div class="panel panel-default signup">
      <div class="panel-body">
        <h4><strong>Please signup to have a great experience on our e-shop:</strong></h4>
        <form role="form" method="post" action="customer_signup.php">
            <?php foreach($status as $row): ?>
              <?php if(isset($row)): ?>
                <div class="form-group">
                  <div class="alert alert-danger"><?= $row; ?></div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          <div class="form-group">
            <label for= "email" >Email:</label>
            <input name= "email" type="email" class="form-control" id= "email" value=<?= $value ?>>
          </div>
          <div class="form-group">
            <label for="pwd">Password:</label>
            <input name="password" type="password" class="form-control" id="pwd">
          </div>
          <div class="form-group">
            <label for="cnfpwd">Confirm Password:</label>
            <input name="confirm_password" type="password" class="form-control" id="cnfpwd">
          </div>
          <button type="submit" class="btn btn-default">Signup</button>
        </form>  
      </div>
    </div>
  </div>
  <div class="col-lg-4"></div>
