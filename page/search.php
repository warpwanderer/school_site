<?php

/*
 * Подключаем файлы
 */
require_once '../include/session.php';
require_once '../include/db.php';

//Название страницы
$title = 'Поиск';

//Подключаем шапку
require_once '../include/header.php';

// Обработчик формы

function search($words)
{
    $words = htmlspecialchars($words);

    if ($words === '') {
        return false;
    }

    $querySearch = '';

    $arrayWorlds = explode(" ", $words);

    foreach ($arrayWorlds as $key => $value) {
        if (isset($arrayWorlds[$key - 1])) {
            $querySearch .= ' OR';
        }

        $querySearch .= '`title` LIKE "%' . $value . '%" OR `text_article` LIKE "%' . $value . '%"';
    }

    $query = mysql_query("SELECT `title`, `text_article`  FROM `search` WHERE $querySearch");
    $i = 0;

    while ($row = mysql_fetch_assoc($query)) {
        $results[$i] = $row;
        $i++;
    }

    return $results;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bsearch'])) {
    $words = isset($_POST['words']) ? $_POST['words'] : false;
    $results = search($words);
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
                            <li class="current-menu-parent active">
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
                    <h1 class="text-center title pt-2">Поиск</h1>
                    <section>
                        <form name="search" action="search.php" method="post" class="text-center">
                            <div class="form-group">
                                <small id="searchHelp" class="form-text font-weight-bold text-left w-50 m-auto"
                                       style="color: #d8bc7a">Введите пожалуйста ключевое слово
                                </small>
                                <input type="text" name="words" aria-describedby="searchHelp"
                                       class="form-control w-50 m-auto">
                                <input type="submit" name="bsearch" class="btn btn-secondary mt-2" value="Поиск">
                            </div>
                        </form>
                        <?php
                        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['bsearch'])) {
                            echo '<h2 class="text-center result pt-2">Результаты запроса</h2>';
                            if ($results === false) {
                                echo '<div class="bg-danger text-center w-75 m-auto">Вы задали пустой запрос</div>';
                            }

                            if (count($results) == 0) {
                                echo '<div class="bg-danger text-center w-75 m-auto">Ничего не найдено</div>';
                            } else {
                                for ($i = 0; $i < count($results); $i++) {
                                    $text = preg_match("/^(.{300,}?)\s+/s", $results[$i]['text_article'], $m) ? $m[1] . '...' : $result['text'];
                                    echo '<div class="bg-success">';
                                    echo '<div class="h3 title font-weight-bolder">'.$results[$i]['title'].'</div>';
                                    echo '</div>';
                                    echo '<div class="bg-white">';
                                    echo '<div class="info">'.$text.'</div>';
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