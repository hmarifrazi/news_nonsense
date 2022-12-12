    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Contact</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item active">Contact</li>
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
                  <h3 class="card-title">Contact Requests</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
              <tr>
              <th>#</th>
              <th>Name</th>
              <th>E-mail</th>
              <th>Subject</th>
              <th>Message</th>
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
                  <td><?= $d->email ?></td>
                  <td><?= $d->subject ?></td>
                  <td><?= $d->message ?></td>
                </tr>
            <?php } } ?>
                    </tbody>
                    <tfoot>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>E-mail</th>
                      <th>Subject</th>
                      <th>Message</th>
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