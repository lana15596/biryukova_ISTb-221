<?php
session_start();
if (!isset($_SESSION['login']))
    header('Location: auth.php');
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Студенты</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="styles/styles.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/basic/hse.png">
</head>
<body>


<div class="header">

    <!-- Верхняя панель -->
    <div class="border border-end-0 border-top-0 border-start-0 border-white">
        <nav class="navbar p-0">
            <div class="nav-item">
                <span class="border border-top-0 border-start-0 border-white py-3 pb-4">
                    <div class="d-inline-block mx-2" href="#" data-bs-toggle="dropdown">
                        <img src="img/basic/menu.svg" height="30" alt="">
                    </div>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Об университете</a></li>
                        <li><a class="dropdown-item" href="#">Подразделения</a></li>
                        <li><a class="dropdown-item" href="#">Поступление в ВШЭ</a></li>
                        <li><a class="dropdown-item" href="#">Образование</a></li>
                        <li><a class="dropdown-item" href="#">Наука</a></li>
                        <li><a class="dropdown-item" href="#">Экспертная работа</a></li>
                        <li><a class="dropdown-item" href="#">Инновационная инфраструктура</a></li>
                        <li><a class="dropdown-item" href="#">Администрация и сопровождение</a></li>
                        <li><a class="dropdown-item" href="#">Студентам</a></li>
                        <li><a class="dropdown-item" href="#">Свободное общение</a></li>
                        <li><a class="dropdown-item" href="#">Издания и ресурсы</a></li>
                    </ul>
                </span>
                <a class="d-inline-block mx-2" href="index.php">
                    <img src="img/basic/hse.png" alt="" width="30" height="30">
                </a>
            </div>
            <div class="nav-item w-75">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a class="text-light" href="#">Национальный исследовательский университет «Высшая школа экономики»</a></li>
                        <li class="breadcrumb-item"><a class="text-light" href="#">Образовательные программы бакалавриата</a></li>
                        <li class="breadcrumb-item"><a class="text-light" href="#">Факультет компьютерных наук</a></li>
                        <li class="breadcrumb-item active text-light" aria-current="page">Образовательная программа «Прикладная математика и информатика»</li>
                    </ol>
                </nav>
            </div>
            <div class="nav-item">
                <div class="btn-group bg-white" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
                    <label class="btn btn-outline-primary" for="btnradio1">ru</label>

                    <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
                    <label class="btn btn-outline-primary" for="btnradio2">en</label>
                </div>
                <a href="" class="navbar-brand">
                    <img src="img/basic/eye.png" alt="" width="30" height="24">
                </a>
                <a href="" class="navbar-brand">
                    <img src="img/basic/human.svg" alt="" width="30" height="24">
                </a>
                <a href="" class="navbar-brand">
                    <img src="img/basic/search.svg" alt="" width="18" height="18">
                </a>
            </div>
        </nav>
    </div>

    <!-- Заголовок + описание программы -->
    <div class="col-6 offset-2 mt-60">
        <span class="text-light">Бакалаврская программа</span>
        <h1 class="text-light">Прикладная математика и информатика</h1>
        <h5 class="text-light">Целью программы является подготовка специалистов по работе с данными (data scientist), аналитиков (analyst), исследователей в области компьютерных наук (researcher and computer scientist), инженеров-разработчиков и инженеров-исследователей по программному обеспечению (software engineer and research software engineer).</h5>
        <h5 class="text-light">Программа рассчитана на молодых людей, готовящихся к развитию существующих и созданию новых компьютерных технологий, работая в ведущих ИТ-компаниях и исследовательских центрах.  Учебный план программы разработан с учетом опыта ведущих университетов, таких как Stanford University (США), EPFL (Швейцария), МГУ и МФТИ (Россия), а также Школы анализа данных Яндекса, разработавшей одну из самых сильных образовательных программ в области компьютерных наук в России.</h5>
        <button type="button" class="btn btn-outline-light btn-lg my-3">Задать вопрос о программе</button>
    </div>

    <!-- Раскрывающиеся списки под заголовком -->
    <div class="col-7 offset-2 mt-40">
        <!-- Домик -->
        <div class="d-inline-block me-3 bg-white rounded-1">
            <img class="m-2 p-1" src="img/basic/home.svg" height="30" alt="">
        </div>

        <!-- О программе -->
        <div class="me-3 d-inline-block dropdown text-light-hover-dark">
            <div class="dropdown-toggle m-2 p-1" href="#" data-bs-toggle="dropdown">
                <a href="" class="text-light d-inline-block"><h6>О программе</h6></a>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">О программе</a>
                <a class="dropdown-item" href="#">Пилотный поток</a>
                <a class="dropdown-item" href="#">Особенности программы</a>
                <a class="dropdown-item" href="#">Лекторы 1-2 курсов</a>
                <a class="dropdown-item" href="#">О специализациях</a>
                <a class="dropdown-item" href="#">Факультативы ФКН</a>
                <a class="dropdown-item" href="#">Партнеры</a>
                <a class="dropdown-item" href="#">Достижения студентов</a>
                <a class="dropdown-item" href="#">Выпускники</a>
            </div>
        </div>

        <!-- Абитуриентам -->
        <div class="me-3 d-inline-block dropdown text-light-hover-dark">
            <div class="dropdown-toggle m-2 p-1" href="#" data-bs-toggle="dropdown">
                <a href="" class="text-light d-inline-block"><h6>Абитуриентам</h6></a>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Паспорт программы</a>
                <a class="dropdown-item" href="#">Траектория поступления</a>
                <a class="dropdown-item" href="#">Отдел по работе с абитуриентами</a>
                <a class="dropdown-item" href="#">Подготовка</a>
                <a class="dropdown-item" href="#">Стипендии для поступающих</a>
                <a class="dropdown-item" href="#">Будущая профессия</a>
                <a class="dropdown-item" href="#">Онлайн-подготовка</a>
                <a class="dropdown-item" href="#">Тестирование постпивших</a>
            </div>
        </div>

        <!-- Студентам -->
        <div class="me-3 d-inline-block dropdown text-light-hover-dark">
            <div class="dropdown-toggle m-2 p-1" href="#" data-bs-toggle="dropdown">
                <a href="" class="text-light d-inline-block"><h6>Студентам</h6></a>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Доска объявлений</a>
                <a class="dropdown-item" href="#">Онлайн-сервисы для студентов</a>
                <a class="dropdown-item submenu" href="#">Выбор траектории обучения</a>
                <!-- Подменю, отображается справа -->
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Общеуниверситетские курсы</a>
                    <a class="dropdown-item" href="#">Майноры</a>
                </div>
                <a class="dropdown-item" href="#">Специализации</a>
                <a class="dropdown-item submenu" href="#">Практическая подготовка</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Программа практики</a>
                    <a href="" class="dropdown-item">Проекты 2 курса</a>
                    <a href="" class="dropdown-item">Курсовая работа (проект) 3 курса</a>
                    <a href="" class="dropdown-item">ВКР 4 курса</a>
                    <a href="" class="dropdown-item">Учебная практика 1 курса</a>
                    <a href="" class="dropdown-item">Производственнаая практика 3 курса</a>
                    <a href="" class="dropdown-item">Преддипломная практика 4 курса</a>
                </div>
                <a class="dropdown-item submenu" href="#">Проекты</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Программный проект 2 курса</a>
                </div>
                <a class="dropdown-item" href="#">Project Poposal</a>
                <a class="dropdown-item" href="#">Итоговая аттестация</a>
                <a class="dropdown-item" href="#">Каталог ВКР</a>
                <a class="dropdown-item submenu" href="#">Расписание</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">Расписание онлайн</a>
                    <a href="" class="dropdown-item">Расписание экзаменов</a>
                    <a href="" class="dropdown-item">Расписание пересдач</a>
                    <a href="" class="dropdown-item">График учебного процесса</a>
                </div>
                <a class="dropdown-item" href="#">Факультативы ФКН</a>
                <a class="dropdown-item submenu" href="#">Первокурсникам</a>
                <div class="dropdown-menu">
                    <a href="" class="dropdown-item">To Do List первокурсника ПМИ</a>
                    <a href="" class="dropdown-item">БЖД</a>
                    <a href="" class="dropdown-item">Почемучкин</a>
                </div>
                <a class="dropdown-item" href="#">Перевод и восстановление на программу</a>
                <a class="dropdown-item" href="#">Рекомендованный онлайн-курсы</a>
                <a class="dropdown-item" href="#">Студенческая мобильность</a>
                <a class="dropdown-item" href="#">Рейтинги</a>
                <a class="dropdown-item" href="#">Дополнительные иностранные языки</a>
                <a class="dropdown-item" href="#">Мониторинг здоровья студентов</a>
                <a class="dropdown-item" href="#">Иностранным студентам</a>
            </div>
        </div>

        <!-- Выпускникам -->
        <div class="me-3 d-inline-block dropdown text-light-hover-dark">
            <div class="dropdown-toggle m-2 p-1" href="#" data-bs-toggle="dropdown">
                <a href="" class="text-light d-inline-block"><h6>Выпускникам</h6></a>
            </div>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="#">Общая информация</a>
                <a class="dropdown-item" href="#">Центр развития карьеры</a>
                <a class="dropdown-item" href="#">Центр по работе с выпускниками</a>
                <a class="dropdown-item" href="#">Пропуск выпускника</a>
                <a class="dropdown-item" href="#">HSE Alumni Ambassadors</a>
                <a class="dropdown-item" href="#">HSE Alumni Academic Fellowship</a>
            </div>
        </div>
    </div>
