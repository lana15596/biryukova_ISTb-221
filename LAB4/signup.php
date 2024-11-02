<?php
require_once './database/connect.php';
$errors = array();
$Email = isset($_POST['email']) ? trim($_POST['email']) : ''; // Удаление пробелов в начале и конце
$Pass = isset($_POST['password']) ? trim($_POST['password']) : '';
$Pass_confirm = isset($_POST['password_confirm']) ? trim($_POST['password_confirm']) : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Проверка на наличие email
    if (empty($Email)) {
        $errors[] = 'Поле email обязательно для заполнения';
    } else {
        // Проверка правильности формата email
        if (!filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'E-mail указан неверно';
        } else {
            // Проверка на наличие уже существующего email в базе данных
            $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `email` = :email");
            $stmt->execute(['email' => $Email]);
            if ($stmt->rowCount() != 0) {
                $errors[] = 'Это имя пользователя уже занято';
            }
        }
    }

    // Проверка на наличие пароля
    if (empty($Pass)) {
        $errors[] = 'Поле пароля обязательно для заполнения';
    } else {
        if (strlen($Pass) < 6) {
            $errors[] = 'Пароль слишком короткий';
        } 
        // Проверка наличия больших латинских букв
        if (!preg_match('/[A-Z]/', $Pass)) {
            $errors[] = 'Пароль должен содержать хотя бы одну большую латинскую букву';
        }

        // Проверка наличия маленьких латинских букв
        if (!preg_match('/[a-z]/', $Pass)) {
            $errors[] = 'Пароль должен содержать хотя бы одну маленькую латинскую букву';
        }

        // Проверка наличия спецсимволов
        if (!preg_match('/[!@#$%^&*()_+{}\[\]:;<>,.?~]/', $Pass)) {
            $errors[] = 'Пароль должен содержать хотя бы один спецсимвол';
        }

        // Проверка наличия пробела, дефиса, подчёркивания и цифры
        if (!preg_match('/[0-9]/', $Pass) || !preg_match('/\s/', $Pass) || !preg_match('/-/', $Pass) || !preg_match('/_/', $Pass)) {
            $errors[] = 'Пароль должен содержать хотя бы один символ каждого вида: пробел, дефис, подчёркивание, цифра';
        }

        // Проверка на отсутствие русских букв
        if (preg_match('/[а-яА-Я]/', $Pass)) {
            $errors[] = 'Пароль не должен содержать русские буквы';
        }
    }

    // Проверка на совпадение паролей
    if ($Pass_confirm !== $Pass) {
        $errors[] = 'Введённые пароли не совпадают';
    }

    // Если все проверки прошли успешно
    if (empty($errors)) {
        // Добавляем пользователя в БД
        $stmt = pdo()->prepare("INSERT INTO `users` (`email`, `password`, `full_name`, `birthday`, `address`, `gender`, `interests`, `vk`, `factor`) VALUES (:email, :password, :full_name, :birthday, :address, :gender, :interests, :vk, :factor)");
        $stmt->execute([
            'email' => $Email,
            'password' => password_hash($Pass, PASSWORD_DEFAULT),
            'full_name' => isset($_POST['full_name']) ? $_POST['full_name'] : '',
            'birthday' => isset($_POST['birthday']) ? $_POST['birthday'] : '',
            'address' => isset($_POST['address']) ? $_POST['address'] : '',
            'gender' => isset($_POST['gender']) ? $_POST['gender'] : '',
            'interests' => isset($_POST['interests']) ? $_POST['interests'] : '',
            'vk' => isset($_POST['vk']) ? $_POST['vk'] : '',
            'factor' => isset($_POST['factor']) ? $_POST['factor'] : '',
        ]);
        header('Location: ./login.php');  
        exit; // Завершаем скрипт после перенаправления
    }
}
?>
