<?php

// 3, 6, 11, 16

/*
Тексты для заданий

3 задание
<p>Это обычный текст.</p>
<p>— Привет, как дела?</p>
<p>Еще немного текста.</p>
<p>— Всё отлично, спасибо!</p>
<p>До скорой встречи!</p>

6 задание
Сегодня произошло чудо но не со мной а с другом...

11 задание
<h1>Основные концепции программирования</h1>
<p>Программирование — это процесс создания компьютерных программ, который включает в себя проектирование, написание, тестирование и поддержку кода.</p>

<h2>Парадигмы программирования</h2>
<p>Парадигмы программирования — это разные подходы к написанию программного кода.</p>

<h3>Процедурное программирование</h3>
<p>Процедурное программирование базируется на концепции последовательного выполнения команд, которые объединены в процедуры.</p>

<h3>Объектно-ориентированное программирование (ООП)</h3>
<p>ООП позволяет организовывать программы как набор объектов, взаимодействующих друг с другом.</p>

<h2>Языки программирования</h2>
<p>Существует множество языков программирования, каждый из которых имеет свои особенности и области применения.</p>

<h3>Python</h3>
<p>Python — это высокоуровневый язык программирования, известный своей простотой и читаемостью кода.</p>

<h3>C++</h3>
<p>C++ — это мощный язык программирования, часто используемый для разработки высокопроизводительных приложений.</p>

<h1>Тенденции в разработке ПО</h1>
<p>Сфера разработки программного обеспечения быстро меняется. Новые технологии и подходы влияют на развитие индустрии.</p>

<h2>Искусственный интеллект</h2>
<p>Искусственный интеллект (ИИ) и машинное обучение изменяют многие аспекты разработки ПО, открывая новые возможности для автоматизации задач.</p>

16 задание
Данный текст может содержать запретные слова:<br/>
       Сегодня я поджёг тополиный пух, чтобы повеселиться.<br/>
       Я каждое утро чищу свою ротовую полость и рот целиком.<br/>
       Мне очень хочеться делать, что я хочу!<br/>
       Сегодня мне придется ехать в деревню.<br/>
       Для того, чтобы сделать отверстие можно использовать коловорот.<br/>
       Для того, чтобы провода проводили ток, необходимо зарядить частицы.<br/>
*/

$preset_value = '';
$preset_text = '';
$isExamplesEcho = false;

if(isset($_GET['preset']))
{
    $getValue = $_GET['preset'];
}

if(isset($getValue))
{
    $file_path = './text/' . $getValue . '.txt';
    if (file_exists($file_path)) {
        $preset_text = file_get_contents($file_path);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $isExamplesEcho = true;
    $inputText = $_POST['TextArea1'];
    $exercise3 = processText3($inputText);
    $exercise6 = processText6($inputText);
    $exercise11 = processText11($inputText);
    $exercise16 = processText16($inputText);
}

function processText3($text)
{
    // Массив для хранения абзацев с прямой речью
    $directSpeech = array();

    // Регулярное выражение для поиска абзацев, начинающихся с длинного тире
    $pattern = '/<p>—\s*[^<]*<\/p>/';

    // Находим все совпадения в тексте
    preg_match_all($pattern, $text, $matches);

    // Сохраняем найденные абзацы в массив $directSpeech
    foreach ($matches[0] as $paragraph) {
        $directSpeech[] = $paragraph;
    }

    // Формируем результат в виде строки
    return implode("\n", $directSpeech);
}

// Пример текста с заголовками для тестирования
$text = '
<h1>Анатомия и физиология</h1>
<h2>Строение</h2>
<h1>Развитие</h1>
<h2>Существование их</h2>
<h1>Распространение и экология</h1>
<h2>Место жизни</h2>
';

// Выводим результат
echo processText3($text);



function processText6($text)
{
    $ex6text = $text;
    $pattern1 = '/\b([а]|но)\b/ui';
	$ex6text = preg_replace($pattern1,', $1', $ex6text);
	$pattern2 = '/\.{3}/';
	$ex6text = preg_replace($pattern2,'…', $ex6text);
	return $ex6text;
}

function processText11($text)
{
    // Массив для хранения заголовков
    $headers = array();

    // Регулярное выражение для поиска заголовков 1-3 уровня
    $pattern = '/<h([1-3])>(.*?)<\/h[1-3]>/i';

    // Находим все заголовки и добавляем их в массив $headers
    preg_match_all($pattern, $text, $matches, PREG_SET_ORDER);

    // Обработка каждого заголовка
    foreach ($matches as $index => $match) {
        $level = intval($match[1]);
        $headerText = strip_tags($match[2]); // Удаляем вложенные теги

        // Обрезаем заголовок до 50 символов, если он длиннее
        if (mb_strlen($headerText, 'UTF-8') > 50) {
            $headerText = mb_substr($headerText, 0, 50, 'UTF-8') . '…';
        }

        // Создаем уникальный ID для якоря заголовка
        $anchor = 'header_' . $index;

        // Заменяем оригинальный заголовок в тексте на версию с якорем
        $text = preg_replace(
            '/<h' . $level . '>(.*?)<\/h' . $level . '>/i',
            "<h$level id='$anchor'>$headerText</h$level>",
            $text,
            1
        );

        // Добавляем заголовок в массив для формирования оглавления
        $headers[] = array('level' => $level, 'text' => $headerText, 'anchor' => $anchor);
    }

    // Формируем HTML-код для оглавления
    $toc = '<div class="toc"><ul>';
    $previousLevel = 1;

    foreach ($headers as $header) {
        $level = $header['level'];

        // Определяем вложенность списка в зависимости от уровня заголовка
        if ($level > $previousLevel) {
            $toc .= str_repeat('<ul>', $level - $previousLevel);
        } elseif ($level < $previousLevel) {
            $toc .= str_repeat('</ul>', $previousLevel - $level);
        }

        $toc .= "<li><a href='#{$header['anchor']}'>{$header['text']}</a></li>";
        $previousLevel = $level;
    }

    // Закрываем все открытые списки
    $toc .= str_repeat('</ul>', $previousLevel - 1);
    $toc .= '</ul></div>';

    // Возвращаем оглавление, полный текст статьи и форму для повторной отправки статьи
    return $toc . '<div class="article">' . $text . '</div><div class="resubmit-form">[Форма для повторной отправки]</div>';
}

function processText16($text)
{
    $ex16text = $text;
        $danger = ["пух", "рот", "делать", "ехать", "около", "для"];
        foreach ($danger as $word)
        {
            $pattern = "/\b($word)(\p{L}*)\b/ui";
                // preg_replace_callback - выполняет поиск по регулярному выражению и замену с использованием callback-функции
                // str_repeat - возвращает повторяющееся строку
                // mb_strlen - получает длину строки
            $ex16text = preg_replace_callback($pattern, function ($match) {
                return str_repeat("#", mb_strlen($match[1])) . $match[2];
            }, $ex16text);
        }
        return $ex16text;
}




?>