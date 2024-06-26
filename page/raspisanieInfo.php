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

$id = isset($_GET['id']) ? $_GET['id'] : false;
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
                    <?php
                    //Делаем выборку всех запросов
                    $query = mysql_query("SELECT `id`, `group`, `object` FROM `raspisanie` WHERE `id` = " . $id . " LIMIT 1") or die (mysql_error());
                    $result = mysql_fetch_array($query);

                    $arrayDay = array(
                        'Понедельник',
                        'Вторник',
                        'Среда',
                        'Четверг',
                        'Пятница'
                    );
                    ?>
                    <h1 class="text-center title pt-2">Расписание класса <?= $result['group'] ?></h1>
                    <section>
                        <?php

                        echo '<table width="100" class="table table-hover table-bordered table-striped"><tbody>';
                        echo '<tr>';
                        foreach ($arrayDay as $value) {
                            echo '<th>' . $value . '</th>';
                        }
                        echo '</tr>';

                        /*$array = array(
                            array('Труды', 'Физкультура', 'Музыка', 'Черчение'),
                            array('Русский язык', 'Информатика', 'Математика', 'Физкультура', 'Черчение'),
                            array('Русский язык', 'Физкультура', 'Информатика', 'Английский язык'),
                            array('Литература', 'Английский язык', 'Труды', 'Биология'),
                            array('ИЗО', 'Русский язык', 'ИЗО', 'Литературное чтение'),
                        );

                        echo base64_encode(serialize($array));*/

                        $array = array(
                            unserialize(base64_decode($result['object']))
                        );

                        echo '<tr>';
                        foreach ($array as $member) {
                            foreach ($member as $k => $v) {
                                echo '<td>' . $v[0] . '</td>';
                            }
                        }
                        echo '</tr>';

                        echo '<tr>';
                        foreach ($array as $member) {
                            foreach ($member as $k => $v) {
                                echo '<td>' . $v[1] . '</td>';
                            }
                        }
                        echo '</tr>';

                        echo '<tr>';
                        foreach ($array as $member) {
                            foreach ($member as $k => $v) {
                                echo '<td>' . $v[2] . '</td>';
                            }
                        }
                        echo '</tr>';

                        echo '<tr>';
                        foreach ($array as $member) {
                            foreach ($member as $k => $v) {
                                echo '<td>' . $v[3] . '</td>';
                            }
                        }
                        echo '</tr>';
                        echo '</tbody></table>';

                        echo '<a href="raspisanie.php"><div class="about_info_group">Назад</div></a></td>';

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