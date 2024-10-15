<?php 
	session_start(); 
    require_once './database/connect.php';
    require_once './auth.php';
	require_once './logic.php';
	// Проверка доступа
if (isset($_SESSION['user_id'])) {
    $user = $_SESSION['user_id']; // Получаем данные пользователя из сессии
}
else{
	header('Location: ./login.php');
}
?>

<!DOCTYPE html>
<html lang="ru" >
<script src="js\bootstrap.bundle.min.js"></script>

<head>
<meta charset="UTF-8">
<title>Стоимость проектных услуг в Волгограде</title>
<link rel="shortcut icon" href=".\images\лого.jpg" type="image/x-icon">
<link href="css\bootstrap.min.css" rel="stylesheet">

<link href="style.css" rel="stylesheet">
</head>


<body class="all">
<header class="header border-bottom">

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
		 <a class="nav-link dropdown-toggle cmtl" href="#" class="link-dark" role="button" data-bs-toggle="dropdown" aria-expanded="false" ">УСЛУГИ</a>
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
     <?php
        if (check_auth()) {
            echo '<div>
				<form class="d-flex" method="POST" action="logout.php">
					<p class="mr-20">'.htmlspecialchars($user["email"]).'!&nbsp;</p>
					<a href="logout.php" class="text-dark">Выйти</a>
				</form>
			</div>';
        } else {
            echo '
                <div class="col-1">
                    <p class="text-dark mt-2">
                    <a href="login.php?ts=<?php echo time(); ?>" class="text-dark">Войти</a> или
                    <a href="register.php" class="text-dark">зарегистрироваться</a></p>
                </div>';
				
        }
?>

				</div>
			

	</div>
</div>           
    </div>
  </div>
</nav>
</header>

<h1>
  <div class="container-fluid d-flex width-100">
      <div class="row">
          <div class="col-1">
            </div>
            <div class="col-5">
              <p style="font-size: 95px; font-weight: 600; line-height: 1.23; margin-left:75px" align="left" class="fw-bold my-2">Стоимость<br>
                <span>услуг</span>
              </p>
            <div>
              <button class="btn btn-outline-secondary rounded-pill col-auto text-center my-3 p-3" 
              type="button" style="font-size: 13px; margin-left: 75px;">РАССЧИТАТЬ СТОИМОСТЬ</button> </div>
            </div>
            

          <div class="col-6">
            <img src=".\images\17.png" class="rounded float-end" alt="Bootstrap" width="960" height="415"></a>
          </div>
         
        
      </div>
  </div>

</h1>
 
<main>
<div class="container">
  <div class="d-flex justify-content-center my-5">
    <div class="btn-group" style="color: #474747" role="group">
      <button class="btn btn-outline-secondary active rounded-start btn-lg btn-custom" aria-current="page">Проектирование домов</button>
      <button class="btn btn-outline-secondary btn-lg">Дизайн интерьера</button>
      <button class="btn btn-outline-secondary btn-lg">Ландшафтный дизайн</button>
      <button class="btn btn-outline-secondary rounded-end btn-lg">Другой</button>
    </div>
  </div>
</div>
	 <div>
        <div class="container text-center my-5">
            <form action="secret.php" method="GET">
                <label> Фильтрация результата поиска </label>
                <div class="mb-3">
                    <label> По ФИО </label>
                    <input type="text" name="name" placeholder="ФИО"
                           value="<?php echo isset($_GET['name']) ? htmlspecialchars($_GET['name']) : ''; ?>" class="form-control">
                </div>

                <div class="mb-3">
                    <label> По должности </label>
                    <select name="rab" class="form-select">
                        <option value=""> Выберите должность </option>
                        <?php foreach($arr_types as $type): ?>
                            <option value="<?php echo htmlspecialchars($type['id'])?>" <?php if(isset($_GET['dolgid']) && $_GET['dolgid'] == $type['id']) echo 'selected';?>><?php echo isset($type['name']) ? htmlspecialchars($type['name']) : ''; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label> По характеристике </label>
                    <textarea class="form-control" placeholder="Введите описание " name="short_descr"><?php echo isset($_GET['short_descr']) ? htmlspecialchars($_GET['short_descr']) : '';?></textarea>
                </div>

                <div class="mb-3">
                    <label> По году рождения </label>
                    <input type="text" name="year" placeholder="Введите год "
                           value="<?php echo isset($_GET['year']) ? htmlspecialchars($_GET['year']) : ""; ?>" class="form-control">
                </div>
                <input type="submit" value="Применить фильтры" class="btn btn-primary">
                <a href="secret.php?clear=1" class="btn btn-danger"> Очистить фильтры </a>
            </form>
        </div>
    </div>
    <div class="container text-center mt-3">
        <table class="table">
            <thead>
            <tr>
                <th scope="col"> Фото </th>
                <th scope="col"> ФИО </th>
                <th scope="col"> Должность </th>
                <th scope="col"> Характеристика </th>
                <th scope="col"> Год рождения </th>
            </tr>
            </thead>
            <tbody>
            <?php foreach($arr as $row): ?>
                <tr>
                    <th scope="row"> <?php
                    if (!empty($row['photo'])) {
                        $imgData = base64_encode($row['photo']); // Преобразование в base64
                        echo '<img src="data:image/jpg;base64,' . $imgData . '"  style="width:100px;">';
                    } else {
                        echo 'Нет изображения';
                    }
                    ?> </th>
                    <td> <?php echo $row['FIO'] ?> </td>
                    <td> <?php echo $row['prof_id']?> </td>
                    <td> <?php echo $row['haracter'] ?> </td>
                    <td> <?php echo $row['year']?> </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>


