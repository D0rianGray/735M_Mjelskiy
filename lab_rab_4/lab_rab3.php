<?php 
  if ($_POST){
				 $dlina = 1;
				 $shirina = 1;
				 $cena_m = 1;
				 $otdelka = 1;
				 $mebel = 1;
				 $balkon = 1;
				 $sanuzel = 1;
				 $etaj = 1;
				 $sum = 0;
				
				 $dlina =$_POST['dlina'];
				 $shirina =$_POST['shirina'];
				 $cena_m =$_POST['cena_m'];
				 $otdelka =$_POST['otdelka'];
				 $mebel =$_POST['mebel'];
				 $balkon =$_POST['balkon'];
				 $sanuzel =$_POST['sanuzel'];
				 $etaj =$_POST['etaj'];
								 
				  if ($otdelka == 0)
					 $otdelka = 1;
				 if ($mebel == 0)
					 $mebel = 1;
				 if ($balkon == 0)
					 $balkon = 1;
				 if ($sanuzel == 0)
					 $sanuzel = 1;
				 if ($etaj == 0)
					 $etaj = 1;
				
				 $sum = $dlina * $shirina * $cena_m * $otdelka * $mebel * $balkon * $sanuzel * $etaj;
				 
				 
   }
 ?>
    <link rel="stylesheet" type="text/css" href="style.css">
	
<table class="table">
	<tr>
		<td >
			   <form  method="POST" >
                      Длина (метров):<input type="" name="dlina" value=""  >  <br>
						Ширина(метров):<input type="" name="shirina" value=""  >	 <br>
							Цена за м^2:<input type="" name="cena_m" value=""  >	 <br>
								Отделка:<input type="checkbox" name="otdelka" value="1.05"  >	 <br>
								Мебель:<input type="checkbox" name="mebel" value="1.02"  >	 <br>
								Балкон или лоджия:<input type="checkbox" name="balkon" value="1.03"  >	 <br>
								Совмещенная ванная:<input type="checkbox" name="sanuzel" value="0.97"  >	 <br>
								Выбор этажа:<input type="checkbox" name="etaj" value="1.001"  >	 <br>
													
								<input type="submit" name="" value="Вычислить">
			   </form>
		</td>
		<td >
			  <?php 
			  if(!empty($_POST)){
				echo " Цена квартиры ".$sum." рублей<br>
				 Длина ".$dlina." метров <br>
				 Ширина ".$shirina." метров <br>
				 Цена за м^2 ".$cena_m." рублей <br>
			  " ;}
				  if ($_POST['otdelka'] != '1.05' ){
				  echo "Отделки нет<br>";}
					  else {
						  echo "Отделка есть<br>";
				   			  }
				if ($_POST['mebel'] != '1.02' ){
					echo "Мебели нет<br>";}
						else {
							echo "Мебель есть<br>";
				   			  }
				if ($_POST['balkon'] != '1.03' ){
					echo "Балкона нет<br>";}
						else {
							echo "Балкон есть<br>";
				   			  }	
				if ($_POST['sanuzel'] != '0.97' ){
					echo "Совмещенный санузел<br>";}
						else {
							echo "Разделенный санузел<br>";
				   			  }	
				if ($_POST['etaj'] != '1.001' ){
					echo "Без выбора этажа<br>";}
						else {
							echo "С выбором этажа<br>";
				   			  }	
			   ?>
			   
		</td>
	</tr>
</table>
		