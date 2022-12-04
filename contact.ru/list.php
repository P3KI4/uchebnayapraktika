<?php
//удаление данных
if (isset($_GET["del_itm_id"]))	//получение ссылки на удаление
{
	$con = mysqli_connect('localhost', 'root', '', 'db_contact');
	$sql = "DELETE FROM tbl_contact WHERE id =" . $_GET["del_itm_id"];
	$rs = mysqli_query($con, $sql);

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
				<p class="lead">Объект удален</p>
			</div>
			<fieldset style="display:flex; flex-direction:column; justify-content:center; ">
				<?php echo
				"<p style='text-align:center'>
					<label style='font-weight:600; text-transform: uppercase; color:green;' for='phone'>Объект под id=" . $_GET["del_itm_id"] . " успешно удален</label>

				</p>"

				?>
				<a class=" btn btn-primary btn-lg btn-block" name="back" id="back" href='/list.php?page=1'>Назад</a>
			</fieldset>
		</div>
	</body>
<?php

} else {
	//страницы
	if (isset($_GET['page'])) {
		$page = $_GET['page'];
	} else {
		$page = 1;
	}

	// заполнение таблиц данными при удалении
	$con = mysqli_connect('localhost', 'root', '', 'db_contact');
	$page = 1; // страница
	$kol = 4; // нужное количество объектов на странице
	$atr = ($page * $kol) - $kol;

	$sql = "SELECT COUNT(*) FROM tbl_contact ";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_row($res);
	$total = $row[0]; // всего записей


	//проверка страницы на количество записей и изменение страницы при удалении
	//проверка нахождения пользователя 
	if (!$_GET['page']) {
		$sql_check = "SELECT COUNT(*) FROM tbl_contact where pn = 1";
		$res_check = mysqli_query($con, $sql_check);
		while ($result = mysqli_fetch_array($res_check)) {
			$c_res = $result['COUNT(*)'];
			//нахождение нужного количества элементов, которые нужно переменстить
			if ($c_res < $kol) {
				$need_kol = $kol - $c_res;
				//добавление недостающих элементов
				for ($i = $need_kol; $i < $kol - 2; $i++) {
					$sql_maxpn = "SELECT MAX(pn) FROM tbl_contact";
					$res_maxpn = mysqli_query($con, $sql_maxpn);
					while ($result = mysqli_fetch_array($res_maxpn)) {
						$max_page = $result['MAX(pn)'];
					}
					//замена объекта с полсденей страницы на страницу удаления
					$sql = "SELECT MIN(id) FROM tbl_contact WHERE pn = $max_page";
					$res = mysqli_query($con, $sql);
					while ($result = mysqli_fetch_array($res)) {
						$id_next = $result["MIN(id)"];
						$sql = "UPDATE tbl_contact SET pn = 1 WHERE id = " . $id_next;
						$next_change = mysqli_query($con, $sql);
					}
				}
			}
		}
	}
	//проверка страницы на количество записей и изменение страницы при удалении
	//проверка нахождения пользователя 
	if ($_GET['page']) {
		$sql_check = "SELECT COUNT(*) FROM tbl_contact where pn = " . $_GET['page'];
		$res_check = mysqli_query($con, $sql_check);
		while ($result = mysqli_fetch_array($res_check)) {
			$c_res = $result['COUNT(*)'];
			if ($c_res < $kol) {
				$need_kol = $kol - $c_res;
				//добавление недостающих элементов
				for ($i = $need_kol; $i < $kol - 2; $i++) {
					$sql_maxpn = "SELECT MAX(pn) FROM tbl_contact";
					$res_maxpn = mysqli_query($con, $sql_maxpn);
					while ($result = mysqli_fetch_array($res_maxpn)) {
						$max_page = $result['MAX(pn)'];
					}
					//замена объекта с полсденей страницы на страницу удаления
					$sql = "SELECT MIN(id) FROM tbl_contact WHERE pn = $max_page";
					$res = mysqli_query($con, $sql);
					echo '<br>' . $i;
					while ($result = mysqli_fetch_array($res)) {
						$id_next = $result["MIN(id)"];
						$sql = "UPDATE tbl_contact SET pn = " . $_GET['page'] . " WHERE id = " . $id_next;
						$next_change = mysqli_query($con, $sql);
					}
				}
			}
		}
	}

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
				<p class="lead">Список отправленных писем</p>
			</div>
			<fieldset style="display:flex; flex-direction:column; justify-content:center; ">
				<table style="vertical-align: middle; text-align:center" class="table">
					<thead>
						<tr>
							<th scope="col">ИМЯ</th>
							<th scope="col">Mail</th>
							<th scope="col">Телефон</th>
							<th scope="col">Сообщение</th>
							<th scope="col">Действие</th>
						</tr>
					</thead>
					<tbody>
						<?php
						echo "<tr>";
						//вывод таблицы из бд
						if ($_GET['page']) {
							$sql = "SELECT * FROM tbl_contact where pn = " . $_GET['page'];
							$rs = mysqli_query($con, $sql);
							while ($result = mysqli_fetch_array($rs)) {
								echo "<td>{$result['fldName']}</td>";
								echo "<td>{$result['fldEmail']}</td>";
								echo "<td>{$result['fldPhone']}</td>";
								echo "<td>{$result['fldMessage']}</td>";
								echo "<td ><a class='btn btn-outline-danger' href='http://contact.ru/list.php?page=$i&del_itm_id={$result['id']}'>Удалить</a></td>";
								echo "</tr>";
							}
						}
						?>
					</tbody>

				</table>
				<?php
				//общее количество страниц
				$sql_maxpn = "SELECT MAX(pn) FROM tbl_contact";
				$res_maxpn = mysqli_query($con, $sql_maxpn);
				while ($result = mysqli_fetch_array($res_maxpn)) {
					$max_page = $result['MAX(pn)'];
				}
				//цикл создания страниц
				echo "<div style='display:flex; flex-direction:row; justify-content:center; margin-bottom: 10px'>";
				for ($i = 1; $i <= $max_page; $i++) {
					echo "<a class='btn btn-outline-success' style='margin-left: 10px' href=list.php?page=" . $i . "> " . $i . " </a>";
				}
				echo "</div>";
				?>
				<a class=" btn btn-primary btn-lg btn-block" href='/contact.html'>Назад</a>
			</fieldset>
		</div>
	</body>
<?php

}
