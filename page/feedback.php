<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Обратная связь';

//Подключаем шапку
require_once '../include/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
    $user = isset($_POST['user']) ? $_POST['user'] : false;
    $email = isset($_POST['email']) ? $_POST['email'] : false;
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
                            <li>
                                <a href="../page/reception_room.php">Приемная</a></li>
                            <li class="current-menu-parent active">
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
                    <h1 class="text-center title pt-2">Обратная связь</h1>
                    <section>
                        <form name="search" action="feedback.php" method="post" class="text-center">
                            <div class="form-group">
                                <small id="nameHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста свое имя
                                </small>
                                <input type="text" name="user" aria-describedby="emailHelp"
                                       class="form-control w-50 m-auto">

                                <small id="emailHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста свой электронный адрес
                                </small>
                                <input type="email" name="email" aria-describedby="nameHelp"
                                       class="form-control w-50 m-auto">

                                <small id="textHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста текст сообщения
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
                                } elseif ($email == '') {

                                    $error[] = 'Введите электронный адрес';
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
                                    //Посылаем письмо на почту директора школы

                                    $to = 'artgomartgom@yandex.ru';
                                    $subject = 'Обратная связь с сайта';
                                    $subject = '=?utf-8?B?'.base64_encode($subject).'?=';
                                    $message = 'Письмо отправлено с сайта вашей школы <br>
                                    Имя: '.$user.' <br>
                                    Email: '.$email.' <br>
                                    Текст сообщения: '.$text.' ';
                                    $headers = "From: ".$email." <".$email.">\r\nContent-type: text/html; charset=utf-8 \r\n";
                                    $mail = mail($to, $subject, $message, $headers);

                                    if ($mail) {
                                        echo '<div class="bg-success text-center w-75 m-auto">';
                                        echo '<h3 class="p-2">Ваше сообщение было отправлено на почту директора школы!Вы получите вскоре ответ на почту, которую указали</a></h3>';
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
require_once '../include/footer.php';

?>