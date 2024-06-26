<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Расписание';

//Подключаем шапку
require_once '../include/header.php';
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
                            <li class="current-menu-parent active">
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
                    <h1 class="text-center title pt-2">Расписание классов</h1>
                    <section>
                        <?php
                        //Делаем выборку всех запросов
                        $query = mysql_query("SELECT `id`, `group` FROM `groups`") or die (mysql_error());
                        $count = 0;

                        echo '<table width="100" class="table table-hover table-bordered table-striped"><tbody>';
                        while ($result = mysql_fetch_array($query)) {
                            if ($count === 0) {
                                echo '<tr>';
                            }
                            elseif ($count == 3) {
                                echo '</tr>';
                                $count = 0;
                            }
                            echo '<td class="text-center">Класс <b>'.$result['group'].'</b><a href="raspisanieInfo.php?id='.$result['id'].'"><div class="about_info">посмотреть</div></a></td>';
                            $count++;

                        }
                        echo '</tbody></table>';
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