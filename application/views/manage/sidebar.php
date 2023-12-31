  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if ($this->session->userdata('user_image') != null) { ?>
            <img src="<?php echo upload_url() . '/users/' . $this->session->userdata('user_image'); ?>" class="img-responsive">
          <?php } else { ?>
            <img src="<?php echo media_url() ?>img/user.png" class="img-responsive">
          <?php } ?>
        </div>
        <div class="pull-left info">
          <p><?php echo ucfirst($this->session->userdata('ufullname')); ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <div style="margin-top: 20px"></div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MENU</li>

        <li class="<?php echo ($this->uri->segment(2) == 'dashboard' or $this->uri->segment(2) == NULL) ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage'); ?>">
            <i class="fa fa-th"></i> <span>Dashboard</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <li class="<?php echo ($this->uri->segment(2) == 'payout') ? 'active' : '' ?>">
          <a href="<?php echo site_url('manage/payout'); ?>">
            <i class="fa fa-credit-card"></i> <span>Pembayaran Santri</span>
            <span class="pull-right-container"></span>
          </a>
        </li>

        <?php if ($this->session->userdata('uroleid') == USER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'student') ? 'active' : '' ?>">
            <a href="<?php echo site_url('manage/student'); ?>">
              <i class="fa fa-users"></i> <span>Santri</span>
              <span class="pull-right-container"></span>
            </a>
          </li>
        <?php } ?>

        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'pos' or $this->uri->segment(2) == 'payment') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-money text-stock"></i> <span>Keuangan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'pos') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/pos') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'pos') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Pos Bayar</a>
              </li>
              <li class="<?php echo ($this->uri->segment(2) == 'payment') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/payment') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'payment') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Jenis Pembayaran</a>
              </li>
            </ul>
          </li>
        <?php } ?>


        <?php if ($this->session->userdata('uroleid') == SUPERUSER) { ?>
          <li class="<?php echo ($this->uri->segment(2) == 'student' or $this->uri->segment(2) == 'class' or $this->uri->segment(2) == 'majors' or $this->uri->segment(2) == 'period') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-users text-stock"></i> <span>Manajemen Data</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'period') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/period') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'period') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Tahun Ajaran</a>
              </li>
              <li class="<?php echo ($this->uri->segment(2) == 'class') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/class') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'class') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kelas</a>
              </li>
              <?php if (majors() == 'senior') { ?>
                <li class="<?php echo ($this->uri->segment(2) == 'majors') ? 'active' : '' ?> ">
                  <a href="<?php echo site_url('manage/majors') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'majors') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Program Keahlian</a>
                </li>
              <?php } ?>

              <li class="<?php echo ($this->uri->segment(2) == 'student' and $this->uri->segment(3) != 'pass' and $this->uri->segment(3) != 'upgrade') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'student' and $this->uri->segment(3) != 'pass' and $this->uri->segment(3) != 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Santri</a>
              </li>
              <li class="<?php echo ($this->uri->segment(3) == 'pass') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student/pass') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'pass') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kelulusan</a>
              </li>
              <li class="<?php echo ($this->uri->segment(3) == 'upgrade') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/student/upgrade') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'upgrade') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Kenaikan Kelas</a>
              </li>
            </ul>
          </li>

          <li class="<?php echo ($this->uri->segment(2) == 'report' or $this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> treeview">
            <a href="#">
              <i class="fa fa-file-text-o text-stock"></i> <span>Laporan</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="<?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report') ?>"><i class="fa  <?php echo ($this->uri->segment(2) == 'report' and $this->uri->segment(3) != 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Laporan Keuangan</a>
              </li>
              <li class="<?php echo ($this->uri->segment(3) == 'report_bill') ? 'active' : '' ?> ">
                <a href="<?php echo site_url('manage/report/report_bill') ?>"><i class="fa  <?php echo ($this->uri->segment(3) == 'report_bill') ? 'fa-dot-circle-o' : 'fa-circle-o' ?>"></i> Rekapitulasi</a>
              </li>
            </ul>
          </li>

          <li class="<?php echo ($this->uri->segment(2) == 'information') ? 'active' : '' ?>">
            <a href="<?php echo site_url('manage/information'); ?>">
              <i class="fa fa-bullhorn"></i> <span>Informasi</span>
              <span class="pull-right-container"></span>
            </a>
          </li>









        <?php } ?>

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>