<header>
<div class="wrapper">
    <div class="nav-wrapper">
    <div class="container">
        <div class="navbar-header">
            <nav class="navbar navbar-expand-lg">
            <a href="" class="navbar-brand home">Blog</a>
                <button type="button" class="navbar-toggler w3-btn" data-toggle="collapse" data-target="#collapse-box">
                    <span class="fa fa-bars fa-lg toggle-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapse-box">
                    <ul class="navbar-nav nav-list">
                        <li><a href="index.php">Home</a></li>
                       <?php 
                        $get_cat = "SELECT * FROM categories";
                        $run_cat = mysqli_query($con, $get_cat);
                        while ($row_cat = mysqli_fetch_array($run_cat)) {
                            $cat_id = $row_cat['category_id'];
                             $cat_title = $row_cat['category_title'];
                             echo "<li><a href='index.php?cat=$cat_id'>$cat_title</a></li>";
                        }
                       ?>
                       <li><a href="services/index.php" target="blank">Services</a></li>
                        <li><a href="about.php">About Us</a></li>
                    </ul>
                </div>
            </nav>
           
        </div>

    </div>
    </div>
    <div class="navbar-bottom clearfix">
                <div class="container search-box">
                <a href="#">Blog</a>
                    <form action="search.php" class="searchform">
                    <div class="input-group">
                    <input type="text" class="form-control" class="searchfield" name="search_query">
                    <div class="input-group-prepend">
                    <button type="submit" class="btn btn-outline-primary" name="search">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
            </form>
        </div>
                </div>

</div>


</header>