</div>


<div class="section">
    <div class="row justify-content-evenly mt-5">
        <!-- Колонка с фильтрами, закрепляется сврху при прокрутке -->
        <div class="col-3 h-100"> <!-- sticky-top ломает наложение слоёв-->
            <div class="text-center">
                <form action="logic.php" method="GET">
                    <div class="h4">Фильтрация поиска</div>
                    <div class="mt-3 w-75 mx-auto">
                        <div class="p">По имени</div>
                        <input type="text" name="name" placeholder="Введите имя" value="<?php if (array_key_exists ('name', $_GET)) echo $_GET['name']; ?>" class="form-control">
                    </div>
                    <div class="mt-3 w-75 mx-auto">
                        <div class="p">По интересам</div>
                        <input type="text" name="characteristic" placeholder="Введите какое-либо хобби" value="<?php if (array_key_exists ('characteristic', $_GET)) echo $_GET['characteristic']; ?>" class="form-control">
                    </div>
                    <div class="mt-3 w-75 mx-auto">
                        <div class="p">По году поступления</div>
                        <div class="row mt-3 align-items-center">
                            <div class="col-5">Начиная с:</div>

                            <div class="col-7">
                                <input type="number" name="year_from" placeholder="Начиная..." value="<?php if (array_key_exists ('year_from', $_GET)) echo $_GET['year_from']; ?>" class="form-control">
                            </div>
                        </div>

                        <div class="row mt-3 align-items-center">
                            <div class="col-5">Заканчивая:</div>

                            <div class="col-7">
                                <input type="number" name="year_to" placeholder="Заканчивая..." value="<?php if (array_key_exists ('year_to', $_GET)) echo $_GET['year_to']; ?>" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3 w-75 mx-auto">
                        <div class="p">По группе</div>
                        <select name="group" class="form-control">
                        <option value="" selected="">Выберите группу</option>
                        <option value="ИВТ-201" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ИВТ-201') { ?>selected="true" <?php }; ?>>ИВТ-201</option>
                        <option value="ПИ-201" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ПИ-201') { ?>selected="true" <?php }; ?>>ПИ-201</option>
                        <option value="ПИ-202" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ПИ-202') { ?>selected="true" <?php }; ?>>ПИ-202</option>
                        <option value="МОС-201" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'МОС-201') { ?>selected="true" <?php }; ?>>МОС-201</option>
                        <option value="ИСТ-211" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ИСТ-211') { ?>selected="true" <?php }; ?>>ИСТ-211</option>
                        <option value="ПРИ-221" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ПРИ-221') { ?>selected="true" <?php }; ?>>ПРИ-221</option>
                        <option value="ПРИ-222" <?php if (array_key_exists ('group', $_GET) and $_GET['group'] == 'ПРИ-222') { ?>selected="true" <?php }; ?>>ПРИ-222</option>
                    </select>
                    </div>
                    <button name="applyFilter" value="Применить фильтр" class="btn btn-primary mt-3 me-3 btn-sm">Применить фильтр</button>
                    <button name="clearFilter" value="Очистить фильтр" class="btn btn-danger mt-3 btn-sm">Очистить фильтр</button>
                </form>
            </div>
        </div>

        <!-- Колонка с выводом результата -->
        <div class="col-8">
            <div class="row border border-top-0 border-end-0 border-start-0 border-2 justify-content-around">
                <div class="col-2"><h5 class="text-center">Изображение</h5></div>
                <div class="col-2"><h5 class="text-center">ФИО</h5></div>
                <div class="col-3"><h5 class="text-center">Интересы</h5></div>
                <div class="col-2"><h5 class="text-center">Год поступления</h5></div>
                <div class="col-2"><h5 class="text-center">Группа</h5></div>
            </div>


            <?php if ($students != null) foreach($students as $student): ?>
                <div class="row text-center mt-2 border-bottom border-1 border-dark mb-1 w-100 justify-content-around">
                    <div class="col-2">
                        <img src="<?= "img/students/".($student['photo']) ?>" alt="" height="140px">
                    </div>
                    <div class="col-2 m-auto"><?= htmlspecialchars($student['student_name']) ?></div>
                    <div class="col-3 m-auto"><?= htmlspecialchars($student['interests']) ?></div>
                    <div class="col-2 m-auto"><?= htmlspecialchars($student['year']) ?></div>
                    <div class="col-2 m-auto"><?= htmlspecialchars($student['group_name']) ?></div>
                </div>
            <?php endforeach?>

        </div>
    </div>

