<?php 
function getMenu($menu, $vertical=true) 
{ 
$style = ' ';
if(!$vertical) 
{ 
$style = "display:inline"; 
} 
echo '<ul style="list-style-type:none">'; 
foreach ($menu as $link=>$href) 
{ 
echo "<li style='$style'><a class = 'a' href=\"$href\">", $link, '</a></li>'; 
} 
echo '</ul>'; 
} 
?>

<?php 
					
$user = array ("Иванов И.И." => array('name'=>"Иванов И.И.", 'age'=>28, 'visited'=>57), 
"Петров П.П." =>array('name'=>"Петров П.П.",'age'=>24, 'visited'=>2),
 "Сидоров С.С." =>array('name'=>"Сидоров С.С.",'age'=>19, 'visited'=>34));

function usersort(array $arr) {   					
foreach ($arr as $key => $row) {
$visited[$key]  = $row['visited'];}
array_multisort($visited, SORT_DESC, $arr);
return $arr;
}

function ticket() {   					
$m = 111111;
$n = 999999;
$arr = array();
for ($i = $m; $i <= $n; $i++){
    $s = (string)$i;
    $s1 = $s[0]+$s[1]+$s[2];
    $s2 = $s[3]+$s[4]+$s[5];
    if ($s1 == $s2){
       array_push($arr, $i);
    }
}
return $arr;
}

?>