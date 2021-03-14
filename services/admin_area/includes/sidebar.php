<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top mainNav">
    <a href="index.php?dashboard" class="navbar-brand">Admin Panel</a>
    <button class="navbar-toggler navbar-toggler-right" data-toggle="collapse"
     data-target="#navbarResponsive">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav">
            <li class="nav-item active"> <a href="index.php?dashboard" class="nav-link">
               <i class="fa fa-fw fa-dashboard"></i><span class="nav-link-text">Dashboard</span> </a>
            </li>
            <li class="nav-item"> <a href="#" class="nav-link" data-toggle="collapse" data-target="#jobs">
               <i class="fa fa-fw fa-gear"></i><span class="nav-link-text">Jobs</span> 
            <i class="fa fa-fw fa-caret-down"></i>
            </a>
            <ul class="li-second-level collapse" id="jobs">
                <li class="nav-item"><a href="index.php?insert_job">Add Job</a></li>
                <li class="nav-item"><a href="index.php?view_jobs">View Jobs</a></li>
            </ul>
            </li>
            <li class="nav-item "> <a href="#" class="nav-link" data-toggle="collapse" data-target="#messages">
               <i class="fa fa-fw fa-inbox"></i><span class="nav-link-text"> 
                  Messages</span> <i class="fa fa-caret-down"></i>
            </a>
            <ul class="li-second-level collapse" id="messages">
               <li><a href="index.php?view_messages">View Messages</a></li>
               <li><a href="index.php?send_messages">Send Messages</a></li>
            </ul>
            </li>
            <li class="nav-item activ"> <a href="#" class="nav-link" data-toggle="collapse" data-target="#categories">
               <i class="fa fa-fw fa-pencil"></i><span class="nav-link-text">Categories</span> 
               <i class="fa fw fa-caret-down"></i></a>
               <ul class="li-second-level collapse" id="categories">
                  <li><a href="index.php?add_category">Add Category</a></li>
                  <li><a href="index.php?view_categories">View Categories</a></li>
               </ul>
            </li>
            <li class="nav-item"> <a href="index.php?view_customer" class="nav-link">
               <i class="fa fa-fw fa-money-check"> </i> <span class="nav-link-text">View Customers</span> </a>
            </li>
            <li class="nav-item activ"> <a href="index.php?view_payments" class="nav-link">
               <i class="fa fa-fw fa-list"></i> <span class="nav-link-text">View Payments</span> </a>
            </li>
            <li class="nav-item"> <a href="#" class="nav-link" data-toggle="collapse" data-target="#users">
               <i class="fa fa-fw fa-user"></i> <span class="nav-link-text">users
                  <i class="fa fa-fw fa-caret-down"></i>
               </span> </a>
               <ul class="collapse" id="users">
                  <li><a href="index.php?add_user">Add User</a></li>
                  <li><a href="index.php?view_users">View User</a></li>
                  <li><a href="index.php?edit_profile">Edit Profile</a></li>
               </ul>
            </li>
            <li class="nav-item activ"> <a href="logout.php" class="nav-link">
               <i class="fa fa-fw fa-power-off"> </i><span class="nav-link-text">Log Out</span> </a>
            </li>
        </ul>
    </div>
</nav>