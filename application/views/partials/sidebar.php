<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link collapsed" href="<?php echo base_url('cmember') ?>">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-journal-text"></i><span>Catatan Member</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="forms-nav" class="nav-content collapse text" data-bs-parent="#sidebar-nav" >
      <li >
        <a href="<?php echo base_url('cmember/catatnutrisi') ?>" class="text-decoration-none">
          <i class="bi bi-circle"></i><span class="text-light">Catatan Nutrisi</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('cmember/catataktivitas') ?>" class="text-decoration-none">
          <i class="bi bi-circle"></i><span  class="text-light">Catatan Aktivitas</span>
        </a>
      </li>

    </ul>
  </li><!-- End Forms Nav -->
  

  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
      <i class="bi bi-layout-text-window-reverse"></i><span>Data Catatan</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
      <li>
        <a href="<?php echo base_url('cmember/tampilnutrisi') ?>" class="text-decoration-none" >
          <i class="bi bi-circle"></i><span class="text-light">Data Nutrisi</span>
        </a>
      </li>
      <li>
        <a href="<?php echo base_url('cmember/tampilaktivitas') ?>" class="text-decoration-none">
          <i class="bi bi-circle"></i><span class="text-light">Data Aktivitas</span>
        </a>
      </li>
    </ul>
  </li><!-- End Tables Nav -->
</ul>
</aside><!-- End Sidebar-->