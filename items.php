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
          <h1>Items</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Items</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Items
        <a class="btn btn-success btn-sm" href="form-add-item.php">
                    <i class="fas fa-plus">
                    </i>
                    Add New
                  </a>
        </h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
            <i class="fas fa-minus"></i>
          </button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
            <i class="fas fa-times"></i>
          </button>
        </div>
      </div>
      <div class="card-body p-0">
        <table class="table table-striped projects">
          <thead>
            <tr>
              <th style="width: 1%">
                #
              </th>
              <th style="width: 20%">
                Title
              </th>
              <th style="width: 30%">
                Excerpt
              </th>
              <th style="width: 30%">
                Content
              </th>
              <th>
                Category
              </th>
              <th>
                Feature
              </th>
              <th>
                Views
              </th>
              <th>
                Date
              </th>
              <th>
                Author
              </th>
              <th style="width: 8%" class="text-center">
                Status
              </th>
            </tr>
          </thead>
          <tbody>
            <?php
            $getAllItems = $item->getAllItems();
            foreach ($getAllItems as $value) :
              //var_dump($value);
            ?>
              <tr>
                <td>
                  <img style="width:100px" src="http://localhost/news/img/<?php echo $value['image'] ?>" alt="">
                </td>
                <td>
                  <?php echo $value['title'] ?>
                </td>
                <td>
                  <?php echo substr(htmlspecialchars($value['excerpt']),0,40) ?>[...]
                </td>
                <td>
                  <?php echo substr(htmlspecialchars($value['content']),0,40) ?>[...]
                </td>
                <td>
                  <?php echo $value['cate_name'] ?>
                </td>
                <td>
                  <?php echo $value['featured'] ?>
                </td>
                <td>
                  <?php echo $value['views'] ?>
                </td>
                <td>
                  <?php echo $value['created_at'] ?>
                </td>
                <td>
                  <?php echo $value['author_name'] ?>
                </td>
                <td class="project-actions text-right">
                  <a class="btn btn-info btn-sm" href="form-edit-item.php?id=<?php echo $value['id']?>">
                    <i class="fas fa-pencil-alt">
                    </i>
                    Edit
                  </a>
                  <a class="btn btn-danger btn-sm" href="#">
                    <i class="fas fa-trash">
                    </i>
                    Delete
                  </a>
                </td>
              </tr>
            <?php
            endforeach
            ?>
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include "footer.php"
?>