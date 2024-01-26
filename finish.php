<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Học tiếng Đức với Decamy, tự học tiếng Đức online</title>
    <link rel="icon" href="./public/img/favicon-decamy-637031281346427270.ico">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;1,100;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./public/css/style2.css">
    <link rel="stylesheet" href="./public/css/font.css">
    <!-- <link rel="icon" href="https://www.harper7coffee.com/images/favicon.ico" type="image/x-icon"> -->
    <link rel="stylesheet" href="./public/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<?php require_once('config.php') ?>
<?php
$id = $_GET['id'];

$result = mysqli_query($conn, 'SELECT * FROM baikiemtra WHERE id=' . $id);
$row = mysqli_fetch_assoc($result);
$resultLesson = mysqli_query($conn, 'SELECT * FROM kynang WHERE id =' . $row['id_lesson']);
$rowLesson = mysqli_fetch_assoc($resultLesson);
$listAssignment = explode('|', trim($row['list_assignment'], '|'));
$arrayExam = [];
$correctCount = 0;
$wrongCount = 0;
$noChooseCount = 0;
foreach ($listAssignment as $key => $idAssignment) {
    $resultAssignment = mysqli_query($conn, "SELECT * FROM debai WHERE id = " . $idAssignment);
    $rowAssignment = mysqli_fetch_assoc($resultAssignment);
    $listQuestion = explode('|', trim($rowAssignment['list_question'], '|'));
    foreach ($listQuestion as $idQuestion) {
        $resultQuestion = mysqli_query($conn, "SELECT * FROM cauhoi WHERE id = " . $idQuestion);
        $rowQuestion = mysqli_fetch_assoc($resultQuestion);
        $key = $idAssignment;
        if (!array_key_exists($key, $arrayExam)) {
            $arrayExam[$key] = [
                'id' => $rowAssignment['id'],
                'title' => $rowAssignment['name'],
            ];
        }
        // Xác định đáp án đúng
        $correctAnswer = $rowQuestion['answer'];

        // Lấy đáp án đã chọn từ dữ liệu đầu vào
        $chooseAnswer = isset($_POST['answer_' . $rowAssignment['id'] . '_' . $rowQuestion['id']]) ? $_POST['answer_' . $rowAssignment['id'] . '_' . $rowQuestion['id']] : '';

        // Kiểm tra đáp án đã chọn có đúng hay không
        $isCorrect = ($chooseAnswer == $correctAnswer);
        $arrayExam[$key]['list'][] = [
            'id' => $rowQuestion['id'],
            'question' => $rowQuestion['name'],
            'answer_a' => $rowQuestion['answer_a'],
            'answer_b' => $rowQuestion['answer_b'],
            'answer_c' => $rowQuestion['answer_c'],
            'answer_d' => $rowQuestion['answer_d'],
            'answer' => $correctAnswer,
            'choose' => $chooseAnswer,
        ];
        if ($chooseAnswer == '') {
            $noChooseCount++;
        } else {
            if ($isCorrect) {
                $correctCount++;
            } else {
                $wrongCount++;
            }
        }
    }
}
// var_dump($arrayExam); die;
?>

