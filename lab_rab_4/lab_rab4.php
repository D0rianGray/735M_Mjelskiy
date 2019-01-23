<?php
	
	function get_column_names_with_meta ($conn_id)
	{
		$query = "SELECT * FROM tyroperator,pytevka WHERE 1 = 0";
		if (!($result_id = mysqli_query ($conn_id,$query)))
			return (FALSE);
		echo "<table border='1' align='center'>";
		echo "<tr><th>Таблица</th><th>Поле</th><th>Тип</th><th>Длинна</th></tr>";
		for ($i = 0; $i < mysqli_num_fields ($result_id); $i++)
		{
			if ($field = mysqli_fetch_field ($result_id))
				echo "<tr>";
				echo "<td>".$field->table."</td>";
				echo "<td>".$field->name."</td>";
				echo "<td>".$field->type."</td>";
				echo "<td>".$field->length."</td>";
				echo "</tr>";
		}
		echo "</table>";
		mysqli_free_result ($result_id);
	}	
	
	
	function insertDataAndView($connect)
	{
		mysqli_query($connect,"INSERT INTO tyroperator (name,addressreg,telephone,email) values ('ООО Ваш отдых','Москва, ул. Декабристов, д.43, оф.421','+7495 534 4356 ','info@vashotih.su')");
		mysqli_query($connect,"INSERT INTO tyroperator (name,addressreg,telephone,email) values ('ОАО Туристическое агентсвто России','Москва, ул. Дзержинского, д.2, оф. 542','(8-800) 700-22-09','info@tar.ru') ");
		mysqli_query($connect,"INSERT INTO tyroperator (name,addressreg,telephone,email) values ('ООО Релакс','г.Рязань, Московское шоссе, д7, оф.342 ','+74912 55 43 54','relax.ryazan@mail.ru') ");
		mysqli_query($connect,"INSERT INTO tyroperator (name,addressreg,telephone,email) values ('ЗАО Ихтиандр','Москва, ул. Демидовская, д4',' +7495 432 34 23', 'info@ihtiadr.ru') ");
		mysqli_query($connect,"INSERT INTO tyroperator (name,addressreg,telephone,email) values ('ООО Крым наш!','Москва, ул. Декабристов, д 34, оф. 222','+7495 231 2312 ','krymnash@mail.ru') ");
		
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM tyroperator ORDER BY id ASC"));			
		echo "<br>Таблица tyroperator:<br>";		
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>ID</th><th>Название</th><th>Адрес</th><th>Номер</th><th>email</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id']."</td>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['addressreg']."</td>";
			echo "<td>".$item['telephone']."</td>";
			echo "<td>".$item['email']."</td>";
			echo "</tr>";
		}
		echo "</table><br>";
		
		mysqli_query($connect,"INSERT INTO pytevka (id_tyroperator,tyr,pokupatel,data,summa) values ('1','Гоа','Иванов И.И.','2018.11.10',85000)");
		mysqli_query($connect,"INSERT INTO pytevka (id_tyroperator,tyr,pokupatel,data,summa) values ('1','Перу','Иванов И.И.','2018.05.22',57000)");
		mysqli_query($connect,"INSERT INTO pytevka (id_tyroperator,tyr,pokupatel,data,summa) values ('3','Крым','Сидоров С.С.','2018.09.12',30000)");
		mysqli_query($connect,"INSERT INTO pytevka (id_tyroperator,tyr,pokupatel,data,summa) values ('4','Перу','Петров П.П.','2018.09.10',48000)");
		
		$rows = resultSetArray(mysqli_query($connect,"SELECT * FROM pytevka ORDER BY id ASC"));			
		echo "<br>Таблица pytevka:<br>";		
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>ID оператора</th><th>Название</th><th>Покупатель</th><th>Дата заказа</th><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['id_tyroperator']."</td>";
			echo "<td>".$item['tyr']."</td>";
			echo "<td>".$item['pokupatel']."</td>";
			echo "<td>".$item['data']."</td>";
			echo "<td>".$item['summa']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
	
	function query1($connect)
	{
		echo "<br><b>Запрос №1:</b> Вывести все путешествия в Перу, совершенные в 2018  и отсортировать по цене по возрастанию<br>";
		$rows = resultSetArray(mysqli_query($connect,"SELECT name,tyr,data,summa FROM pytevka LEFT JOIN tyroperator on tyroperator.id = pytevka.id_tyroperator 
														WHERE tyr like '%Перу%' and data >= '2018.01.01' AND data <= '2018.12.31' ORDER BY summa ASC"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>Производитель</th><th>Товар</th><th>Дата</th><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['tyr']."</td>";
			echo "<td>".$item['data']."</td>";
			echo "<td>".$item['summa']."</td>";
			echo "</tr>";
		}
		echo "</table>";
		
	}
	
	function query2($connect)
	{
		echo "<br><b>Запрос №1:</b> Вывести общую стоимость туров по операторам<br>";		
		$rows = resultSetArray(mysqli_query($connect,"SELECT name,round(sum(summa),2) as 'it_sum' FROM pytevka,tyroperator WHERE tyroperator.id = pytevka.id_tyroperator GROUP BY(pytevka.id_tyroperator) 
													  ORDER BY name ASC"));			
		echo "<table border='1' align='center' width='600'>";
		echo "<tr><th>Производитель</th><th>Сумма</th></tr>";
		foreach ($rows as $item)
		{
			echo "<tr>";
			echo "<td>".$item['name']."</td>";
			echo "<td>".$item['it_sum']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}

	
	function delDB($connect){
		$query = 'DROP DATABASE lab4';
		if (mysqli_query($connect,$query)) {
			echo "<br>База lab4 успешно удалена\n";
		} else {
			echo 'Ошибка при удалении базы данных: ' . mysqli_error() . "\n";
		}		
		mysqli_close($connect);
	}
	
	
	$host = "localhost";
	$users = "root";
	$password = "";
	$database = "lab4";	
	$connect = mysqli_connect($host, $user, $password);	
	if (!$connect) {
		die('Ошибка соединения: ' . mysqli_error($connect));
	}	
	
	
	
	$query = "CREATE DATABASE IF NOT EXISTS lab4 ";
	if (mysqli_query($connect,$query)) {
		echo "База '$database' успешно создана <br>";
	} else {
		echo 'Ошибка при создании базы данных: ' . mysqli_error($connect) . "\n";
	}
	
	mysqli_select_db($connect,$database);
	
	$query = "CREATE TABLE IF NOT EXISTS tyroperator (
        id integer not null auto_increment primary key,
        name varchar(65) not null,
        addressreg varchar(75) not null,
        telephone varchar(20))";
	
	if (mysqli_query($connect,$query)) {
		echo "Таблица tyroperator успешно создана <br>";
	} else {
		echo 'Ошибка при создании таблицы tyroperator: ' . mysqli_error($connect) . "\n";
	}
	
	$query = "CREATE TABLE IF NOT EXISTS pytevka (
        id integer not null auto_increment primary key,
		id_tyroperator integer not null,
        tyr integer not null,
        pokupatel integer not null)";
	
	if (mysqli_query($connect,$query)) {
		echo "Таблица pytevka успешно создана <br>";
	} else {
		echo 'Ошибка при создании таблицы pytevka: ' . mysqli_error($connect) . "\n";
	}	
	
	echo "<br>Структура базы данных";
	get_column_names_with_meta($connect);    // выводим структуру БД до изменения
	echo "<br><br>";
	
	$query = "ALTER TABLE tyroperator ADD email varchar(50)";	
	if (mysqli_query($connect,$query)) {
		echo "Структура таблицы tyroperator успешно изменена\n";
	} else {
		echo 'Ошибка при изменении таблицы tyroperator: ' . mysqli_error($connect) . "\n";
	}	
	echo "<br><br>";
	
	$query = "ALTER TABLE pytevka MODIFY tyr varchar(50) not null,MODIFY pokupatel varchar(40)not null, ADD data date not null, ADD summa double not null";	
	if (mysqli_query($connect,$query)) {
		echo "Структура таблицы pytevka успешно изменена\n";
	} else {
		echo 'Ошибка при изменении таблицы pytevka: ' . mysqli_error($connect) . "\n";
	}	
	
	echo "<br><br>Измененная структура базы данных";
	get_column_names_with_meta($connect);	         // выводим структуру БД после изменения
	insertDataAndView($connect);                     // заполняем таблицы и выводим их
	query1($connect);                                // запрос №1
	query2($connect);                                // запрос №2
	
	///mysqli_query($connect,"DROP TABLE IF EXISTS tyroperator, pytevka");
	//mysqli_close($connect);
	delDB($connect);                                         //удаляем базу данных lab4


?>
