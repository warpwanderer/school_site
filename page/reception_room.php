<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Приемная';

//Подключаем шапку
require_once '../include/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $user = isset($_POST['user']) ? $_POST['user'] : false;
    $text = isset($_POST['text']) ? $_POST['text'] : false;
}
?>

    <style>
        .content {
            width: 100%;
            height: 500px;
            background: #736357;
            position: absolute;
            top: 20px;
            bottom: 0px;
            left: 0px;
            right: 0px;
        }
        .bg-success a {
            text-decoration: none;
            color: #d8bc7a;
            box-shadow: 0 2px 0px 0px #d8bc7a;
        }
    </style>
    <section>
        <nav>
            <div class="container" id="nav">
                <div class="row">
                    <div class="col-10">
                        <ul>
                            <li>
                                <a href="../index.php">Главная</a></li>
                            <li>
                                <a href="../page/news.php">Новости</a></li>
                            <li>
                                <a href="../page/raspisanie.php">Расписание</a></li>
                            <li>
                                <a href="../page/search.php">Поиск</a></li>
                            <li class="current-menu-parent active">
                                <a href="../page/reception_room.php">Приемная</a></li>
                            <li>
                                <a href="../page/feedback.php">Обратная связь</a></li>
                            <li>
                                <?= (!empty($_SESSION['login']) AND !empty($_SESSION['password'])) ? '<a href="../page/adminpanel/admin.php">Админ.панель</a>' : '<a href="../auth.php">Вход</a>' ?></li>
                        </ul>
                    </div>
                    <div class="col-2 img-fluid">
                        <img src="../src/images/ikonka_obrazovanie.png"
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
                    <h1 class="text-center title pt-2">Приемная | <a href="receptionInfo.php">Обращения</a></h1>
                    <p class="text-center">Добро пожаловать в онлайн-приемную. Уважаемые родители, коллеги и ребята
                        задавайте свои вопросы!</p>
                    <section>
                        <form name="search" id="forms" action="reception_room.php" method="post" class="text-center">
                            <div class="form-group">
                                <small id="nameHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста свое имя
                                </small>
                                <input type="text" name="user" aria-describedby="nameHelp"
                                       class="form-control w-50 m-auto" autocomplete="off">

                                <small id="textHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста текст обращения
                                </small>
                                <textarea type="text" name="text" aria-describedby="textHelp"
                                          class="form-control w-50 m-auto" rows="5" autocomplete="off"></textarea>
                                <input type="submit" name="save" class="btn btn-secondary mt-2" value="Отправить">
                            </div>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                            $error = array();

                            if ($user == '') {

                                $error[] = 'Введите пожалуйста свое имя';
                            } elseif ($text == '') {

                                $error[] = 'Введите текст обращения';
                            }

                            if (count($error) != 0) {
                                echo '<div class="bg-danger text-center w-75 m-auto">';
                                foreach ($error as $value) {
                                    echo $value;
                                }
                                echo '</div>';
                            } else {
                                echo '<div class="bg-success text-center w-75 m-auto">';
                                echo '<h3 class="p-2">Ваше обращение отправлено администраторам школы! Вы можете посмотреть свое обращение перейдя по ссылке <a href="receptionInfo.php">Обращения</a></h3>';
                                echo '</div>';

                                //Добавляем обращение
                                $query = mysql_query("INSERT INTO `reception_room` SET `name` = '".$user."', `text` = '".$text."' ") or die (mysql_error());
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
require_once '../include/footer.php';

?>