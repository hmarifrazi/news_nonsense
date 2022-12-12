  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <?php echo $this->session->flashdata('message'); ?>

        <!-- Info boxes -->
        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Total Posts</span>
                <span class="info-box-number"><?= $this->db->count_all('post'); ?>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Comments</span>
                <span class="info-box-number"><?= $this->db->count_all('comment'); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->

          </div>

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">View Count</span>
                <span class="info-box-number"><?= $this->db->select('sum(viewcount) as s')->from('post')->get()->row()->s ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Videos</span>
                <span class="info-box-number"><?= $this->db->select('sum(video) as s')->from('post')->get()->row()->s ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
          <div class="col-md-8">
            <!-- TABLE: LATEST ORDERS -->
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Recently Added Posts</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">

                <?php

                $post = $this->db->order_by('created_at', 'DESC')->limit(5, 0)->get('post')->result();

                if ($post) {
                  foreach ($post as $pt) {
                ?>
                    <ul class="products-list product-list-in-card pl-2 pr-2">
                      <li class="item">
                        <div class="product-info">
                          <a href="javascript:void(0)" class="product-title"><?= $pt->title ?></a>
                          <span class="product-description">
                            <?= $pt->created_at ?>
                          </span>
                        </div>
                      </li>
                      <!-- /.item -->
                    </ul>
                <?php }
                } ?>
              </div>
              <!-- /.card-body -->
              <div class="card-footer text-center">
                <a href="<?= base_url('admin/post') ?>" class="uppercase">View All Posts</a>
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </div>
          <div class="col-md-4">
            <!-- Info Boxes Style 2 -->
            <div class="info-box mb-3 bg-primary">
              <span class="info-box-icon"><i class="fas fa-tag"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Trending</span>
                <span class="info-box-number"><?= $this->db->select('count(trending) as c')->from('post')->get()->row()->c ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-success">
              <span class="info-box-icon"><i class="far fa-heart"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Featured</span>
                <span class="info-box-number"><?= $this->db->select('count(featured) as c')->from('post')->get()->row()->c ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-warning">
              <span class="info-box-icon"><i class="fas fa-cloud-download-alt"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Spotlight</span>
                <span class="info-box-number"><?= $this->db->select('count(spotlight) as c')->from('post')->get()->row()->c ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-info">
              <span class="info-box-icon"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Editorials</span>
                <span class="info-box-number"><?= $this->db->select('count(editorial) as c')->from('post')->get()->row()->c ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
            <div class="info-box mb-3 bg-danger">
              <span class="info-box-icon"><i class="far fa-comment"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Media</span>
                <span class="info-box-number"><?= $this->db->count_all('media'); ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.card -->
        </div>
      </div>

      <div class="row">
        <!-- PRODUCT LIST -->
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header border-transparent">
              <h3 class="card-title">Latest Comments</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table m-0">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Post ID</th>
                      <th>Name</th>
                      <th>Comment</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php

                    $comment = $this->db->get('comment')->result();

                    if ($comment) {
                      foreach ($comment as $com) {
                    ?>
                        <tr>
                          <td><?= $com->id ?></td>
                          <td><?= $com->post_id ?></td>
                          <td><?= $com->name ?></td>
                          <td><?= $com->message ?></td>
                        </tr>
                    <?php }
                    } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer clearfix">
            </div>
            <!-- /.card-footer -->
          </div>
        </div>

      </div>
  </div>

  </div>
  <!--/. container-fluid -->
  </section>
  <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->