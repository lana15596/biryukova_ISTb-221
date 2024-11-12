<?php
require_once './database/connect.php';

if (isset($_POST['importButt'])) {
    if (isset($_FILES['importFile'])) {
        // Устанавливаем путь к файлу
        $target_dir = "./upload/";
        $file = $target_dir . basename($_FILES['importFile']['name']);
        
        // Проверяем расширение файла
        $valid_extension = "xml";
        $extension = pathinfo($file, PATHINFO_EXTENSION);
        if ($extension && strtolower($extension) === $valid_extension) {
            // Перемещаем файл в целевую директорию
            if (move_uploaded_file($_FILES["importFile"]["tmp_name"], $file)) {
                echo "Файл успешно загружен!<br><br>";
            } else {
                echo "Ошибка загрузки файла!<br><br>";
                exit;
            }
        } else {
            echo "Неподдерживаемый формат файла! Файл должен быть XML.<br><br>";
            exit;
        }
    }

    $file_path = $file;
    
    // Загружаем и парсим XML файл
    $xml = simplexml_load_file($file_path);
    if ($xml === false) {
        echo "Неверная структура файла или он не является XML файлом.";
        exit;
    }
    
    $updatedCount = 0;
    $insertedCount = 0;

    // Чтение данных из XML
    foreach ($xml->sotr as $record) {
    // Извлекаем данные из XML
    $guid = (string) $record->guid;
    $ImgPath = (string) $record->photo;
    $FIO = (string) $record->FIO;
    $dolgid = (string) $record->dolgid;
    $haracter = (string) $record->haracter;
    $year = (string) $record->year;

    // Проверка наличия обязательных полей
    if (empty($guid) || empty($ImgPath) || empty($FIO) || empty($dolgid) || empty($haracter) || empty($year)) {
        echo "Ошибка: обязательные поля д/б заполнены в записи " . htmlspecialchars($guid) . "<br>";
        die();
    }

    // Проверка существования записи в таблице
    $existingRecord = pdo()->prepare("SELECT * FROM `sotr` WHERE `guid` = :guid");
    $existingRecord->bindParam(':guid', $guid);
    $existingRecord->execute();
    $rowCount = $existingRecord->rowCount();

    if ($rowCount > 0) {
        $existingValues = $existingRecord->fetch(PDO::FETCH_ASSOC);

        // Проверка на изменение значений
        $valuesChanged = false;
        if ((string)$ImgPath !== (string)$existingValues['photo'] || 
            (string)$FIO !== (string)$existingValues['FIO'] || 
            (string)$dolgid !== (string)$existingValues['dolgid'] || 
            (string)$haracter !== (string)$existingValues['haracter'] || 
            (string)$year !== (string)$existingValues['year']) {
            $valuesChanged = true;
        }

        // Обновляем запись, если значения изменились
        if ($valuesChanged) {
            $updateQuery = pdo()->prepare("UPDATE `sotr` SET `photo` = :photo, `FIO` = :FIO, `dolgid` = :dolgid, `haracter` = :haracter, `year` = :year WHERE `guid` = :guid");
            $updateQuery->bindParam(':photo', $ImgPath);
            $updateQuery->bindParam(':FIO', $FIO);
            $updateQuery->bindParam(':dolgid', $dolgid);
            $updateQuery->bindParam(':haracter', $haracter);
            $updateQuery->bindParam(':year', $year);
            $updateQuery->bindParam(':guid', $guid);
            $updateQuery->execute();
            $updatedCount++;
        }
    } else {
        // Вставляем новую запись
        $insertQuery = pdo()->prepare("INSERT INTO `sotr` (`photo`, `FIO`, `dolgid`, `haracter`, `year`, `guid`) VALUES (:photo, :FIO, :dolgid, :haracter, :year, :guid)");
        $insertQuery->bindParam(':photo', $ImgPath);
        $insertQuery->bindParam(':FIO', $FIO);
        $insertQuery->bindParam(':dolgid', $dolgid);
        $insertQuery->bindParam(':haracter', $haracter);
        $insertQuery->bindParam(':year', $year);
        $insertQuery->bindParam(':guid', $guid);
        $insertQuery->execute();
        $insertedCount++;
    }
}

    // Вывод информации о результате
    echo "Файл с данными получен из " . htmlspecialchars($file_path) . " и обработан.<br> Обновлена таблица sotr.<br> Записей добавлено: " . $insertedCount . "<br>Записей обновлено: " . $updatedCount;
}
?>
