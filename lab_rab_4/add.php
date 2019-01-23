<?php   
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{ 
	if (!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['price']) && !empty($_POST['description']))
	{	
		$title = clearData($_POST['title']);
		$type = clearData($_POST['type']);
		$price = clearData($_POST['price']);
		$description = clearData($_POST['description']);
		$cheakID = getOne("SELECT id FROM tyr WHERE title = '$title' ");				
		if (count($cheakID) == 0)
		{
			if ($_FILES['uploadfile']['tmp_name']) 
			{			
				$a = loadImage("add"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{
					$image = $a['src'];
					executeQuery("INSERT INTO tyr (title,type,price,description,image) VALUES ('$title','$type','$price','$description','$image')");
					header("Location: index.php?page=catalog");
					exit;
				}
				else
				{ 
					echo $a['mess'];
				}
			}
			else 
			{			
				$image = "";
				executeQuery("INSERT INTO tyr (title,type,price,description,image) VALUES ('$title','$type','$price','$description','$image')");	
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else echo  '<font color="red">Запись с таким названием уже существует!</font>';
	}
	else 
		echo '<font color="red">Заполните все поля!</font>';	
}
?>

<center><h2>Добавить тур</h2></center>
<div>
	<form method='POST' action='index.php?page=add' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Название:</th>
				<td><input type='text' name='title' ></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td style="width:100%">
					<select size="1" name="type">
						<option disabled>Выберите страну направления</option>
						<option value="Египет">Египет</option>
						<option value="Кипр">Кипр</option>
						<option value="Крым">Крым</option>
						<option value="Гоа">Гоа</option>
						<option value="Тайланд">Тайланд</option>
						<option value="Вьетнам">Вьетнам</option>
						<option value="ОАЕ">ОАЕ</option>
						<option value="Турция">Турция</option>
						<option value="Тунис">Тунис</option>
						<option value="Страховка">Страховка</option>
					</select>
				</td>
			</tr>			 			
			<tr>
				<th>Цена:</th>
				<td><input type='text' name='price' size='10'>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' style="resize:none; width:90%"></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' accept='image/jpeg'></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Добавить' name='add'></p></center>
	</form>
</div>