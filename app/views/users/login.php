<?php require APPROOT . '/views/inc/header.php'; ?>

  <!-- CONTACT -->
  <section id="contact" class="bg-light py-5">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 m-auto card card-body">
          <h3 class="text-primary text-center">Login</h3>
          <?php flash('register') ?>
          <?php flash('new_register') ?>
          <form action="<?php echo URLROOT . '/users/login'; ?>" method="post">
            <div class="form-group">
              <!-- Email -->
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                <input type="email" class="form-control 
                <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" 
                name="email" placeholder="email" value="<?php echo $data['email']; ?>">
              </div>
              <span class="invalid-feedbak text-danger ml-5"><?php echo $data['email_err']; ?></span>
            </div>
            <!-- Password -->
            <div class="form-group">
              <div class="input-group input-group-lg">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control 
                <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" 
                name="password" placeholder="password" value="<?php echo $data['password']; ?>">
                
              </div>
              <span class="invalid-feedbak text-danger ml-5"><?php echo $data['password_err']; ?></span>
            </div>
            
            <!-- Submit Button -->
            <div class="row">
              <div class="col">
                <input type="submit" name="login" value="login" 
                class="btn btn-primary btn-block btn-lg">
              </div>
              <div class="col">
                <span>Don't have an Email ? <a href="<?php echo URLROOT . '/users/register' ?>">Register</a></span>
              </div>
            </div>
            
                        
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php require APPROOT . '/views/inc/footer.php'; ?>