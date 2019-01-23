<td colspan="2" style="height:5%">
	<!-- Нижняя часть сайта --> 
	<table class="footer">
		<tr>
			<td>
				Последний визит: <?=$dateVisit?><br>
				Системное время: <?php date_default_timezone_set('UTC');
							echo date(DATE_W3C);?>
				<br/> Информация о сервере: <?php echo 'Текущая версия PHP: ' . phpversion()?>
			</td>
		</tr>
		<tr>
			<td>&copy; 2018 Агентство Tour4U</td>	
		</tr>
	</table>
</td>