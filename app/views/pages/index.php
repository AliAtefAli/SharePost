<?php require APPROOT . '/views/inc/header.php'; ?>
<div class="form bg-primary">
<div class="container">
    <div class="card-body">
      <div class="row">
        <div class="col col-md-6 m-auto">
          <form>
          <div class="row">

            <div class="col col-sm-8">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="title">
              </div>
            </div>

              <!-- Fiel load -->
            <div class="col col-sm-2">
              <div class="btn btn-primary fileinput-button">
                <i class="fa fa-camera"></i>
                <input type="file" name="files[]" multiple>
              </div>
            </div>
            
            <div class="col col-sm-2">
            <input type="submit" class="btn btn-light" value="Post">
          </div>
          </div>          
          
          <div class="form-group">
            <textarea name="postBody" cols="69" rows="3" style="padding: 10px;" placeholder="Write Your Post"></textarea>
          </div>
          </form>
        </div>
      </div> 
    </div>
  </div>
</div>
<?php require APPROOT . '/views/inc/footer.php'; ?>
