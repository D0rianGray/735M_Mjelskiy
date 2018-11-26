<tr>
		<td class="td_down" colspan="3">
<!-- Нижняя часть сайта --> 
			<table class="bottom">
				<tr>
					<td> Ваш последний визит:
<br/> Системное время: <?php
						// выведет примерно следующее: Wednesday the 15th
							date_default_timezone_set('UTC');
							echo date(DATE_W3C);
						?>	
<br/> Информация о сервере:<?php
								// Выводит строку типа 'Текущая версия PHP: 4.1.1'
echo 'Текущая версия PHP: ' . phpversion();

// Выводит строку типа '2.0' или ничего, если расширение не включено
echo phpversion('tidy');
							?>	
					</td>
				</tr>
			</table>
		</td>
	</tr>