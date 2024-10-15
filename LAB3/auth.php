<?php
    require_once './database/connect.php';
    // Проверяем, правильный ли пароль введён
    $errors = array();
    $showPage = true;
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $stmtUser = pdo()->prepare("SELECT * FROM users WHERE email = :email");
        $stmtUser->execute(['email' => $_POST['email']]);
        if (!$stmtUser->rowCount()) {
            $errors[] = "Пользователь с такими данными не зарегистрирован";
            $showPage = false;
        }
        // Получаем текущее количество попыток входа и время блокировки для пользователя
        $stmtAttempts = pdo()->prepare("SELECT attempts, block_time FROM visits WHERE email = :email");
        $stmtAttempts->execute(['email' => $_POST['email']]);
        $row = $stmtAttempts->fetch(PDO::FETCH_ASSOC);
        if ($showPage) {
            if (!$row) {
                // Если записи о попытках входа для данного пользователя нет, создаём запись
                $stmtAttempts = pdo()->prepare("INSERT INTO visits (email, timestamp, attempts, block_time) VALUES (:email, :timestamp, 1, 0)");
                $stmtAttempts->execute(['email' => $_POST['email'], 'timestamp' => time()]);
            } else {
                // Если запись существует, проверяем заблокированность пользователя
                $attempts = $row['attempts'];
                $blockTime = $row['block_time'];

                if ($blockTime > 0) {
                    // Проверяем, прошел ли час
                    if (time() - $blockTime >= 3600) {
                        $attempts = 0;
                        $blockTime = 0;
                    } else {
                        $remainingTime = 3600 - (time() - $blockTime);
                        $errors[] = "Слишком много неудачных попыток входа. Возможность входа заблокирована на $remainingTime секунд.";
                        $showPage = false;
                    }
                } else {
                    // Пользователь не заблокирован, увеличиваем количество попыток и обновляем timestamp
                    $attempts++;
                
                    if ($attempts > 3) {
                        $blockTime = time();
                        $stmtAttempts = pdo()->prepare("UPDATE visits SET timestamp = :timestamp, attempts = :attempts, block_time = :block_time WHERE email = :email");
                        $stmtAttempts->execute(['email' => $_POST['email'], 'timestamp' => time(), 'attempts' => $attempts, 'block_time' => $blockTime]);
                        $errors[] = "Слишком много неудачных попыток входа. Возможность входа заблокирована на 1 час.";
                    }
                    if ($showPage) {
                        $stmtAttempts = pdo()->prepare("UPDATE visits SET timestamp = :timestamp, attempts = :attempts, block_time = :block_time WHERE email = :email");
                        $stmtAttempts->execute(['email' => $_POST['email'], 'timestamp' => time(), 'attempts' => $attempts, 'block_time' => $blockTime]);
                    }
                }
            }
        }
        if ($showPage) {
            $user = $stmtUser->fetch(PDO::FETCH_ASSOC);
            if (password_verify($_POST['password'], $user['password'])) {
                // Если вход успешен, сбрасываем количество попыток и время блокировки
                $stmtAttempts = pdo()->prepare("UPDATE visits SET attempts = 0, block_time = 0 WHERE email = :email");
                $stmtAttempts->execute(['email' => $_POST['email']]);
                $_SESSION['user_id'] = $user;
                header('Location: ./main.php');
                die;
            } else {
                $errors[] = "Пароль неверен"; 
            }
        } 
    }
?>