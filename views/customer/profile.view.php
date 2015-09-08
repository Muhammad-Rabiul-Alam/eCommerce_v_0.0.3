<style>
  .profile{margin-top: 20px;}
</style>
<div class="col-lg-3"></div>
<div class="col-lg-6">
  <div class="panel panel-default profile">
    <div class="panel-body">
       <h2>Your profile:</h2>
       <form role="form" method="post" action="profile.php">
        <div class="form-group">
          <label for="name">Name:</label>
          <input <?= $disable_profile; ?> name="customer_name" type="text" class="form-control" id="name" value="<?= $value['customer_name'] ?>">
        </div>
        <div class="form-group">
          <label for="phone">Phone:</label>
          <input <?= $disable_profile; ?> name="phone" type="text" class="form-control" id="phone" value="<?= $value['phone'] ?>">
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <input <?= $disable_profile; ?> name="address" type="text" class="form-control" id="address" value="<?= $value['address'] ?>">
        </div>
        <div class="form-group">
          <label for="postal_code">Postal Code:</label>
          <input <?= $disable_profile; ?> name="postal_code" type="text" class="form-control" id="postal_code" value="<?= $value['postal_code'] ?>">
        </div>
        <div class="form-group">
          <label for="city">City:</label>
          <input <?= $disable_profile; ?> name="city" type="text" class="form-control" id="city" value="<?= $value['city'] ?>">
        </div>
        <div class="form-group">
          <label for="country">Country:</label>
          <input <?= $disable_profile; ?> name="country" type="text" class="form-control" id="country" value="<?= $value['country'] ?>">
        </div>
        <input type="hidden" name="disable_profile" value="<?= $disable_profile; ?>">
        <br>

        <label>Login Info: </label>
        <div class="form-group">
          <label for="email">Email:</label>
          <div class="input-group ">
            <input <?= $disable_email; ?> name="email" type="email" class="form-control" id="email" value="<?= $_SESSION['customer_email']  ?>">
            <span class="input-group-btn">
              <button  name="btn_submit" value="edit_email" type="submit" class="btn btn-default">edit</button>
            </span>
          </div>
        </div>
        <input type="hidden" name="disable_email" value="<?= $disable_email; ?>">

        <?php if(!empty($disable_password)): ?>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <div class="input-group ">
            <input  <?= $disable_password; ?> name="customer_password" type="password" class="form-control" id="pwd" value="<?= $_SESSION['customer_password']  ?>">
            <span class="input-group-btn">
              <button  name="btn_submit" value="edit_password" type="submit" class="btn btn-default">edit</button>
            </span>
          </div>
        </div>
        <?php endif; ?>

        <?php if(empty($disable_password)): ?>
          <div class="form-group">
            <label for="pwd">Current Password:</label>
            <input  name="current_password" value=" " type="password" class="form-control" id="pwd">
          </div>
          <div class="form-group">
            <label for="pwd">New Password:</label>
            <input  name="new_password" type="password" class="form-control" id="pwd">
          </div>
          <div class="form-group">
            <label for="pwd">Confirm New Password:</label>
            <input  name="confirm_new_password" type="password" class="form-control" id="pwd">
          </div>
        <?php endif; ?>
        <input type="hidden" name="disable_password" value="<?= $disable_password; ?>">

        <button  name="btn_submit" value="save" type="submit" class="btn btn-default">Save</button>
      </form>
    </div>
  </div>
</div>
<div class="col-lg-3"></div>