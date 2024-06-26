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
    $name = isset($_POST['name']) ? $_POST['name'] : false;
    $text = isset($_POST['text']) ? $_POST['text'] : false;
    $comment = isset($_POST['comment']) ? $_POST['comment'] : false;
    $del = isset($_POST['del']) ? $_POST['del'] : false;
}
?>

    <style>
        .content {
            width: 100%;
            height: 650px;
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
                        Редактирование обращений</h1>
                    <section>
                        <?php
                        $query = mysql_query("SELECT `id`, `name`, `text`, `comment` FROM `reception_room`");
                        $count = mysql_result(mysql_query("SELECT COUNT(*) FROM `reception_room`;"), 0);
                        $PAGINGS = new PAGINGS(10, "SELECT `id`, `name`, `text`, `comment` FROM `reception_room` ORDER BY `id` DESC");
                        if ($PAGINGS->count_get > 0) {
                            while ($result = mysql_fetch_array($PAGINGS->get)) {
                                echo '
                            <div class="block-admin"><p>' . $result['name'] . '</p>
                            <a href="../../page/adminpanel/reception.php?id=' . $result['id'] . '"><div class="pl-5 text-right read"><p>редактировать</p></div></a>
                            </div>';
                            }

                            if ($count > 10) {
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
                        $query = mysql_query("SELECT `name`, `text`, `comment` FROM `reception_room` WHERE `id` = '" . $id . "' LIMIT 1");
                        $result = mysql_fetch_array($query);
                        echo '<section class="read"><div class="reading">';
                        echo '<form action="" method="post">';
                        echo '<div class="form-group mt-5">
                       <small id="nameHelp" class="form-text font-weight-bold text-left w-50 m-auto" style="color: #d8bc7a">Пользователь
                       </small>
                       <input type="text" name="name" aria-describedby="nameHelp" class="form-control w-50 m-auto" value="' . $result['name'] . '">
                       
                       <small id="textHelp" class="form-text font-weight-bold text-left w-50 m-auto" style="color: #d8bc7a">Текст обращения
                       </small>
                       <textarea type="text" name="text" aria-describedby="textHelp" class="form-control w-50 m-auto" rows="5" cols="45">' . $result['text'] . '</textarea>
                       
                       <small id="commentHelp" class="form-text font-weight-bold text-left w-50 m-auto" style="color: #d8bc7a">Комментарий к обращению
                       </small>
                       <textarea type="text" name="comment" aria-describedby="commentHelp" class="form-control w-50 m-auto" rows="5" cols="45">' . $result['comment'] . '</textarea>
                       
                       <center>
                       <div class="form-check mt-3">
                        <input type="checkbox" class="form-check-input" name="del" id="delete" value="1">
                        <label class="form-check-label" for="delete">Удалить обращение</label>
                      </div>
                       <input type="submit" name="save" class="btn btn-secondary text-center m-3 mt-2" value="Отправить">
                       </center>
                       </div>';
                        echo '</form>';

                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                            $error = array();

                            if ($title == '') {

                                $error[] = 'Введите пожалуйста автора обращения';
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

                                if ($del == 1) {
                                    //Удаляем новость
                                    $query = mysql_query("DELETE FROM `reception_room` WHERE `id` = '" . $id . "'");
                                    $_SESSION['success'] = '<div class="bg-danger text-center p-2">Обращение удалено</div>';
                                } else {
                                    //Обновляем новость
                                    $query = mysql_query("UPDATE `reception_room` SET `name` = '" . $name . "', `text` = '" . $text . "', `comment` = '" . $comment . "' WHERE `id` = '" . $id . "'");
                                    $_SESSION['success'] = '<div class="bg-success text-center p-2">Обращение обновлено</div>';
                                }
                                header("Location: /page/adminpanel/reception.php");
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