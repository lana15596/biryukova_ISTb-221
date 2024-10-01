<?php    
$serverName = "localhost";    
$userName = "root";    
$password = "";    
$nameDB = "sotrudniki";    

try {    
    $conn = new mysqli('localhost', 'root', '', 'sotrudniki');    
} catch (mysqli_sql_exception $exception) {    
    die("Err connect! " . $exception->getMessage());    
}    

$name = isset($_GET['name']) ? htmlspecialchars($_GET['name'], ENT_QUOTES, 'UTF-8') : '';    
$short_descr = isset($_GET['short_descr']) ? htmlspecialchars($_GET['short_descr'], ENT_QUOTES, 'UTF-8') : '';    
$year = isset($_GET['year']) ? htmlspecialchars($_GET['year'], ENT_QUOTES, 'UTF-8') : '';    
$rab = isset($_GET['rab']) ? htmlspecialchars($_GET['rab'], ENT_QUOTES, 'UTF-8') : '';   
$gov = isset($_GET['gov']) ? htmlspecialchars($_GET['gov'], ENT_QUOTES, 'UTF-8') : '';   

$sql = "SELECT sotr.dolgid AS ID, dolg.id AS prof_id , photo, FIO, haracter, year 
        FROM sotr INNER JOIN dolg ON sotr.dolgid = dolg.id WHERE 1";    
$sql_types = "SELECT id, name FROM dolg";    

// Добавляем условия к SQL запросу, если переменные не пустые
$types = ""; // для указания типов параметров
$values = []; // массив значений параметров

if (!empty($rab)) {   
    $sql .= " AND sotr.dolgid = ?";   
    $types .= "i"; // integer
    $values[] = $rab;   
}  
if (!empty($name)) {    
    $sql .= " AND FIO LIKE ?";    
    $types .= "s"; // string
    $values[] = "%$name%";   
}  
if (!empty($short_descr)) {    
    $sql .= " AND haracter LIKE ?";    
    $types .= "s";    
    $values[] = "%$short_descr%";   
}  
if (!empty($year)) {    
    $sql .= " AND year = ?";    
    $types .= "i";    
    $values[] = $year;   
}  
if (!empty($gov)) {   
    $sql .= " AND dolg.name LIKE ?";   
    $types .= "s";    
    $values[] = "%$gov%";   
}  

try {    
    $stmt_sql = $conn->prepare($sql);    
    $stmt_sql_types = $conn->prepare($sql_types);    

    if (isset($_GET['clear']) && $_GET['clear'] === '1') {    
        header("Location: main.php");    
    }    

    // Привязываем параметры
    if ($types) {  
        $stmt_sql->bind_param($types, ...$values);  
    }

    $stmt_sql->execute();    
    $result = $stmt_sql->get_result();    
    $arr = $result->fetch_all(MYSQLI_ASSOC);    

    $stmt_sql_types->execute();    
    $result_types = $stmt_sql_types->get_result();    
    $arr_types = $result_types->fetch_all(MYSQLI_ASSOC);    

    $stmt_sql->close();    
    $stmt_sql_types->close();    
} catch (mysqli_sql_exception $exception) {    
    die("Err request execution! " . $exception->getMessage());    
}    
?>