<div class="container">
<p class="centername" >Проектирование домов</p
</div>

<div class="container my-1">
<p class="text-center" style="font-size: 20px">Условия работы и актуальные цены уточняйте по <br> телефону</p>
</div>


<table class="table table-borderless ">
<tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Архитектурный проект дома</td>
      <td class="biga">₽/м² 800</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Основное проектное решение, направленное на разработку внешнего вида и объемно-планировочных решений.</td>
      <td></td>
    </tr>

<tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Конструктивный проект дома</td>
      <td class="biga">₽/м² 1600</td>
    </tr>
<tr>
      <th scope="row"></th>
      <td>Разделы АР и КР. Расчёт фундамента, строительные узлы и тп.</td>
      <td></td>
    </tr>

<tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Инженерный проект дома</td>
      <td class="biga">₽/м² 800</td>
    </tr>
<tr>
      <th scope="row"></th>
      <td>Разделы ЭО, ВК и ОВ. Электроосвещение, водоснабжение и канализация, отопление и вентиляция</td>
      <td></td>
    </tr>


<tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">План дома</td>
      <td class="biga">₽/м² 195</td>
    </tr>
<tr>
      <th scope="row"></th>
      <td>Разработка планировочных решений Вашего дома.</td>
      <td></td>
    </tr>

<tr class="border-bottom">
      <th scope="row" ></th>
      <td class="big">Визуализация дома</td>
      <td class="biga">₽/м² 26000</td>
    </tr>
<tr>
      <th scope="row"></th>
      <td>По вашему плану или проектному решению.</td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr> 
</table>

<div class="d-grid gap-2 col-2 mx-auto"> 
  
<button class="btn btn-outline-secondary rounded-pill col-auto text-center my-3 " type="button" style="font-size: 15px; ">ПОДРОБНЕЙ ОБУСЛУГЕ</button>
</div>


<div class="container">
<p class="centername">Дизайн фасадов</p
</div>

<table class="table table-borderless">
<tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    
    <tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Дизайн фасадов</td>
      <td class="biga">₽/м² 410</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>Разработка проекта дизайна фасадов дома или здания</td>
      <td></td>
    </tr>

<tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Авторский надзор</td>
      <td class="biga">₽/м²*месяц 410</td>
    </tr>
<tr>
      <th scope="row"></th>
      <td>Еженедельный контроль строительных работ на соблюдение проектных решений.</td>
      <td></td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
</table>

<div class="d-grid gap-2 col-2 mx-auto"> 
  
<button class="btn btn-outline-secondary rounded-pill col-auto text-center my-3 " type="button" style="font-size: 15px; ">ПОДРОБНЕЙ ОБУСЛУГЕ</button>
</div>

<div class="container">
<p class="centername">Доп.услуга</p
</div>

<table class="table table-borderless">
<tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
    
    <tr class="border-bottom">
      <th scope="row"></th>
      <td class="big">Срочность</td>
      <td class="biga">+30%к стоимости</td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td>За дополнительную плату проект будет приоритетным для архитектора или дизайнера и будет выполнен в более сжатый срок
      </td>
      <td></td>
    </tr>


      <td colspan="3">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="3">&nbsp;</td>
    </tr>
</table>

<div class="d-grid gap-2 col-2 mx-auto"> 
  
<button class="btn btn-outline-secondary rounded-pill col-auto text-center my-3 " type="button" style="font-size: 15px; ">ПОДРОБНЕЙ ОБУСЛУГЕ</button>
</div>
</main>
</body>
</html>