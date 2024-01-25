
<header>
    <nav class="sticky-top navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="./public/img/logo.png" alt="Avatar Logo" style="width:100px;" class="rounded-pill"></a>
            <div class="collapse navbar-collapse overflow-auto" id="collapsibleNavbar col-12">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_course.php' ? 'active' : ''?>" href="admin_course.php">Khóa học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_order.php' ? 'active' : ''?>" href="admin_order.php">Đơn hàng</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_user.php' ? 'active' : ''?>" href="admin_user.php">User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_blog.php' ? 'active' : ''?>" href="admin_blog.php">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_test.php' ? 'active' : ''?>" href="admin_test.php">Bài thi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_lesson.php' ? 'active' : ''?>" href="admin_lesson.php">Bài học</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_list_question.php' ? 'active' : ''?>" href="admin_list_question.php">Câu hỏi</a>
                    </li>
                    <li class="nav-item">
                <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_list_lesson.php' ? 'active' : ''?>" href="admin_list_lesson.php">Kỹ năng học</a>
                </li>  
                <li class="nav-item">
                <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_list_assignment.php' ? 'active' : ''?>" href="admin_list_assignment.php">Đề bài</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_list_exam.php' ? 'active' : ''?>" href="admin_list_exam.php">Bài kiểm tra</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?=basename(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)) == 'admin_list_level.php' ? 'active' : ''?>" href="admin_list_level.php">Trình độ</a>
                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"><i class="fa-solid fa-user" style="margin-right:5px"></i>Admin</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="index.php">Thoát</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>