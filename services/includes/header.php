
<div class="row">
<div class="col-md-12">
<div id="carouselIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouseleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselIndicators" data-slide-to="2"></li>
    <li data-target="#carouselIndicators" data-slide-to="3"></li>
  </ol>
  <div class="carousel-inner" style="height: 300px">
    <div class="carousel-item active">
      <img src="slides_images/4.jpg" class="d-block w-100 h-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slides_images/2.png" class="d-block w-100 h-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="slides_images/3.png" class="d-block w-100 h-100" alt="...">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon  w3-text-black" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon  w3-text-black" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>
</div>

<nav class="navbar navbar-expand-lg navbar-light">
  <a class="navbar-brand" href="index.php"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="fas fa-home fa-lg"></span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="all_jobs.php"><i class="far fa-credit-card-alt"></i> All Jobs</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer_register.php"><i class="fa fa-user"></i> Register</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="customer/my_account.php?send_order" ><i class="fa fa-university"></i> My Account</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="work.php" ><i class="fa fa-briefcase"></i> How It Works</a>
      </li>
      <li class="nav-item">
        <a class="nav-link " href="themes.php" ><i class="fa fa-sitemap"></i> Buy A Theme</a>
      </li>
      <form action="results.php" class="form-inline" method="get">
            <div class="input-group">
                <input type="text" placeholder="search" class="form-control">
                <div class="input-group-prepend">
                    <button class="btn btn-outline-primary" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </div>
      </form>
    </ul>
  </div>
</nav>

<div class="buttons-navbar clearfix">
  <div class="float-right">
    <a href="customer_register.php" class="btn btn-primary">Register</a>
    <a href="order_now.php" class="btn btn-warning">Login</a>
    <a href="payment_options.php" class="btn btn-success">Payment Options</a>
  </div>
</div>