<body>
    <div class="position-relative overflow-hidden">
        <div class="detail">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="exam-detail-block" style="width: 350px;">
                            <h3 class="exam-detail-title"><?= $row['name'] ?></h3>
                            <p class="exam-detail-time">Thời lượng: <span class="fw-bolder duration-exam" data-duration="<?= $row['duration'] ?>"><?= $row['duration'] < 10 ? '0' . $row['duration'] : $row['duration'] ?> Phút</span></p>
                            <div class="exam-detail-label">
                                <p><?=$rowLesson['name']?></p>
                            </div>
                            <div class="exam-detail-finish">
                                <ul class="d-flex justify-content-between ps-0 mb-0">
                                    <li>
                                        <span class="exam-detail-correct">Câu đúng</span>
                                        <span class="exam-detail-text text-white fs-16 d-flex align-items-center justify-content-center"><?= $correctCount ?></span>
                                    </li>
                                    <li>
                                        <span class="exam-detail-wrong">Câu sai</span>
                                        <span class="exam-detail-text text-white fs-16 d-flex align-items-center justify-content-center"><?= $wrongCount ?></span>
                                    </li>
                                    <li>
                                        <span class="exam-detail-no-choose">Chưa trả lời</span>
                                        <span class="exam-detail-text text-white fs-16 d-flex align-items-center justify-content-center"><?= $noChooseCount ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="exam-detail-finish">
                                <a href="index.php" class="exam-detail-button finish-exam">Trang chủ</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <h3 class="exam-block-title mt-0">Đọc đoạn văn và lựa chọn câu trả lời chính xác!</h3>
                        <?php
                        $count = 0;
                        foreach ($arrayExam as $key => $exam) {
                            $count++;
                        ?>
                            <div class="exam-block-question">
                                <div class="d-flex flex-wrap justify-content-between">
                                    <div class="exam-block-type">
                                        <div class="exam-block-type-name">
                                            <a href="#">Câu số <?= $count; ?></a>
                                        </div>
                                        <div class="d-flex justify-content-between flex-column">
                                            <div class="exam-block-type-content">
                                                <h3 class="exam-block-type-title">
                                                    <?= $exam['title'] ?>
                                                </h3>
                                            </div>
                                            <?php foreach ($exam['list'] as $key1 => $one) { ?>
                                                <div class="exam-item-question">
                                                    <div class="d-flex flex-wrap exam-title-question align-items-center">
                                                        <div class="exam-number-question">1.<?= $key1 + 1 ?></div>
                                                        <h3 class="exam-label-question" data-id="<?= $one['id'] ?>">
                                                            <?= $one['question'] ?>
                                                        </h3>
                                                    </div>
                                                    <div class="exam-option-question d-flex align-items-center overflow-hidden flex-wrap align-content-start">
                                                        <div class="exam-item-question w-100 d-block form-check mb-2">
                                                            <input class="form-check-input <?=$one['answer'] == 'A' ? 'bg-success' : ''?>" type="radio" name="answer_<?= $exam['id'] ?>_<?= $one['id'] ?>" disabled <?=$one['answer'] == 'A' ? 'checked' : ''?> value="A" id="A_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                            <label class="form-check-label" for="A_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                A. <?= $one['answer_a'] ?>
                                                            </label>
                                                        </div>
                                                        <div class="exam-item-question w-100 d-block form-check mb-2">
                                                            <input class="form-check-input <?=$one['answer'] == 'B' ? 'bg-success' : ''?>" type="radio" name="answer_<?= $exam['id'] ?>_<?= $one['id'] ?>" disabled <?=$one['answer'] == 'A' ? 'checked' : ''?> value="B" id="B_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                            <label class="form-check-label" for="B_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                B. <?= $one['answer_b'] ?>
                                                            </label>
                                                        </div>
                                                        <?php if ($one['answer_c']) { ?>
                                                            <div class="exam-item-question w-100 d-block form-check mb-2">
                                                                <input class="form-check-input <?=$one['answer'] == 'C' ? 'bg-success' : ''?>" type="radio" name="answer_<?= $exam['id'] ?>_<?= $one['id'] ?>" disabled <?=$one['answer'] == 'A' ? 'checked' : ''?> value="C" id="C_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                <label class="form-check-label" for="C_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                    C. <?= $one['answer_c'] ?>
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if ($one['answer_d']) { ?>
                                                            <div class="exam-item-question w-100 d-block form-check mb-2">
                                                                <input class="form-check-input <?=$one['answer'] == 'D' ? 'bg-success' : ''?>" type="radio" name="answer_<?= $exam['id'] ?>_<?= $one['id'] ?>" disabled <?=$one['answer'] == 'A' ? 'checked' : ''?> value="D" id="D_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                <label class="form-check-label" for="D_<?= $exam['id'] ?>_<?= $one['id'] ?>">
                                                                    D. <?= $one['answer_d'] ?>
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php require_once('script.php') ?>
</body>

</html>