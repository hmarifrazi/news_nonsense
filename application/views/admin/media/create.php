
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Add New Media</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="<?= base_url('admin/media') ?>">Media</a></li>
                <li class="breadcrumb-item active">Add New Media</li>
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
                    <h3 class="card-title">Media Add Form</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?= form_open_multipart() ?>
                <?php echo $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="caption">Caption</label>
                            <input type="text" class="form-control" name="caption" id="caption" value="<?= set_value('caption') ?>">
                            <b class="text-danger"><?= form_error('caption'); ?></b>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" name="image" class="form-control" id="image">
                            <b class="text-danger"><?php echo form_error('image'); ?></b>
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
    </div>
    <!-- /.content-wrapper -->