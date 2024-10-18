<?php
include "header.php";
include "main-sidebar.php";
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Item Add</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Item Add</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="additem.php" method="post" enctype="multipart/form-data">
      <div class="row">
        <div class="col-md">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">General</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                  <i class="fas fa-minus"></i>
                </button>
              </div>
            </div>

            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Title</label>
                <input type="text" name="title" id="inputName" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputExcerpt">Excerpt</label>
                <textarea id="inputExcerpt" name="excerpt" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputContent">Content</label>
                <textarea id="summernote" name="content" rows="5">

                </textarea>
              </div>
              <div class="row">
                <div class="form-group col-md-3">
                  <label for="exampleInputFile">Image</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
                      <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                    </div>
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="inputCategory">Category</label>
                  <select id="inputCategory" name="category" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    <?php
                    $getAllCate = $category->getAllCats();
                    foreach ($getAllCate as $value) :
                    ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputFeatured">Featured</label>
                  <select id="inputFeatured" name="featured" class="form-control custom-select">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputStatus">Author</label>
                  <select id="inputStatus" name="author" class="form-control custom-select">
                    <option selected disabled>Select one</option>
                    <?php
                    $getAllAuthor = $author->getAllAuthor();
                    foreach ($getAllAuthor as $value) :
                    ?>
                      <option value="<?php echo $value['id'] ?>"><?php echo $value['name'] ?></option>
                    <?php endforeach ?>
                  </select>
                </div>
                <div class="form-group col-md-12">
                  <label for="inputDate">Date</label>
                  <input type="date" name="date" id="inputName" class="form-control">
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Create new Item" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>