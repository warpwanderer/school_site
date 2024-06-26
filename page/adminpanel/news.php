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
$title = 'Редактирование новостей';

//Подключаем шапку
require_once '../../include/headers.php';

$id = isset($_GET['id']) ? $_GET['id'] : false;

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $title = isset($_POST['title']) ? $_POST['title'] : false;
    $text = isset($_POST['text']) ? $_POST['text'] : false;
    $del = isset($_POST['del']) ? $_POST['del'] : false;
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
                        Редактирование новостей</h1>
                    <section>
                        <?php
                        $query = mysql_query("SELECT `id`, `title`, `text` FROM `news`");
                        $count = mysql_result(mysql_query("SELECT COUNT(*) FROM `news`;"), 0);
                        $PAGINGS = new PAGINGS(6, "SELECT * FROM `news` ORDER BY `id` DESC");
                        if ($PAGINGS->count_get > 0) {
                            while ($result = mysql_fetch_array($PAGINGS->get)) {
                                echo '
                            <div class="block-admin"><p>' . $result['title'] . '</p>
                            <a href="../../page/adminpanel/news.php?id=' . $result['id'] . '"><div class="pl-5 text-right read"><p>редактировать</p></div></a>
                            </div>';
                            }

                            if ($count > 6) {
                                echo $PAGINGS->Links('?r=' . rand(10000, 99999) . '&');
                            }
                        }
                        ?>
                    </section>
                    <?php
                    if (isset($_SESSION['success'])) {
                        echo '<section class="read"><div class="reading">
                              ' . $_SESSION['success'] . '
                              </div></section>';
                        unset($_SESSION['success']);
                    } elseif ($id != '') {
                        $query = mysql_query("SELECT `title`, `text` FROM `news` WHERE `id` = '" . $id . "' LIMIT 1");
                        $result = mysql_fetch_array($query);
                        echo '<section class="read"><div class="reading">';
                        echo '<form action="" method="post">';
                        echo '<div class="form-group mt-5">
                       <small id="titleHelp" class="form-text font-weight-bold text-left w-50 m-auto" style="color: #d8bc7a">Заголовок новости
                       </small>
                       <input type="text" name="title" aria-describedby="emailHelp" class="form-control w-50 m-auto" value="' . $result['title'] . '">
                       
                       <small id="textHelp" class="form-text font-weight-bold text-left w-50 m-auto" style="color: #d8bc7a">Текст новости
                       </small>
                       <textarea type="text" name="text" aria-describedby="emailHelp" class="form-control w-50 m-auto" rows="5" cols="45">' . $result['text'] . '</textarea>
                       <center>
                       <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" name="del" id="delete" value="1">
                        <label class="form-check-label" for="delete">Удалить новость</label>
                      </div>
                       <input type="submit" name="save" class="btn btn-secondary text-center m-3 mt-2" value="Отправить">
                       </center>
                       </div>';
                        echo '</form>';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                            $error = array();

                            if ($title == '') {

                                $error[] = 'Введите пожалуйста заголовок новости';
                            } elseif ($text == '') {

                                $error[] = 'Введите текст новости';
                            }

                            if (count($error) != 0) {
                                echo '<div class="bg-danger text-center w-75 m-auto">';
                                foreach ($error as $value) {
                                    echo $value;
                                }
                                echo '</div>';
                            } else {

                                if ($del == 1) {
                                    //Удаляем новость
                                    $query = mysql_query("DELETE FROM `news` WHERE `id` = '" . $id . "'");
                                    $_SESSION['success'] = '<div class="bg-danger text-center p-2">Новость удалена</div>';
                                } else {
                                    //Обновляем новость
                                    $query = mysql_query("UPDATE `news` SET `title` = '" . $title . "', `text` = '" . $text . "' WHERE `id` = '" . $id . "'");
                                    $_SESSION['success'] = '<div class="bg-success text-center p-2">Новость обновлена</div>';
                                }
                                header("Location: /page/adminpanel/news.php");
                                exit;
                            }
                        }

                        echo '</div></section>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php

//Подключаем подвал
require_once '../../include/footer.php';

?>