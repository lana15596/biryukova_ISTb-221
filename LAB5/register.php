<?php
session_start();
$success = false;
$errors = array();
$email = ""; // Переменная для хранения email
$password = ""; // Переменная для хранения пароля
require_once './signup.php';
require_once './database/connect.php';
// Обработка данных регистрации
if (check_auth()) {
    header('Location: ./main.php');
    die;
}
?>
<!doctype html>
<html lang="ru">
<head>
<meta charset="UTF-8">
<title>Стоимость проектных услуг в Волгограде</title>
<link rel="shortcut icon" href=".\images\лого.jpg" type="image/x-icon">
<link href="css\bootstrap.min.css" rel="stylesheet">

<link href="style.css" rel="stylesheet">
</head>
<body>


<div class="header">

    <!-- Верхняя панель -->
    <div class="container-fluid">
 <nav class="navbar-white">
	<div class="row">
	  <div class="col-3 ">
		<a class="navbar-brand" href="#">
		<img src=".\images\5.jpg" alt="Bootstrap" width="280" height="60"></a>	
	  </div>
	     <div class="col-1">
		<a class="nav-link"  aria-current="page" href="#">ПОРТФОЛИО</a>
	     </div>

	<div class="col-1">
		 <a class="nav-link dropdown-toggle cmtl" href="#" class="link-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="margin-left:3px">УСЛУГИ</a>
          		<ul class="dropdown-menu">
            		<li><a class="dropdown-item" href="#">Проектирование домов</a></li>
            		<li><a class="dropdown-item" href="#">Дизайн интерьера</a></li>
            		<li><a class="dropdown-item" href="#">Ландшафтный дизайн</a></li>
	    		<li><a class="dropdown-item" href="#">Другое</a></li>
          		</ul>
	</div>

	<div class="col-1">
  		<a class="nav-link dropdown-toggle cmtl" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">О НАС</a>
          		<ul class="dropdown-menu">
            		<li><a class="dropdown-item" href="#">О нас</a></li>
            		<li><a class="dropdown-item" href="#">Отзывы</a></li>
            		<li><a class="dropdown-item" href="#">Цены</a></li>
	    		<li><a class="dropdown-item" href="#">Контакты</a></li>
          		</ul>

	</div>

			<div class="col-2 col-auto text-center my-2">
      <a href="#" class="custom-link">+7 (495) 980-7771</a>
				<span>Москва</span>
					<br>
				<a href="#" class="custom-link">+7 (8442) 999-060</a>
				<span>Волгоград</span>
			</div>

			<div class="col-1 col-auto text-center my-3">
	
				<a class="navbar-brand" href="#">
		      		<img src=".\images\6.png" alt="Bootstrap" width="32" height="32"></a>	
			
				<a class="navbar-brand" href="#">
		      		<img src=".\images\7.png" alt="Bootstrap" width="32" height="32"></a>
			</div>
      
				<div class="col-2">
     <button class="btn btn-outline-secondary rounded-pill col-auto text-center my-3 " type="button" style="font-size: 15px; ">УЗНАТЬ СТОИМОСТЬ</button>
     </div>
     <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="main.php">Главная</a></li>
    <li class="breadcrumb-item active" aria-current="page">Регистрация</li>
  </ol>
</nav>
      </nav>       
