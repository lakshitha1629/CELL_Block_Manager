<!-- Navbar -->
<form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-0 my-2 my-md-0">
<?php if (isset($_SESSION['success'])) : ?>
  <div style="color: darkgray;"><b><?php echo $_SESSION['user_name']; ?></b>
    <i> (<?php echo $_SESSION['user_type']; ?>)</i>
  </div>
<?php endif ?>
</form> 
<ul class="navbar-nav ml-auto ml-md-0">

  <li class="nav-item dropdown no-arrow">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

      <i class="fas fa-user-circle fa-fw"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
      <!-- <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
      <a href="Admin_dashboard.php?logout='1'" style="color: red;"> -->
      <a class="dropdown-item" href="dashboard.php?logout='1'">Logout</a>
    </div>
  </li>
</ul>


</nav>
