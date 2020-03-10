    <!-- Sidebar -->
    <div id="sidebar">
      <header>
      <i class="zmdi zmdi-home">Home</i>
      </header>
      <ul class="nav">
        <?php
          $loginrole = $this->session->userdata('loginrole');

    if($loginrole == 1){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>

      <li>
          <a href="<?php echo base_url('dean');?>">
            <i class="zmdi zmdi-accounts-list-alt"></i>Dean
          </a>
        </li>
      <?php
    }

    if($loginrole == 2){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
      <li>
          <a href="<?php echo base_url('finance'); ?>">
            <i class="zmdi zmdi-balance"></i> Finance
          </a>
        </li>
      <?php
    }

    if($loginrole == 3){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
    <li>
          <a href="<?php echo base_url('sport');?>">
            <i class="zmdi zmdi-run"></i> Sports
          </a>
        </li>
      <?php
    }

    if($loginrole == 4){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
    <li>
          <a href="<?php echo base_url('cafe');?>">
            <i class="zmdi zmdi-cutlery"></i> Cafeteria
          </a>
        </li>
      <?php
    }

    if($loginrole == 5){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
    <li>
          <a href="<?php echo base_url('dept');?>">
            <i class="zmdi zmdi-accounts-add"></i> Department
          </a>
        </li>
      <?php
    }

    if($loginrole == 6){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
    <li>
          <a href="<?php echo base_url('library');?>">
            <i class="zmdi zmdi-library"></i> Library
          </a>
        </li>
      <?php
    }

    if($loginrole == 7){
      ?>
      <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
    <li>
          <a href="<?php echo base_url('hostel/index');?>">
            <i class="zmdi zmdi-hotel"></i> Hostel
          </a>
        </li>
      <?php
    }
          if($loginrole == 8){
            ?>
            <li>
          <a href="<?php echo base_url('user');?>">
            <i class="zmdi zmdi-run"></i>Admin
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('dashboard'); ?>">
            <i class="zmdi zmdi-view-dashboard"></i> Dashboard
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('finance'); ?>">
            <i class="zmdi zmdi-balance"></i> Finance
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('library');?>">
            <i class="zmdi zmdi-library"></i> Library
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('hostel/index');?>">
            <i class="zmdi zmdi-hotel"></i> Hostel
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('cafe');?>">
            <i class="zmdi zmdi-cutlery"></i> Cafeteria
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('dept');?>">
            <i class="zmdi zmdi-accounts-add"></i> Department
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('dean');?>">
            <i class="zmdi zmdi-accounts-list-alt"></i>Dean
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('sport');?>">
            <i class="zmdi zmdi-run"></i> Sports
          </a>
        </li>
        <li>
          <a href="<?php echo base_url('course/createcourse');?>">
            <i class="zmdi zmdi-run"></i> Course
          </a>
        </li>
            <?php
          }
        ?>
      </ul>
    </div>