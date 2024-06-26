<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Новости';

//Подключаем шапку
require_once '../include/header.php';
?>

    <style>
        .content {
            width: 100%;
            height: 700px;
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
                                <a href="../index.php">Главная</a></li>
                            <li class="current-menu-parent active">
                                <a href="../page/news.php">Новости</a></li>
                            <li>
                                <a href="../page/raspisanie.php">Расписание</a></li>
                            <li>
                                <a href="../page/search.php">Поиск</a></li>
                            <li>
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
                    <h1 class="text-center title pt-2">Новости</h1>
                    <section>
                        <?php
                        //Делаем выборку всех запросов
                        $query = mysql_query("SELECT `id`, `title`, `text`, `image` FROM `news`");
                        $count = mysql_result(mysql_query("SELECT COUNT(*) FROM `news`;"), 0);
                        $PAGINGS = new PAGINGS(3, "SELECT * FROM `news` ORDER BY `id` DESC");
                        if($PAGINGS->count_get > 0) {
                            while ($result = mysql_fetch_array($PAGINGS->get)) {

                                $text = preg_match("/^(.{300,}?)\s+/s", $result['text'], $m) ? $m[1] . '...' : $result['text'];
                                echo '<div class="news m-3">';
                                echo '<div class="title">' . $result['title'] . '</div>';
                                echo '<div class="text">' . $text . '</div>';
                                echo '<a href="aboutNews.php?id=' . $result['id'] . '"><div class="about">Прочитать</div></a>';
                                echo '</div>';
                            }
                            if($count>3) {
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