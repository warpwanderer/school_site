<?php

/*
 * Подключаем файлы
 */
require_once '../../include/session.php';
require_once '../../include/db.php';

//Авторизован ли пользователь

if (empty($_SESSION['login']) && empty($_SESSION['password'])) {
    header("Location: /auth.php");
    exit;
}

//Название страницы
$title = 'Добавить новости';

//Подключаем шапку
require_once '../../include/headers.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : false;
    $text = isset($_POST['text']) ? $_POST['text'] : false;
    $image = isset($_FILES['image']) ? $_FILES['image'] : false;

    if ($_FILES['image']['tmp_name']) {
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
    }
}
?>

    <style>
        .content {
            width: 100%;
            height: 600px;
            background: #736357;
            position: absolute;
            top: 20px;
            bottom: 0px;
            left: 0px;
            right: 0px;
        }
    </style>
    <section>
        <nav>
            <div class="container" id="nav">
                <div class="row">
                    <div class="col-10">
                        <ul>
                            <li>
                                <a href="../../index.php">Главная</a></li>
                            <li>
                                <a href="../../page/news.php">Новости</a></li>
                            <li>
                                <a href="../../page/raspisanie.php">Расписание</a></li>
                            <li>
                                <a href="../../page/search.php">Поиск</a></li>
                            <li>
                                <a href="../../page/reception_room.php">Приемная</a></li>
                            <li>
                                <a href="../../page/feedback.php">Обратная связь</a></li>
                            <li class="current-menu-parent active">
                                <a href="../../page/adminpanel/admin.php">Админ.панель</a></li>
                        </ul>
                    </div>
                    <div class="col-2 img-fluid">
                        <img src="../../src/images/ikonka_obrazovanie.png"
                             alt="Выдуманный колледж обучения программированию" width="100">
                    </div>
                </div>
            </div>
        </nav>
    </section>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="hr"></div>
                <div class="line"></div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="content">
                    <h1 class="text-center title pt-2"><a href="../../page/adminpanel/admin.php">Админ.панель</a> |
                        Добавить новости</h1>
                    <section>
                        <form name="search" action="" method="post" class="text-center" enctype="multipart/form-data">
                            <div class="form-group">
                                <small id="titleHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите название новости
                                </small>
                                <input type="text" name="title" aria-describedby="titleHelp"
                                       class="form-control w-50 m-auto">

                                <small id="textHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите текст новости
                                </small>
                                <input type="text" name="text" aria-describedby="textHelp"
                                       class="form-control w-50 m-auto">

                                <small id="fileHelp"
                                       class="custom-file-input form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Загрузите картинку
                                </small>
                                <input type="file" name="image" aria-describedby="fileHelp"
                                       class="form-control w-50 m-auto">
                                <input type="submit" name="save" class="btn btn-secondary mt-2" value="Добавить">
                            </div>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                            $error = array();

                            if ($title == '') {

                                $error[] = 'Введите текст названия новости';
                            } elseif ($text == '') {

                                $error[] = 'Введите текст новости';
                            } else {

                                if ($_FILES['image']['tmp_name']) {

                                    $info = getimagesize($_FILES['image']['tmp_name']);

                                    if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {

                                        $error[] = 'Ошибка загрузки с кодом ошибки' . $_FILES['image']['error'];
                                    } elseif ($info === FALSE) {

                                        $error[] = 'Не удается определить тип изображения загруженного файла';
                                    }   elseif (($info[2] !== IMAGETYPE_GIF) && ($info[2] !== IMAGETYPE_JPEG) && ($info[2] !== IMAGETYPE_PNG)) {

                                        $error[] = 'Неверный тип изображения, разрешеные форматы: gif/jpeg/png';
                                    }
                                }

                            }

                            if (count($error) != 0) {
                                echo '<div class="bg-danger text-center w-75 m-auto">';
                                foreach ($error as $value) {
                                    echo $value;
                                }
                                echo '</div>';
                            } else {
                                if ($_FILES['image']['tmp_name']) {
                                    $queryString = ",`image` = '".$newfilename."'";

                                    //Добавляем картинку если она заполнена
                                    move_uploaded_file($_FILES["image"]["tmp_name"], "../../src/images/news/" . $newfilename);

                                } else {
                                    $queryString = "";
                                }

                                $query = mysql_query("INSERT INTO `news` SET `title` = '".$title."', `text` = '".$text."' $queryString");

                                if ($query) {
                                    echo '<div class="bg-success text-center w-75 m-auto">';
                                    echo '<h3 class="p-2">Новость добавлена в раздел <a href="../../page/news.php">Новости</a></h3>';
                                    echo '</div>';
                                }
                            }
                        }
                        ?>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php

//Подключаем подвал
require_once '../../include/footer.php';

?>