<body>
     <div class="section"> 
    <form action="register.php" method="POST" enctype="multipart/form-data"> 
        <div class="row ms-0 me-0  my-5 justify-content-center"> 
            <div class="col-3 m-auto align-items-center my-5"> 
                <h3 class="mt-4 text-center">Регистрация</h3> 
                <?php if ($success): ?>
                    <div class="alert alert-success" role="alert">Вы успешно зарегистрированы!</div>
                <?php endif; ?> 
                
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li><?php echo htmlspecialchars($error); ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
    
                <div class="form-group my-3"> 
                    <label for="full_name">ФИО</label> 
                    <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Иванов Иван Иванович" value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>" required>
                </div>
                
                <div class="form-group my-3"> 
                    <label for="birthday">Дата рождения</label>
                    <input type="date" name="birthday" id="birthday" class="form-control" max="2023-01-01" value="<?php echo htmlspecialchars($_POST['birthday'] ?? '2000-01-01'); ?>" required>
                </div>
                
                <div class="form-group my-3"> 
                    <label for="email">Email (Логин)</label> 
                    <input type="email" name="email" id="email" class="form-control" placeholder="example@example.com" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                </div>
                <div class="form-group my-3">
                    <label for="address">Адрес</label>
                    <input type="text" name="address" id="address" class="form-control" placeholder="г. Волгоград, ул. Фиолетова, д. 42" value="<?php if (array_key_exists ('address', $_POST)) print $_POST['address'];?>">
                </div> <!-- address -->
                <div class="form-group my-3"> 
                    <label for="gender">Пол</label> 
                    <select name="gender" id="gender" class="form-control" required> 
                        <option value="" disabled>Пол</option> 
                        <option value="man" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'man') echo 'selected'; ?>>Мужской</option> 
                        <option value="woman" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'woman') echo 'selected'; ?>>Женский</option> 
                        <option value="other" <?php if (isset($_POST['gender']) && $_POST['gender'] === 'other') echo 'selected'; ?>>Секретный</option> 
                    </select> 
                </div>

                <div class="form-group my-3"> 
                    <label for="interests">Интересы</label> 
                    <input type="text" name="interests" id="interests" class="form-control" placeholder="Arduino" value="<?php echo htmlspecialchars($_POST['interests'] ?? ''); ?>">
                </div>

                <div class="form-group my-3"> 
                    <label for="vk">Ссылка на профиль Вконтакте</label> 
                    <input type="url" name="vk" id="vk" class="form-control" placeholder="https://vk.com/idx" value="<?php echo htmlspecialchars($_POST['vk'] ?? ''); ?>">
                </div>

                <div class="form-group my-3"> 
                    <label for="blood_type">Группа крови</label> 
                    <select name="blood_type" id="blood_type" class="form-control">
                        <option value="" disabled>Группа крови</option> 
                        <option value="1" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] === '1') echo 'selected'; ?>>0 (I)</option> 
                        <option value="2" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] === '2') echo 'selected'; ?>>A (II)</option> 
                        <option value="3" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] === '3') echo 'selected'; ?>>B (III)</option> 
                        <option value="4" <?php if (isset($_POST['blood_type']) && $_POST['blood_type'] === '4') echo 'selected'; ?>>AB (IV)</option> 
                    </select> 
                </div>
                <div class="form-group my-3">
                <label for="factor">Резус-фактор</label>
                    <select name="factor" id="factor" class="form-control">
                        <option value="" disabled >Резус-Фактор</option>
                        <option value="plus" <?php if (array_key_exists ('factor', $_POST) and ($_POST['factor'] == 'plus')) { ?>selected="true" <?php }; ?>>Положительный (+)</option>
                        <option value="minus" <?php if (array_key_exists ('factor', $_POST) and ($_POST['factor'] == 'minus')) { ?>selected="true" <?php }; ?>>Отрицательный (-)</option>
                    </select>
                    </div>
                    <div class="form-group my-3">
                    <label for="password">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control"
                           placeholder="Совершенно секретно">
                </div> <!-- password -->
                <div class="form-group my-3">
                    <label for="password_confirm">Подтвердите пароль</label>
                    <input type="password" name="password_confirm" id="password_confirm" class="form-control"
                           placeholder="Совершенно секретно">
                </div> <!-- password_confirm -->
                <!-- Добавить отправку формы -->
                <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                <div class="form-group">
                    <p class="text-center">Уже есть аккаунт? <a href="login.php">Войти в аккаунт</a></p>
                </div>
            </div>
        </div>
    </form>
</div>
</body>


