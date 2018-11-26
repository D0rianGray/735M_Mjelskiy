<?php
	function kmh($number,$n) 
	{ 
		$reskmh = 0;


		$km = $number / 1000;
		$hours = $n / 3600;

		$reskmh = $km / $hours;
		
		print $reskmh;
	
	}
		
	function mh($number,$n) 
	{ 

		$resmh = 0;
		$hours = $n / 3600;
		$miles = $number * 0.00062;

		$resmh = $miles / $hours; 
		
		print $resmh;
			
			
	}
	
function MyDump($data)
{
if (is_array($data)){$result="array";}
else if (is_int($data)){$result="integer";}
	else if (is_bool($data)){$result="bool";}
		else if (is_numeric($data)){$result="numeric";}
			else if (is_float($data)){$result="float";}
				else if (is_string($data)){$result="string";}
					else if (is_object($data)){$result="object";}
						else ($result="тип не опознан");
print $result;					
}


?>

<?php include "lib.inc.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Анкетирование по полной!</title>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
<table class="table">
	<tr>
		<td align="center" colspan="2" >
		<!-- Верхняя часть сайта --> 
		<?php include "top.inc.php" ?>
		</td>
	</tr>
	<tr>
		<td width="25%"  rowspan="1">
		<!-- Меню сайта -->
			<?php include "menu.inc.php" ?>
		</td>
		<td colspan="2" >
		<h3>Задание 1</h3>
				<form name="frame" method="POST">
								Расстояние(в метрах):<br />
								<input type="text" name="path" /><br /><br />
								Время(в секундах):<br />
								<input type="text" name="time" /><br /><br />
								<input type="submit" value="Вычислить" />
							</form><br />
								Результат:
								<br />
								Км/ч:
								<?php
									if (isset($_POST['path'], $_POST['time']))
									kmh($_POST['path'], $_POST['time'])
									?>
									</br>
								М/ч:
								<?php
									if (isset($_POST['path'], $_POST['time']))
									mh($_POST['path'], $_POST['time'])
									?>
												<h4>Задание 2</h4>					
											<form name="frames" method="POST">
												<input type="text" name="variable" ><br />
												<input type="submit" name="knopka" text="Выяснить тип">
													</form><br />
													Результат: 
													<?php
														if (isset($_POST['variable']))
															MyDump($_POST['variable'])
														?>
		</td>
</tr>	
	<tr>
		<td colspan="3">
		<!-- Нижняя часть сайта --> 
			<?php include "bottom.inc.php" ?>
		</td>
	</tr>
</table>
</body>
</html>