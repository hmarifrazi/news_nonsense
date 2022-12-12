    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Edit Advertisement</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/ad') ?>">Advertisement</a></li>
                <li class="breadcrumb-item active">Edit Advertisement</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-8 offset-2">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Advertisement Edit Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?= form_open_multipart() ?>
                <?php echo $this->session->flashdata('message'); ?>
                <div class="card-body">
                  <div class="row">

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" name="image" class="form-control" id="image" value="<?= set_value('image', $ad->image) ?>">
                        <input type="hidden" name="old_image" value="<?= $ad->image ?>">
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="location">Location</label>
                        <select class="form-control" name="location" id="location" required>
                          <option value="" selected="selected">Select Location</option>
                          <?php if ($adloc) {
                            foreach ($adloc as $adl) { ?>
                              <option value="<?= $adl->id ?>" <?= $adl->id == $ad->location ? "selected" : "" ?> ><?= $adl->name ?></option>
                          <?php }
                          } ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="status">Status</label>
                        <select class="form-control" name="status" id="status" required>
                          <option value="0"  <?= "0" == $ad->status ? "selected" : "" ?>>Inactive</option>
                          <option value="1"  <?= "1" == $ad->status ? "selected" : "" ?>>Active</option>
                        </select>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" name="date" value="">
                        <b class="text-danger"><?= form_error('date'); ?></b>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <?= form_close() ?>
              </div><!-- /.card -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </section><!-- /.content -->
      <!-- Content Wrapper. Contains page content -->
    </div>
    <!-- /.content-wrapper -->