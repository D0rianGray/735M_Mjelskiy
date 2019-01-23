<?php
	session_start();
	ob_start();
	ini_set('display_errors',1);
	//error_reporting(E_ALL);
	date_default_timezone_set('Asia/Muscat');
	header("Content-Type: text/html; charset=utf-8");
	header("Cache-control: no-store");
	include "base_reg.php";
	include "lib.inc.php";
	if (isset($_COOKIE['dateVisit']))
		$dateVisit = $_COOKIE['dateVisit'];
	setcookie('dateVisit',date('Y-m-d H:i:s'),time()+0xFFFFFFF);
	if (empty($_GET['page']))
		$page = "";
	else
		$page = $_GET['page'];	
?>

<!DOCTYPE html>

<html lang="en">

<head>
	<title>Главная страница</title>
	<link rel="stylesheet" href="style.css" type="text/css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
	<table class="header">
		<tr>
			<?php include "top.inc.php" ?>
		</tr>
        <tr>
			<?php include "menu.inc.php" ?>
            <td>
				<table class="content">
					<tr>
						<td class="content_td">
							<?php
								if ($page=="reg")
									require 'registration.php';	
								else
									require 'auth.php';								
								if (isset($_SESSION['user_login']))	
								{									
									if (empty($page)) {
										echo '<table class="content">
					<tr>
						<td class="content_td">
							Туристическое агенство TOUR4U, основанное в 1992 году, является региональной компанией, организующей туры для туристов из России. Компания работает по следующим направлениям: страны Европы, Азии, Востока и др. (более подробную информацию см в разделе "Туристические направления").<br/>
							<p/><b> Особенности: </b>
							<br/><b>
							1.</b> Во всех странах наших клиентов обслуживают подготовленные и высококвалифицированные сотрудники. Их работа строится по одному принципу - служба бронирования подтверждает места в отелях, операционный отдел обеспечивает трансферы и экскурсионное обслуживание, а сотрудники отдела guest relation помогают клиентам чувствовать себя как дома. Это позволяет TOUR4U делать отдых туристов качественным и комфортным.<br/>
							<br/><b>
							2.</b> Сотрудничество TOUR4U более чем с 20 международными и национальными компаниями, работающими на отправку и прием туристов, позволяет нам качественно предоставлять услуги туристам из России, Болгарии, Румынии, Украины, Латвии, Литвы, Белоруссии, Эстонии, Молдавии и Казахстана.<br/>
							<br/><b>
							3.</b> Наш профиль – высококачественное обслуживание туристов на самых популярных направлениях зарубежного туризма. Профессионально работая с большими потоками туристов и хорошо разбираясь в ситуации на туристическом рынке, мы выбираем надежные авиакомпании и лучшие отели. Мы способны предложить широкие возможности для отдыха туристов, организовать выезд на семинар или конференцию, детский отдых, VIP-туры.<br/>
							<br/><b>
							4.</b> TOUR4U имеет заслуженную репутацию одной из самых высокотехнологичных компаний на российском туристическом рынке. Работа офисов, партнеров и агентов максимально взаимосвязана и автоматизирована, система онлайн-бронирования прогрессивна и удобна в использовании. Полная компьютеризация и отлаженная система работы не допускают потерь информации. Это позволяет нам бесперебойно и четко обслуживать тысячи туристов даже в пик туристического сезона.<br/>
							<br/><b>
							5.</b> Мы работаем только с проверенными и надежными партнерами. Авиаперевозки осуществляются крупнейшими авиакомпаниями мира с современным авиапарком. Среди них "Аэрофлот", I Fly, Thai Airways, Emirates, QATAR AIRWAYS, Air Baltic, Air Europa и другие.<br/>
							<br/><b>
							6.</b> В отельной сфере наши партнеры - ведущие цепочки гостиниц, среди них Marriott, Sheraton, Le Meridien, Sol Melia, Princess, Hilton, Iberostar, Four Seasons и др.<br/>
							<br/><b>
							7.</b> TOUR4U уделяет особое внимание контролю качества предоставляемых услуг на всех этапах. Мы тщательно отслеживаем каждую заявку с момента поступления в TOUR4U до возвращения туриста домой.<br/>
							<br/><b>
							8.</b> Каждое направление компании непрерывно развивается, и в этот процесс вовлечены все наши партнеры, не говоря уже о сотрудниках TOUR4U. Так что компания результатами нашей работы постоянно подтверждает свой слоган - Высокие Технологии Туризма.<br/>
						</td>
					</tr>
				</table>';
									}
									else
									{									
										switch($page)
										{
											case 'lab1': include 'lab_rab1.html'; break;
											case 'lab2': include 'lab_rab2.php'; break;
											case 'lab3': include 'lab_rab3.php'; break;		
											case 'lab4': include 'lab_rab4.php'; break;																					
											case 'catalog': include 'catalog.php';break;	
											case 'add': include 'add.php'; break;
											case 'item': include 'item.php'; break;	
											case 'edit': include 'edit.php'; break;
										}
									}								
								}							
							?>
						</td>
					</tr>
				</table>
            </td>
         </tr>
        <tr>
			<?php include "bottom.inc.php" ?>
         </tr>
	</table>
</body>
</html>
<?php
	ob_end_flush();
?>