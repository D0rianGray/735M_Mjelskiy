<?php
//Инициализация переменных
$name = "";
$location = "";
$job = "";
$work_type = "";
$price = "";
$uploadlink = "";

if (isset($_POST['delete']))
{
	foreach ($_SESSION['Items'] as $item){
		$id = $item['id'];
		if (isset($_POST["checkbox$id"])){
			deleteItem($id);
		}
	}
}	
?>

<button id="add" class='btn' onclick="location.href='index.php?command=add';">Добавить</button>
<br/><br/>


<form method='POST'>
<table class="table" border="1">
<tr>
	<th width="20%">Наименование номенклатуры:</th>
	<th width="20%">Бренд:</th>
	<th width="20%">Год выпуска:</th>
	<th width="20%">Диаметр:</th>
	<th width="20%">Радиус:</th>
</tr>
<?php 
if (!empty($_SESSION['Items'])) {
	foreach ($_SESSION['Items'] as $item){
		$name = $item['name'];
		$year = $item['year'];
		$radius = $item['radius'];
		$diametr = $item['diametr'];
		$brand = $item['brand'];
		$id = $item['id'];
	echo 
	"<tr>
	<td> <a href='index.php?command=item&id=$id';' style='color:black; display:inline;'>$name</a></td>
	<td>$year</td>
	<td>$radius	</td>
	<td>$diametr</td>
	<td>$brand</td>
	<td>$uploadlink</td>
	<td>
		<input type='checkbox' name='checkbox$id' value=$id/>
	</td>
</tr>";
	}
}
?>

</table>
<br/><br/>
<input id='delete' class='btn' type='submit' class='button' name='delete' value='Удалить'/>
</form>