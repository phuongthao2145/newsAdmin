<?php
include "header.php";
include "main-sidebar.php";
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:items.php');
}
$getItemById = $item->getItemById($id);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Item Update</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Item Update</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <form action="updateitem.php" method="post" enctype="multipart/form-data">
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
            <?php
            foreach ($getItemById as $value) :
              if ($value['id'] == $id) :
                //var_dump($value);
            ?>
                <div class="card-body">
                  <div class="form-group">
                    <label for="inputName">Title</label>
                    <input type="text" name="title" id="inputName" value="<?php echo $value['title'] ?>" class="form-control">
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                  </div>
                  <div class="form-group">
                    <label for="inputExcerpt">Excerpt</label>
                    <textarea id="inputExcerpt" name="excerpt" class="form-control" rows="4">
                    <?php echo $value['title'] ?>
                    </textarea>
                  </div>
                  <div class="form-group">
                    <label for="inputContent">Content</label>
                    <textarea id="summernote" name="content" rows="10">
                    <?php echo $value['content'] ?>
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
                      <br>
                      <img style="width:200px" src="http://localhost/news/img/<?php echo $value['image'] ?>" alt="">

                    </div>

                    <div class="form-group col-md-3">
                      <label for="inputCategory">Category</label>
                      <select id="inputCategory" name="category" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <?php
                        $getAllCate = $category->getAllCats();
                        foreach ($getAllCate as $value1) :
                          if ($value1['id'] == $value['category']) :
                        ?>
                            <option selected value="<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></option>
                          <?php
                          else :
                          ?>
                            <option value="<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></option>
                        <?php endif;
                        endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputFeatured">Featured</label>
                      <select id="inputFeatured" name="featured" class="form-control custom-select">
                        <?php if ($value['featured'] == 1) : ?>
                          <option selected value="1">Yes</option>
                          <option value="0">No</option>
                        <?php
                        else : ?>
                          <option value="1">Yes</option>
                          <option selected value="0">No</option>
                        <?php endif ?>
                      </select>

                    </div>
                    <div class="form-group col-md-3">
                      <label for="inputStatus">Author</label>
                      <select id="inputStatus" name="author" class="form-control custom-select">
                        <option selected disabled>Select one</option>
                        <?php
                        $getAllAuthor = $author->getAllAuthor();
                        foreach ($getAllAuthor as $value1) :
                          if ($value1['id'] == $value['author']) :
                        ?>
                            <option selected value="<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></option>
                          <?php
                          else : ?>
                            <option value="<?php echo $value1['id'] ?>"><?php echo $value1['name'] ?></option>

                        <?php
                          endif;
                        endforeach ?>
                      </select>
                    </div>
                    <div class="form-group col-md-12">
                      <label for="inputDate">Date</label>
                      <input readonly type="text" name="olddate" value="<?php echo date_format(date_create_from_format("Y-m-d H:i:s", $value['created_at']), "d/m/Y"); ?>">
                      <input type="date" name="date" id="inputName" class="form-control">
                    </div>
                  </div>
                </div>
            <?php
              endif;
            endforeach;
            ?>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <input type="submit" value="Update Item" class="btn btn-success float-right">
        </div>
      </div>
    </form>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include "footer.php"; ?>