<?php
function generate($number)
{
	$chars = 'abcdefghijklmnopqrstuvwxyz';
	$numChars = strlen($chars);
	$string = '';
	 
	  for ($i = 0; $i < $number; $i++) {
		$string .= substr($chars, rand(1, $numChars) - 1, 1);
	  }
	 $strrev = strrev($string);
	 print $string;
	 print "  Обратная строка: ";
	 print $strrev;
}


	
function Chet($numeric)
{
$a=($numeric);
if ($a%2==0)
	$result="четное";
	else ($result="нечетное");

return $result;

}

function &znac($numeric)
{
	$a=($numeric);
		if ($a<0)
	$result="отирцательное";
	else ($result="положительное");
	return $result;
}

function razr($numeric)
{
	$a=($numeric);
		if ($a<0) return strlen($a)-1;
		return strlen($a);
}

function MyDump($numeric)
{
	echo chet($numeric);
	echo ('</br>');
	echo znac($numeric);
	echo ('</br>');
	echo ("Количество разрядов: ");
	echo razr($numeric);
}

?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Туристическое агенство "TOUR4U"</title>
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
		<h3>Задание 2</h3>
				<form name="frame" method="POST">
								Длина строки:<br />
								<input type="text" name="path" /><br /><br />
								<br />
								<input type="submit" value="Вычислить" />
							</form><br />
								Результат:
								<br />
								Генерированая строка:
								<?php
									if (isset($_POST['path']))
									generate($_POST['path'])
									?>
									</br>
								<h4>Задание 1</h4>					
											<form name="frames" method="POST">
												<input type="text" name="numeric" ><br />
												<input type="submit" name="knopka" text="Выяснить тип">
													</form><br />
													Результат: 
													<?php
														if (isset($_POST['numeric']))
															MyDump($_POST['numeric'])
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