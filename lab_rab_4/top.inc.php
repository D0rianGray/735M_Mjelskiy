<td colspan="2" style="height:15%">
	<!-- Верхняя часть сайта --> 
	<table class="top">
		<tr>
			<td>
				<table style="text-align:left">
					<tr>
						<td >
							<img src="images/t-icon-m.png" alt="RUS" /> &nbsp;8 800 555 35 35
						</td>						
						<td>
							<img src="images/t-icon-s.png" alt="skype" /> skype: Tour4U
						</td>
					</tr>
					<tr>
						<td>
							<img src="images/t-icon-v.png" alt="ANY" /> <span style="margin-right:20px;">+7 495 452 34 22</span>
						</td>
						<td>
							<img src="images/t-icon-e.png" alt="email" /> email: Tour4U@gmail.com
						</td>
					</tr>
				</table>
				<table style="text-align:left">							
					<tr>
						<td > 
							<div style="margin-right:20px;"><img src="images/t-icon-time.png" alt="email" /> КРУГЛОСУТОЧНО <br> <b>24\7\365</b></div>
						</td>
						
					</tr>
				</table>
			</td>
			<td >
				<a href="index.php"><img src="images/logo.png" alt="Логотип" /></a>
			</td>
			<td >
				<h2> Надежный партнер для вашего отдыха! </h2>
			</td>
		</tr>
		<tr>
			<td class="top_left"> 
				<?php
					if (!empty($_SESSION['user_login']))
						echo "Привет,<b>".$_SESSION['user_login']."</b> <a href='index.php?logout=true'>(Выход)</a>";
				?> 
			</td>
			<td class="top_right" colspan="2"> Поиск </td>
		</tr>
   </table>
</td>
