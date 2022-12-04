<?php


if (isset($_POST['txtName'])) {
	//подключение к бд
	$con = mysqli_connect('localhost', 'root', '', 'db_contact');

	//поиск максимальной существующей страницы
	$sqlMax = "SELECT MAX(pn) FROM tbl_contact";
	$Max = mysqli_query($con, $sqlMax);
	while ($resultMax = mysqli_fetch_array($Max)) {
		$pn = $resultMax['MAX(pn)'];
		if ($pn < 1) {
			$pn = 1;
		}
	}


	//поиск количества страниц
	$sqlc = "SELECT COUNT(pn) FROM tbl_contact WHERE pn = $pn";
	echo $sqlc;
	$pnc = mysqli_query($con, $sqlc);
	while ($resultpn = mysqli_fetch_array($pnc)) {
		$pnS = $resultpn['COUNT(pn)'];
		echo $pnS;

		if ($pnS >= 4) {
			$pn = $pn + 1;
		}
	}

	$txtName = $_POST['txtName'];
	$txtEmail = $_POST['txtEmail'];
	$txtPhone = $_POST['txtPhone'];
	$txtMessage = $_POST['txtMessage'];

	// SQL запрос
	$sql = "INSERT INTO `tbl_contact` (`Id`,`pn`,`fldName`, `fldEmail`, `fldPhone`, `fldMessage`) VALUES ('0', 	'$pn', '$txtName', '$txtEmail', '$txtPhone', '$txtMessage')";

	// insert in database 
	$rs = mysqli_query($con, $sql);
	if ($rs) {
?>
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
			<title>Contact Form - PHP/MySQL Demo Code</title>
			<!-- Latest compiled and minified CSS -->
			<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
		</head>

		<body class="bg-light">

			<div class="container">
				<div class="py-5 text-center">
					<img class="d-block mx-auto mb-4" src="https://www.raghwendra.com/blog/wp-content/uploads/2018/09/logo-rwsn.png" alt="" width="240" height="64">
					<h2>Contact us form</h2>
					<p class="lead">Сообщение успешно отправлено</p>
				</div>
				<fieldset style="display:flex; justify-content:center; ">
					<a class=" btn btn-primary btn-lg btn-block" href='/contact.html'>Назад</a>


				</fieldset>
			</div>
		</body>
	<?php
	}
} else {
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Contact Form - PHP/MySQL Demo Code</title>
		<!-- Latest compiled and minified CSS -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	</head>

	<body class="bg-light">

		<div class="container">
			<div class="py-5 text-center">
				<img class="d-block mx-auto mb-4" src="https://www.raghwendra.com/blog/wp-content/uploads/2018/09/logo-rwsn.png" alt="" width="240" height="64">
				<h2>Contact us form</h2>
				<p class="lead">Ошибка</p>
			</div>
			<fieldset style="display:flex; justify-content:center; ">
				<a class=" btn btn-primary btn-lg btn-block" href='/contact.html'>Назад</a>


			</fieldset>
		</div>
	</body>
<?php
}
?>