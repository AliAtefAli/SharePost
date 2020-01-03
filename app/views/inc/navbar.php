<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container">
      <a href="<?php echo URLROOT; ?>" class="navbar-brand">SharePost</a>
      <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
          <a href="<?php echo URLROOT . '/posts'; ?>" class="nav-link">
          <?php if(isset($_SESSION['user_id'])){?>
            <img src="<?php echo URLROOT ; ?>/img/user1.jpg" width="40">
          <?php } ?>
          </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URLROOT . '/posts'; ?>" class="nav-link">
            <?php if(isset($_SESSION['user_id'])){
              echo $_SESSION['user_name']; 
            }else {
              echo 'Home';
            }
            ?>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/pages/about" class="nav-link mr-auto">About</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-suto">
          <?php if(isset($_SESSION['user_id'])) : ?>
          <li class="nav-item">
            <a href="<?php echo URLROOT . '/users/logout' ?>" class="nav-link">Logout</a>
          </li>
          <?php else : ?>
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/users/register" class="nav-link">Register</a>
          </li>
          <li class="nav-item">
            <a href="<?php echo URLROOT; ?>/users/login" class="nav-link">Login</a>
          </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>