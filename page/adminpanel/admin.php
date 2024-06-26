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
$title = 'Админ.панель';

//Подключаем шапку
require_once '../../include/headers.php';
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
                    <h1 class="text-center title pt-2">Админ.панель</h1>
                    <p class="text-center">Здравствуйте <b>Администратор</b>. Здесь вы можете полностью управлять сайтом</p>
                    <section>
                        <div class="text-left">
                            <a href="../../page/adminpanel/addNews.php">
                                <div class="block-admin">
                                <p>Добавить новости</p>
                                </div>
                            </a>
                            <a href="../../page/adminpanel/news.php">
                                <div class="block-admin">
                                    <p>Редактировать новости</p>
                                </div>
                            </a>
                            <a href="../../page/adminpanel/reception.php">
                                <div class="block-admin mt-1">
                                <p>Управлять обращениями</p>
                                </div>
                            </a>
                            <a href="../../exit.php" class="m-auto">
                                <div class="block-admin mt-1">
                                    <p>Выход из Админ.панели</p>
                                </div>
                            </a>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
<?php

//Подключаем подвал
require_once '../../include/footer.php';

?>