<?php
    session_start();
    function pdo(): PDO
    {
        static $pdo;
        if (!$pdo)
        {
            $config = require_once './database/db_config.php';
            $dsn = 'mysql:dbname='.$config['database'].';host='.$config['servername'];
            $pdo = new PDO($dsn, $config['username'], $config['password']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $pdo;
    }
    function check_auth(): bool
    {
    	return !!($_SESSION['user_id'] ?? false);
    }
    if (check_auth()) {
        $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `user_id` = :user_id");
        $stmt->execute(['user_id' => $_SESSION['user_id']]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>