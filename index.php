<?php

/*
 * Подключаем файлы
 */
require_once 'include/session.php';
require_once 'include/db.php';

//Название страницы
$title = 'Школа';

//Подключаем шапку
require_once 'include/header.php';
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
                            <li class="current-menu-parent active">
                                <a href="">Главная</a></li>
                            <li>
                                <a href="page/news.php">Новости</a></li>
                            <li>
                                <a href="page/raspisanie.php">Расписание</a></li>
                            <li>
                                <a href="page/search.php">Поиск</a></li>
                            <li>
                                <a href="page/reception_room.php">Приемная</a></li>
                            <li>
                                <a href="page/feedback.php">Обратная связь</a></li>
                            <li>
                                <?= (!empty($_SESSION['login']) AND !empty($_SESSION['password'])) ? '<a href="page/adminpanel/admin.php">Админ.панель</a>' : '<a href="auth.php">Вход</a>' ?></li>

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
                    <div class="text-center">
                        <img src="src/images/scool1.png" width='600' height='500' alt="" class="p-2 img-fluid">
                    </div>
                    <section>
                        <blockquote>
                            <p>Уважаемые участники образовательного процесса!
                                Приветствую вас на официальном сайте нашего образовательного учреждения, который
                                адресован всем, кому интересны наши будни и праздники, достижения и награды. Сайт создан
                                для вас, уважаемые родители (законные представители), ученики и педагоги, гости нашего
                                сайта.</p>
                            <footer>— <cite>Выдуманный директор</cite></footer>
                        </blockquote>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php

//Подключаем подвал
require_once 'include/footer.php';

?>