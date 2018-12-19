<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{
		$id = clearData($_GET['id']);
		$item = getItemById($id);

		$name = clearData($item['name']);
		$year = clearData($item['year']);
		$brand = clearData($item['brand']);
		$diametr = clearData($item['diametr']);
		$radius = clearData($item['radius']);
		$uploadfile = clearData($item['uploadfile']);
	}
?>
<br/>
<a href='index.php?command=catalog' class="item-ref">Назад</a>
<a href='index.php?command=edit&id=<?=$id?>' class="item-ref">Редактировать</a>
<br/><br/>
<table class="data_table" border="1">
	<tr>
		<th width="15%" bgcolor="#8080ff">Наименование номенклатуры:</th>
		<td colspan="2" width="45%" style="padding:0px 0px 0px 5px;"><?= $name ?></td>
		<td rowspan="5"><img src="<?php 'http://'.$_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'].$uploadfile ?>" width="100%" height="100%"></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Год выпуска:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $year ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Бренд:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $brand ?></td>
	</tr>
	<tr height="250">
		<th width="15%" bgcolor="#8080ff">Диаметр:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $diametr ?></td>
	</tr>
	<tr>
		<th width="15%" bgcolor="#8080ff">Радиус:</th>
		<td colspan="2" style="padding:0px 0px 0px 5px;"><?= $radius ?></td>
	</tr>
</table>
<br/>
