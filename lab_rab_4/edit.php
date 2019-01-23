<?php
	$id = clearData($_GET['id']);	
	$row = getOne("SELECT * FROM tyr WHERE id = '$id'");  // получаем всю информацию из tyr по данному id
	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{		
		if (!empty($_POST['title']) && !empty($_POST['type']) && !empty($_POST['price']) && !empty($_POST['description']))
		{	
			$title = clearData($_POST['title']);
			$type = clearData($_POST['type']);
			$price = clearData($_POST['price']);
			$description = clearData($_POST['description']);
			if ($_FILES['uploadfile']['tmp_name']) 
			{				
				$a = loadImage("edit"); // получаем массив , содержащий сообщение в случае ошибки и ссылку на изображение			
				if (empty($a['mess'])) 
				{				
					$image = $a['src'];
					executeQuery("UPDATE tyr SET title = '$title', type = '$type', price = '$price', description = '$description', image ='$image' WHERE id = '$id'");		
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
				executeQuery("UPDATE tyr SET title = '$title', type = '$type', price = '$price', description = '$description' WHERE id = '$id'");								
				header("Location: index.php?page=catalog");
				exit;
			}
		}
		else 
			echo '<font color="red">Заполните все поля!</font>';		
	}
?>
	
<center><h2>Редактирование товара</h2></center>
<div>
	<form method='POST' action='index.php?page=edit&id=<?php echo $id; ?>' ENCTYPE='multipart/form-data'>			
		<table>
			<tr>
				<th>Название:</th>
				<td><input type='text' name='title' value='<?=$row['title']?>' size="60"></td>
			</tr>
			<tr>
				<th>Категория:</th> 
				<td>
					<select size="1" name="type">
						<option disabled>Выберите категорию товара</option>
						<option value="Египет" <?php if ($row['type'] == "Египет") echo "selected" ?> >Египет</option>
						<option value="Кипр" <?php if ($row['type'] == "Кипр") echo "selected" ?>>Кипр</option>
						<option value="Крым" <?php if ($row['type'] == "Крым") echo "selected" ?>>Крым</option>
						<option value="Гоа" <?php if ($row['type'] == "Гоа") echo "selected" ?>>Гоа</option>
						<option value="Тайланд" <?php if ($row['type'] == "Тайланд") echo "selected" ?>>Тайланд</option>
						<option value="Вьетнам" <?php if ($row['type'] == "Вьетнам") echo "selected" ?>>Вьетнам</option>
						<option value="ОАЕ" <?php if ($row['type'] == "ОАЕ") echo "selected" ?>>ОАЕ</option>
						<option value="Турция" <?php if ($row['type'] == "Турция") echo "selected" ?>>Турция</option>
						<option value="Тунис" <?php if ($row['type'] == "Тунис") echo "selected" ?>>Тунис</option>
						<option value="Страховка" <?php if ($row['type'] == "Страховка") echo "selected" ?>>Страховка</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>Цена:</th>
				<td><input type='text' name='price' value='<?=$row['price']?>' size='10'>&nbsp;руб.</td>
			</tr>
			<tr>
				<th>Описание:</th>
				<td><textarea name='description' rows='10' cols='50' style="resize:none;" ><?=$row['description']?></textarea></td>
			</tr>
			<tr>
				<th>Изображение:</th> 
				<td><input type='file' name='uploadfile' "></td>
			</tr>
		</table>
		<center><p><input type='submit' value='Сохранить'></p></center>
	</form>
</div>