<?php
require_once './database/connect.php';
if (isset($_POST['exportButt'])) {
    $result = pdo()->prepare("SELECT * FROM `sotr`");
    $result->execute();
    
    // Создаем новый объект DOM для XML
    $xml = new DOMDocument('1.0', 'UTF-8');
    $xml->formatOutput = true;

    // Создаем корневой элемент
    $root = $xml->createElement('sotr');
    $xml->appendChild($root);

    // Добавляем данные в XML
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $record = $xml->createElement('sotr');

        foreach ($row as $key => $value) {
            $element = $xml->createElement($key, htmlspecialchars($value));
            $record->appendChild($element);
        }

        $root->appendChild($record);
    }

    // Сохраняем XML в файл
    $file_name = "sotr_exported.xml";
    $xml->save($file_name);

    // HTTP POST запрос к worker.php
    $url = 'http://localhost/LAB5/worker.php';
    $post_data = array('file' => new CURLFile($file_name, 'text/xml', $file_name));
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);
    
    echo $response;

    // Удаляем временный файл XML
    unlink($file_name);
}
?>
