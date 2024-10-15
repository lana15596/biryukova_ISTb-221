<?php
	require_once './database/connect.php';
	require_once './auth.php';
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
    <li class="breadcrumb-item active" aria-current="page">Вход</li>
  </ol>
</nav>
     </nav>  
    
     

<body>
<div class="section">
    <form action="login.php" method="POST">
        <div class="row my-5">
            <div class="col-3 m-auto my-5">
                <p class=" text-center fw-bold my-5">Войти</p>
				<?php
                    if (!empty($errors)) {
                        echo '<div class="alert alert-danger">';
                        echo '<ul>';
                        foreach ($errors as $error) {
                            echo '<li>' . $error . '</li>';
                        }
                        echo '</ul>';
                        echo '</div>';
                    }
                ?>
                <div class="row mt-3">
                    <p class="col-3 m-auto">Login:</p>
                    <input type="text" name="email" class="w-75 col-6">
                </div>
                <div class="row mt-3">
                    <p class="col-3 m-auto">Password:</p>
                    <input type="password" name="password" class="w-75 col-6">
                </div>
                <button type="submit" name="Login" class="btn btn-primary mt-3 w-100 ms-1">Войти</button>
                <p class="mt-4 text-center">Ещё не зарегистрированы? <a href="register.php" class="">Зарегистрироваться!</a></p>
                
            </div>
        </div>
    </form>
</div>
</body>

