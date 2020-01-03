<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="form bg-primary">
<div class="container">
    <div class="card-body mb-0">
      <div class="row">
        <div class="col col-md-6 m-auto">
        
        <form action="<?php echo URLROOT; ?>/posts/edit" method="post">
          <div class="row">
          
            <div class="col col-sm-8">
              <div class="form-group mb-1">
                <input type="text" name=" title" class="form-control" 
                placeholder="title" value="<?php echo trim($data['posts']->title); ?>">
              </div>
              <span class="invalid-feedback"><?php echo $data['body_err']; ?></span>
            </div>
              <!-- Fiel load -->
            <div class="col col-sm-2">
              <div class="btn btn-primary fileinput-button">
                <i class="fa fa-camera"></i>
                <input type="file" name="files" multiple>
              </div>
            </div>
            
            <div class="col col-sm-2">
            
            <input type="submit" name="update" class="btn btn-light" value="Update">
          </div>
          </div>          
          
          <div class="form-group mt-0">
            <textarea name="body" cols="73" rows="3" style="padding: 10px;" 
            placeholder="Write Your Post">
              <?php echo trim($data['posts']->body); ?>
            </textarea>
          </div>
          </form>
          
        </div>
      </div> 
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
