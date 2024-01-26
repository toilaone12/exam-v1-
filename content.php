<?php
$query = 'WHERE 1=1';
if(isset($_GET['keyword']) && $_GET['keyword']){
    $query .= ' and name LIKE "%'.$_GET['keyword'].'%" ';
}
if(isset($_GET['id_lesson']) && $_GET['id_lesson']){
    $query .= ' and id_lesson = '.$_GET['id_lesson'];
}
if(isset($_GET['id_level']) && $_GET['id_level']){
    $query .= ' and id_level = '.$_GET['id_level'];
}
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$sql = 'SELECT * FROM baikiemtra '.$query.' ORDER BY id desc LIMIT '.($page-1).',3';
// var_dump($sql);
$result = mysqli_query($conn, $sql);
$count = mysqli_query($conn, 'SELECT * FROM baikiemtra ' .$query)->num_rows;
$pagination = ceil($count / 3);
$resultLevel = mysqli_query($conn, 'SELECT * FROM trinhdo ORDER BY id desc LIMIT 5');
$resultLesson = mysqli_query($conn, 'SELECT * FROM kynang ORDER BY id desc LIMIT 3');
$resultAssignment = mysqli_query($conn, 'SELECT * FROM debai');
?>
<?php require_once('header.php')?>
<section class="words">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="list-tab-exam">
                    <ul class="d-flex align-items-center ps-0 mb-0">
                        <li>
                            <a href="luyenthi.php" class="item-tab router-link-exact-active router-link-active <?= !isset($_GET['id_lesson']) ? 'active-tab-exam' : ''?>">Tất cả</a>
                        </li>
                        <?php
                        while ($rowLesson = mysqli_fetch_assoc($resultLesson)) {
                        ?>
                            <li><a class="<?= isset($_GET['id_lesson']) && $_GET['id_lesson'] == $rowLesson['id'] ? 'active-tab-exam' : ''?>" href="luyenthi.php?id_lesson=<?=$rowLesson['id']?><?=isset($_GET['id_level']) && $_GET['id_level'] ? '&id_level='.$_GET['id_level'] : ''?>"><?= $rowLesson['name'] ?></a></li>
                        <?php
                        }
                        ?>
                    </ul>
                </div>
                <div class="filter-exam">
                    <h3 class="text-dark fs-24 fw-bold mb-0">Tất cả</h3>
                    <div class="search-keyword d-flex align-items-center">
                        <div class="item-sub-search d-flex align-items-center">
                            <input type="text" name="keyword" placeholder="Tìm kiếm..." id="" class="input-search outline-none">
                            <span class="icon-search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                        </div>
                    </div>
                    <div class="list-level-exam">
                        <div class="d-flex align-items-center">
                            <span class="title-level-exam fs-15 text-dark">
                                Trình độ:
                            </span>
                            <ul class="d-flex align-items-center flex-wrap ps-0 mb-0">
                                <li class="one-level-exam"><a href="luyenthi.php" class="<?= !isset($_GET['id_level']) ? 'active-all' : ''?>">Tất cả</a></li>
                                <?php
                                while ($rowLevel = mysqli_fetch_assoc($resultLevel)) {
                                ?>
                                    <li class="one-level-exam"><a class="<?= isset($_GET['id_level']) && $_GET['id_level'] == $rowLevel['id'] ? 'active-all' : ''?>" href="luyenthi.php?id_level=<?=$rowLevel['id']?><?=isset($_GET['id_lesson']) && $_GET['id_lesson'] ? '&id_lesson='.$_GET['id_lesson'] : ''?>"><?= $rowLevel['name'] ?></a></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 mt-4 mt-md-5">
                <div class="row">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                        <div class="col-12 col-sm-6 col-lg-4 mb-4">
                            <div class="main-exam-item">
                                <div class="d-flex align-items-center">
                                    <?php
                                    mysqli_data_seek($resultLesson, 0); //tro ve vi tri dau tien
                                    while ($rowLesson = mysqli_fetch_assoc($resultLesson)) {
                                        if ($rowLesson['id'] == $row['id_lesson']) {
                                    ?>
                                            <a href="" class="d-inline-block me-2 mb-2">
                                                <span class="category-title">
                                                    <?=$rowLesson['name']?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                    <?php
                                    mysqli_data_seek($resultLevel, 0); //tro ve vi tri dau tien
                                    while ($rowLevel = mysqli_fetch_assoc($resultLevel)) {
                                        // die;
                                        if ($rowLevel['id'] == $row['id_level']) {
                                    ?>
                                            <a href="" class="d-inline-block me-2 mb-2">
                                                <span class="level-title">
                                                    <?=$rowLevel['name']?>
                                                </span>
                                            </a>
                                    <?php
                                        }
                                    }
                                    ?>
                                </div>
                                <h3 class="title-exam">
                                    <a href="examine.php?id=<?=$row['id']?>">
                                        <?=$row['name']?>
                                    </a>
                                </h3>
                                <div class="time-exam fs-14 text-secondary">
                                    <i class="fa-regular fa-clock"></i>
                                    <span class="ms-2"><?=$row['duration']?> phút</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex align-items-center">
                                        <div class="img-customer-join rounded-circle border border-0 text-white bg-secondary fs-14">NTH</div>
                                        <div class="img-customer-join rounded-circle border border-0 text-white bg-success fs-14">CCC</div>
                                        <div class="img-customer-join rounded-circle border border-0 text-white bg-info fs-14">ABC</div>
                                        <span class="number-more">+3</span>
                                    </div>
                                    <div class="btn-free-exam bg-success fs-14 text-white">Miễn phí</div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="nav-list-page">
                    <nav aria-label="Page navigation example">
                        <?php
                            $keyword = isset($_GET['keyword']) && $_GET['keyword'] ? 'keyword='.$_GET['keyword'].'&' : '';
                            $id_lesson = isset($_GET['id_lesson']) && $_GET['id_lesson'] ? 'id_lesson='.$_GET['id_lesson'].'&' : '';
                            $id_level = isset($_GET['id_level']) && $_GET['id_level'] ? 'id_level='.$_GET['id_level'].'&' : '';
                        ?>
                        <ul class="pagination">
                            <li class="page-item <?= $page == 1 || !$page ? 'disabled' : ''?>">
                                <a class="page-link fs-17 text-dark rounded me-2 h-100 d-flex align-items-center" href="?<?=$keyword.$id_level.$id_lesson?>page=<?=$page-1?>" <?= $page == 1 || !$page ? 'disabled' : ''?> aria-label="Previous">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                            </li>
                            <?php
                                for($i = 1; $i <= $pagination; $i++){
                            ?>
                            <li class="page-item"><a class="page-link fs-17 <?= $i == $page || (!$page && $i == 1) ? 'active-all' : '' ?> rounded me-2" href="?<?=$keyword.$id_level.$id_lesson?>page=<?=$i?>"><?=$i;?></a></li>
                            <?php
                                }
                            ?>
                            <li class="page-item <?= $page == $pagination ? 'disabled' : ''?>">
                                <a class="page-link fs-17 text-dark rounded me-2 h-100 d-flex align-items-center" href="?<?=$keyword.$id_level.$id_lesson?>page=<?=$page+1?>" <?= $page == $pagination ? 'disabled' : ''?> aria-label="Next">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>
<?php require_once('footer.php') ?>