<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/user') ?>">Users</a></li>
                        <li class="breadcrumb-item active">Add New User</li>
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
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">User Add Form</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <?= form_open() ?>
                        <?php echo $this->session->flashdata('message'); ?>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="<?= set_value('name') ?>">
                                        <b class="text-danger"><?= form_error('name'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="email">Email Address</label>
                                        <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>">
                                        <b class="text-danger"><?= form_error('email'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contact">Contact Number</label>
                                        <input type="text" class="form-control" name="contact" id="contact" value="<?= set_value('contact') ?>">
                                        <b class="text-danger"><?= form_error('contact'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="username">User Name</label>
                                        <input autocomplete="off" type="text" class="form-control" name="username" id="username" value="<?= set_value('username') ?>">
                                        <b class="text-danger"><?= form_error('username'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="role_id">User Role</label>
                                        <select class="form-control" name="role_id" id="role_id" required>
                                            <option value="">Select Role</option>
                                            <?php if ($roles) {
                                                foreach ($roles as $role) { ?>
                                                    <option value="<?= $role->id ?>"><?= $role->role_name ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                        <b class="text-danger"><?= form_error('userrole'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select class="form-control" name="status" id="status" required>
                                            <option value="">Select Status</option>
                                            <option value="1">Active</option>
                                            <option value="0">Inactive</option>
                                    </select>
                                    <b class="text-danger"><?= form_error('status'); ?></b>
                                </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                        <b class="text-danger"><?= form_error('password'); ?></b>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="cpassword">Confirm Password</label>
                                        <input type="password" class="form-control" id="cpassword" name="cpassword">
                                        <b class="text-danger"><?= form_error('cpassword'); ?></b>
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
</div>
<!-- /.content-wrapper -->