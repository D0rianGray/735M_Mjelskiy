<?php
	if ($_SERVER['REQUEST_METHOD'] == 'GET')
	{	
		$id = clearData($_GET['id']);
		$item = getItemById($id);
		$name = $item['name'];
		$year = $item['year'];
		$brand = $item['brand'];
		$diametr = $item['diametr'];
		$radius = $item['radius'];
		$uploadfile = $item['uploadfile'];
	}

	if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//filter
		if (empty($_POST['name']) | empty($_POST['year']) | 
		empty($_POST['brand']) | empty($_POST['diametr']) |
		empty($_POST['radius']) | empty($_POST['id']))
		{
			echo 'Полностью заполните форму!';
		} else {
			$id = clearData($_POST['id']);
			$temp = editItem($id);
			addItem($temp);
			header("Location: index.php?command=catalog");
		}
	}
?>
	
<div>
	<h3>Редактировать запись</h3>
	<?php include "item_form.php" ?>
</div>
