    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Advertisement</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Advertisement</li>
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
                  <h3 class="card-title">All Advertisements</h3>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                  <?= $this->session->flashdata('message'); ?>
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Image</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if ($datas) {
                        foreach ($datas as $d) {
                      ?>
                          <tr>
                            <td><?= $d->name ?></td>
                            <td><?= $d->email ?></td>
                            <td><?= $d->company ?></td>
                            <td><img src="<?= base_url('img/admin/ad/thumb/'.$d->image) ?>" width="80px"></td>
                            <td><?= $d->adl ?></td>
                            <td><?= $d->status == 1 ? "Active" : "Inactive" ?></td>
                            <td><?= $d->date ?></td>
                            <td>
                              <a href="<?= base_url('admin/ad/edit/' . $d->id) ?>" class="btn btn-info"><i class="fa fa-edit"></i></a>
                              <a href="<?= base_url('admin/ad/delete/' . $d->id.'/'.$d->image) ?>" class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
                            </td>
                          </tr>
                      <?php }
                      } ?>
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Image</th>
                        <th>Location</th>
                        <th>Status</th>
                        <th>Date</th>
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