<?php 
@session_start();
include("connection.php");

if(!isset($_SESSION['admin_email'])):
    echo "
        <script>window.open('login.php', '_self')</script>
        ";
else:

?>

<nav class="navbar navbar-expand-lg navbar-inverse">
<a class="navbar-brand" href="index.php?dashboard">Admin Panel
       <span class="material-icons">dashboard</span><span>Dashboard</span></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="fa fa-bars w3-white"></span>
  </button>  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav top-nav">
      <li class="nav-item dropdown profile">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-user"></i> <b class="caret"></b>
       <?php echo $admin_name; ?>
        </a>
        <div class="dropdown-menu drops" aria-labelledby="navbarDropdown">      
<a href="index.php?view_users" class="dropdown-item"><i class="fa fa-fw fa-user"></i> Profile</a>
<a href="index.php?view_posts"  class="dropdown-item"> <i class="fa fa-fw fa-envelope"></i> Posts <span class="w3-badge w3-blue"><?php echo $count_posts ?></span></a>
<a href="index.php?view_comments"  class="dropdown-item">
<i class="fa fa-gears"></i> Comments <span class="w3-badge w3-blue"><?php echo $count_comments ?></span>
</a>
<a href="index.php?view_cats"  class="dropdown-item">
<i class="fa fa-gears"></i> Categories <span class="w3-badge w3-blue"><?php echo $count_categories ?>
</span>
</a>
<div class="dropdown-divider"></div>

<a href="logout.php"  class="dropdown-item">
<i class="fa fa-fw fa-power-off"></i> Logo Out
</a>
</div>
</li> 
<li class="nav-item">
    <a href="index.php?dashboard" class="nav-link">
    <i class="fas fa-money-check"> </i>Dashboard
    </a>
</li>
<li class="nav-item dropdown">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" id="postdropdown">
        <i class="fa fa-table"></i> Posts
    </a>
    <div class="dropdown-menu drops" aria-labelledby="postdropdown">
        <a href="index.php?insert_post" class="dropdown-item"> Insert Post </a>
        <a href="index.php?view_posts" class="dropdown-item"> View posts</a>
    </div>
</li>
<li class="nav-item">
<a href="index.php?view_comments" class="nav-link">
    <i class="fa fa-edit"></i> View Comments
</a>
</li>
<li class="nav-item dropdown">
    <a href="" class="nav-link dropdown-toggle" data-toggle="dropdown" id="categorydropdown">
        Categories
    </a>
    <div class="dropdown-menu drops" aria-labelledby="categorydropdown">
        <a href="index.php?insert_cat"  class="dropdown-item">Insert Category</a>
    <a href="index.php?view_cats" class="dropdown-item">View Categories</a>
    </div>
</li>
<li class="nav-item dropdown">
    <a href="" class="dropdown-toggle nav-link" data-toggle="dropdown" id="users">
        <i class="fa fa-users"></i> Users
    </a>
    <div class="dropdown-menu drops" aria-labelledby="users">
        <a href="index.php?insert_user"  class="dropdown-item">Insert User</a>
        <a href="index.php?view_users"  class="dropdown-item"> View Users</a>
        <a href="index.php?edit_profile=<?php echo $admin_id ?>"  class="dropdown-item"> Edit Profile</a>
    </div>
</li>
<li class="nav-item">
    <a href="logout.php" class="nav-link">
        <i class="fa fa-power-off"></i>Log Out
    </a>
</li>
 </ul>
  </div>
 
</nav>

<?php endif; ?>