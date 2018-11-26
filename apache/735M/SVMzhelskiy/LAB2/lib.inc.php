<ul style="list-style-type:none">
<?php
$menu = array(
		"Главная"=>"index.php",
		"ЛР1"=>"lab_rab1.html",
		"ЛР2"=>"lab_rab2.php"
	);
foreach ($menu as $link=>$href)
{
echo "<li><a href=\"$href\">", $link, '</a></li>';
}
?>
</ul>
