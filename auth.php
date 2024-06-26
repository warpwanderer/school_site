<?php

/*
 * Подключаем файлы
 */
require_once 'include/session.php';
require_once 'include/db.php';

//Авторизован ли пользователь

if (!empty($_SESSION['login']) && !empty($_SESSION['password'])) {
    header("Location: /page/adminpanel/admin.php");
    exit;
}

//Название страницы
$title = 'Вход';

//Подключаем шапку
require_once 'include/header.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {

    //Логин и пароль администратора
    $InfoLogin = 'Admin';
    $InfoPassword = '12345';

    $user = isset($_POST['user']) ? $_POST['user'] : false;
    $password = isset($_POST['password']) ? $_POST['password'] : false;
}
?>

    <style>
        .content {
            width: 100%;
            height: 350px;
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
                            <li>
                                <a href="../page/feedback.php">Обратная связь</a></li>
                            <li class="current-menu-parent active">
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
                    <h1 class="text-center title pt-2">Вход</h1>
                    <section>
                        <form name="search" action="auth.php" method="post" class="text-center">
                            <div class="form-group">
                                <small id="nameHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста свое логин
                                </small>
                                <input type="text" name="user" aria-describedby="nameHelp"
                                       class="form-control w-50 m-auto">

                                <small id="passwordHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста свой пароль
                                </small>
                                <input type="password" name="password" aria-describedby="passwordHelp"
                                       class="form-control w-50 m-auto">
                                <input type="submit" name="save" class="btn btn-secondary mt-2" value="Вход">
                            </div>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])) {
                            $error = array();

                            if ($user == '') {

                                $error[] = 'Введите пожалуйста свой логин';
                            } elseif ($user != $InfoLogin) {

                                $error[] = 'Такого логина не существует';
                            } elseif ($password == '') {

                                $error[] = 'Введите пароль';
                            } elseif ($password != $InfoPassword) {

                                $error[] = 'Не правильно введен пароль';
                            }

                                if (count($error) != 0) {
                                    echo '<div class="bg-danger text-center w-75 m-auto">';
                                    foreach ($error as $value) {
                                        echo $value;
                                    }
                                    echo '</div>';
                                } else {
                                    //Создаем сессии для авторизации администратора

                                    $_SESSION['login'] = $user;
                                    $_SESSION['password'] = $password;

                                    header("Location: /page/adminpanel/admin.php");
                                    exit;
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
require_once 'include/footer.php';

?>