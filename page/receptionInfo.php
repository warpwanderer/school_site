<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Обращения';

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
            height: 600px;
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
                    <h1 class="text-center title pt-2"><a href="reception_room.php">Приемная</a> | Обращения</h1>
                    <section>
                        <?php
                        $query = mysql_query("SELECT `id`, `title`, `text` FROM `reception_room`");
                        $count = mysql_result(mysql_query("SELECT COUNT(*) FROM `reception_room`;"), 0);
                        $PAGINGS = new PAGINGS(2, "SELECT * FROM `reception_room` ORDER BY `id` DESC");
                        if($PAGINGS->count_get > 0) {
                            while ($result = mysql_fetch_array($PAGINGS->get)) {

                                echo '<div class="news m-3">';
                                echo '<div class="title">Пользователь: ' . $result['name'] . '</div>';
                                echo '<div class="text">' . $result['text'] . '</div>';
                                echo '<p class="alert-danger mt-2">Комментарии:</p>';

                                if (!is_null($result['comment'])) {
                                    echo $result['comment'];
                                } else {
                                    echo 'Вам еще не ответили на обращение';
                                }

                                echo '</div>';
                            }
                            if($count>2) {
                                echo $PAGINGS->Links('?r='.rand(10000,99999).'&');
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