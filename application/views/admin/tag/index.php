    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Tag</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Tag</li>
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
                  <h3 class="card-title">All Tags</h3>
          <a class="btn btn-primary float-right" href="<?= base_url('admin/tag/create') ?>"><i class="fa fa-plus"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
          <?= $this->session->flashdata('message'); ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
              <tr>
              <th>#</th>
              <th>Name</th>
              <th>Action</th>
              </tr>
                    </thead>
                    <tbody>
            <?php 
              if($datas){
                foreach($datas as $index => $d){
            ?>
                <tr>
                    <td><?= ++$index ?></td>  
                    <td><?= $d->name ?></td>
                    <td>
                    <a href="<?= base_url('admin/tag/edit/'.$d->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                    <a href="<?= base_url('admin/tag/delete/'.$d->id) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>
            <?php } } ?>
                    </tbody>
                    <tfoot>
            <tr>
              <th>#</th>
              <th>Name</th>
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