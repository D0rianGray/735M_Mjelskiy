<?php

	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
		$row = getOne("SELECT * FROM tyr WHERE id = '$id'");  // получаем всю информацию из tyr по данному id
	}
?>

<br/>
<a href='index.php?page=catalog' style='margin-left:40px'>Назад</a>
<a href='index.php?page=edit&id=<? echo $id; ?>' style='margin-left:20px'>Редактировать</a>
<br/><br/>
<table  border="1" style="text-align:left;" align="center">
	<tr>
		<th width="15%" bgcolor="#8080ff">Название</th>
		<td  ><?= $row['title'] ?></td>
		<td rowspan="4"><img src='<?php if (empty($row['image'])) echo "images/catalog/no-image.jpg"; else echo $row['image'].'.jpg';?> '></td>
	</tr>
	<tr>
		<th bgcolor="#8080ff">Категория</th>
		<td  width="45%"><?= $row['type'] ?></td>
	</tr>
	<tr>
		<th bgcolor="#8080ff">Цена</th>
		<td><?= $row['price'] ?> руб.</td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#8080ff">Описание</th>
		<td valign="top"><?= $row['description'] ?></td>
	</tr>
</table>
<br/>
