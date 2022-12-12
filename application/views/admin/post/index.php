    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Posts</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Posts</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">All Posts</h3>
          <a class="btn btn-primary float-right" href="<?= base_url('admin/post/create') ?>"><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Category</th>
                      <th>Tag</th>
                      <th>Image</th>
                      <th>View Count</th>
                      <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
            <?php 
              if($datas){
                foreach($datas as $d){
            ?>
                <tr>
                  <td><?= $d->title ?></td>
                  <td><?= mb_substr(strip_tags($d->description),0,100) ?></td>
                  <td><?= $d->cat ?></td>
                  <td><?= $d->tg ?></td>
                  <td><img src="<?= base_url('img/admin/media/thumb/'.$d->image) ?>" width="80px"></td>
                  <td>View Count</td>
                  <td>
                    <a href="<?= base_url('admin/post/edit/'.$d->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('admin/post/delete/'.$d->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                  </td>
                </tr>
            <?php } } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                      <th>Title</th>
                      <th>Short Description</th>
                      <th>Category</th>
                      <th>Tag</th>
                      <th>Image</th>
                      <th>View Count</th>
                      <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.card-body -->
              </div><!-- /.card -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->
    </div>
    <!-- /.content-wrapper -->