</div>


<div class="footer">

    <!-- Разделительная полоса -->
    <div class="row mt-100 ms-100 me-100 border-footer">
        <div style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Национальный исследовательский университет «Высшая школа экономики»</a></li>
                <li class="breadcrumb-item"><a href="#">Образовательные программы бакалавриата</a></li>
                <li class="breadcrumb-item"><a href="#">Факультет компьютерных наук</a></li>
                <li class="breadcrumb-item active" aria-current="page">Образовательная программа «Прикладная математика и информатика»</li>
            </ol>
        </div>
    </div>

    <!-- Все ссылки в футере -->
    <div class="row ms-100 mt-40 align-top">
        <div class="col-2 me-4">
            <a class="d-block text-dark" href=""><h3>О ВЫШКЕ</h3></a>
            <a class="d-block" href="">Цифры и факты</a>
            <a class="d-block" href="">Руководство и структура</a>
            <a class="d-block" href="">Преподаватели и сотрудники</a>
            <a class="d-block" href="">Корпуса и общежития</a>
            <a class="d-block" href="">Закупки</a>
            <a class="d-block" href="">Обращения граждан в НИУ ВШЭ</a>
            <a class="d-block" href="">Фонд целевого капитала</a>
            <a class="d-block" href="">Противодействие коррупции</a>
            <a class="d-block" href="">Сведения о доходах, расходах, об имуществе и обязательствах имущественного характера</a>
            <a class="d-block" href="">Сведения об образовательной организации</a>
            <a class="d-block" href="">Людям с ограниченными возможностями здоровья</a>
            <a class="d-block" href="">Единая платежная страница</a>
        </div>
        <div class="col-2 me-4">
            <a class="d-block text-dark" href=""><h3>ОБРАЗОВАНИЕ</h3></a>
            <a class="d-block" href="">Лицей</a>
            <a class="d-block" href="">Довузовская подготовка</a>
            <a class="d-block" href="">Олимпиады</a>
            <a class="d-block" href="">Прием в бакалавриат</a>
            <a class="d-block" href="">Вышка+</a>
            <a class="d-block" href="">Прием в магистратуру</a>
            <a class="d-block" href="">Аспирантура</a>
            <a class="d-block" href="">Дополнительное образование</a>
            <a class="d-block" href="">Центр развития карьеры</a>
            <a class="d-block" href="">Бизнес-инкубатор ВШЭ</a>
        </div>
        <div class="col-2 me-4">
            <a class="d-block text-dark" href=""><h3>НАУКА</h3></a>
            <a class="d-block" href="">Научные подразделения</a>
            <a class="d-block" href="">Исследовательские проекты</a>
            <a class="d-block" href="">Мониторинги</a>
            <a class="d-block" href="">Диссертационные советы</a>
            <a class="d-block" href="">Защиты диссертаций</a>
            <a class="d-block" href="">Академическое развитие</a>
            <a class="d-block" href="">Конкурсы и гранты</a>
            <a class="d-block" href="">Научно-образовательный портал IQ.hse.ru</a>
            <a class="d-block" href="">XXIII Ясинская (Апрельская) международная научная конференция</a>
        </div>
        <div class="col-2 me-4">
            <a class="d-block text-dark" href=""><h3>РЕСУРСЫ</h3></a>
            <a class="d-block" href="">Библиотека</a>
            <a class="d-block" href="">Издательский дом ВШЭ</a>
            <a class="d-block" href="">Книжный магазин «БукВышка»</a>
            <a class="d-block" href="">Типография</a>
            <a class="d-block" href="">Медиацентр</a>
            <a class="d-block" href="">Журналы ВШЭ</a>
            <a class="d-block" href="">Публикации</a>
            <a class="d-block" href="">Единый архив экономических и социологических данных</a>
        </div>
        <div class="col-2 me-4">
            <h3 class="d-block text-dark">ПОЛЕЗНЫЕ ССЫЛКИ</h3>
            <a class="d-block" href="">Министерство науки и высшего образования РФ</a>
            <a class="d-block" href="">Министерство просвещения РФ</a>
            <a class="d-block" href="">Федеральный портал «Российское образование»</a>
            <a class="d-block" href="">Массовые открытые онлайн-курсы</a>
            <a class="d-block" href="">Study In Russia</a>
        </div>
    </div>

    <!-- Подпись -->
    <p class="ms-100 mt-100">НИУ ВШЭ 1993–2022 <a href="">Адреса и контакты</a> <a href="">Условия использования материалов</a> <a
                href="">Политика конфиденциальности</a> <a href="">Карта сайта</a></p>

</div>




</body>
</html>
