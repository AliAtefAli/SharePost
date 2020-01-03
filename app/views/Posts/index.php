<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="form bg-primary">
<div class="container">
    <div class="card-body mb-0">
      <div class="row">
        <div class="col col-md-6 m-auto">
        <form action="<?php echo URLROOT; ?>/posts/add" method="post">
          <div class="row">

            <div class="col col-sm-8">
              <div class="form-group mb-1">
                <input type="text" name=" title" class="form-control" placeholder="title">
              </div>
            </div>

              <!-- Fiel load -->
            <div class="col col-sm-2">
              <div class="btn btn-primary fileinput-button">
                <i class="fa fa-camera"></i>
                <input type="file" name="files" multiple>
              </div>
            </div>
            
            <div class="col col-sm-2">
            
            <input type="submit" class="btn btn-light" value="POST">
          </div>
          </div>          
          
          <div class="form-group mt-0">
            <textarea name="body" cols="71" rows="3" style="padding: 10px;" placeholder="Write Your Post"></textarea>
          </div>
          </form>
        </div>
      </div> 
    </div>
  </div>
</div>
<div class="posts">
<div class="container">
  <div class="row">
    <div class="col col-md-6 m-auto">
      <h2 class="text-center text-primary">POSTS</h2>
      <?php foreach($data['post'] as $post) : ?>
      <p><?php echo $post->id; ?></p>
      <p><?php echo $post->title; ?></p>

      <!-- HEADER, FOOTER, CENTERED -->
      <div class="card mb-4">
        <div class="card-header h4">
          <img src="<?php echo URLROOT; ?>/img/user1.jpg" width="70">
          <?php echo ucwords( $_SESSION['user_name']); ?>
          <p class="lead text-muted"><?php echo $post->created_at; ?></p>
          <a href="<?php echo URLROOT; ?>/posts/delete/<?php echo $post->id; ?>" class="btn btn-danger" class="ml-auto"><i class="fa fa-times"></i></a>
          <a href="<?php echo URLROOT; ?>/posts/edit/<?php echo $post->id; ?>" class="btn btn-success" class="ml-auto"><i class="fa fa-pencil"></i></a>
        </div>
        <!-- BODY -->
        <div class="card-body">
            <h6 class="card-title text-center"><?php echo $post->title; ?></h6>
            <p class="card-text"><?php echo $post->body; ?></p>
            
        </div>
        <!-- FOOTER -->
        <div class="card-footer text-primary">
          <div class="row m-0 p-0">
            <!-- LIKE -->
            <div class="col col-sm-4">
              <span class=""><i class="fa fa-thumbs-o-up text-primary"></i> Like</span>
            </div>
            <!-- COMMENT -->
            <div class="col col-sm-4" href="#collapse<?php echo $post->id; ?>" data-parent="#accordion" data-toggle="collapse">
              <span class=""><i class="fa fa-comment-o text-primary"></i>
                <a>Comment
                </a>
              </span>
            </div>
            <!-- SHARE -->
            <div class="col col-sm-4">
              <span class=""><i class="fa fa-mail-forward text-primary"></i> Share</span>
            </div> 

          </div>
        </div>
      </div>
      <!-- COMMENT -->
      <div id="collapse<?php echo $post->id; ?>" class="collapse">
        <div class="card card-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veritatis ea iste a doloremque, cumque, debitis eum vel ipsum architecto aut, recusandae totam ullam aperiam. Nesciunt expedita officiis animi quam corporis optio inventore facilis sint et nulla in, repellat debitis dolor at nisi quo, unde temporibus. Quos nisi nostrum officia, illo.
        </div>
      </div>
      
      <?php endforeach; ?>
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
