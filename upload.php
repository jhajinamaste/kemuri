<?php include('header.php'); ?>
<section id="form">
  <div class="col-6 mx-auto r-anf-cont">
    <h1 class="text-center mt-5 pageTitle">Upload Stock Prices Data</h1>
    <hr>
    <form action="processes/upload.php" method="post" enctype="multipart/form-data" id="uploadForm">
      <div class="form-block form-upload">
        <div class="form-group me-3">
          <label for="formFile" class="form-label mt-4">Choose File <small>(.csv)</small></label>
          <input class="form-control" type="file" id="formFile" name="file" accept=".csv" />
        </div>
        <button type="submit" class="btn btn-primary uploadFile">Upload</button>
      </div>
    </form>
  </div>
</section>
<?php include('footer.php'); ?>