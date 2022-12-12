  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo base_url(); ?>assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">News Nonsense</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">
            <?= $this->session->get_userdata()['userdata']->name ?>
          </a>
        </div>
      </div>



      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?php echo base_url('admin'); ?>" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/user'); ?>" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                Users
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/category'); ?>" class="nav-link">
              <i class="nav-icon fas fa-phone"></i>
              <p>
                Category
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/tag'); ?>" class="nav-link">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Tags
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/ad'); ?>" class="nav-link">
              <i class="nav-icon fas fa-lock"></i>
              <p>
                Advertisement
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/contact'); ?>" class="nav-link">
              <i class="nav-icon fas fa-clock"></i>
              <p>
                Contact
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/newsletter'); ?>" class="nav-link">
              <i class="nav-icon fas fa-cat"></i>
              <p>
                Newsletter
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/post'); ?>" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Posts
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="<?php echo base_url('admin/media'); ?>" class="nav-link">
            <i class="nav-icon fas fa-image"></i>
              <p>
                Media
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>