<header>
    <!-- Navbar-->
    <nav class="sticky-top navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
        <a class="navbar-brand" href="index.php"><img src="./public/img/logo.png" alt="Avatar Logo" style="width:100px;" class="rounded-pill"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Khoa hoc</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="course.php">Khoa hoc thanh thieu nien</a></li>
                    <li><a class="dropdown-item" href="course2.php">Khoa luyen thi B1</a></li>
                    <li><a class="dropdown-item" href="course3.php">Khoa hoc dac biet</a></li>
                    <li><a class="dropdown-item" href="goihoc.php">Goi hoc</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Tu dien</a>
                </li>
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="thuvien.php" role="button" data-bs-toggle="dropdown">Thu vien</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="thuvien.php">Tu vung</a></li>
                    <li><a class="dropdown-item" href="nguphap.php">Ngu Phap</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="luyenthi.php">Luyen Thi</a>
                </li>              
                
                <form class="search d-flex" action="" method="get">
                    <input class="form-control me-2" name="search" type="text" placeholder="ban muon tim gi?" value="<?php if(isset($_GET["search"])) {echo $_GET["search"]; } ?>" >
                    <button class="btn btn-primary" type="submit" value="search" name="search_user">Search</button>
                </form>

                <?php
     
                $select_rows = mysqli_query($conn, "SELECT * FROM `cart`")or die('query failed');
                $row_count= mysqli_num_rows($select_rows);
                
                ?>

                <li class="nav-item">
                <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping" style="margin-right:5px"></i>Gio hang<span style="background-color: var(--bs-nav-link-color); color:  #950a21; font-weight: bold; border-radius: 40%;"><?php echo $row_count; ?></span></a>
                </li> 
                <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fa-solid fa-user" style="margin-right:5px"></i>Dang nhap</a>
                </li> 
            </ul>
            


        </div>
        </div>
    </nav>
</header>