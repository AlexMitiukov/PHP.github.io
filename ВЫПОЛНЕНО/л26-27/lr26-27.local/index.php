<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Каскадные дома</title>
		<link rel="stylesheet" href="assets\css\styles.css">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
		<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
	</head>
	<body>

		<button data-tooltip="Нажмите, чтобы подняться наверх" id="back-to-top-button">Наверх</button>

		<!-- ШАПКА -->
		<header>
			<div class="header">
				<div class="header_header1">
					<div class="header_header1_burger">
						<div class="menu-btn">
							<span></span>
							<span></span>
							<span></span>
						</div>

						<div class="menu">
							<nav>
								<h1></h1>
								<img src="assets\images\logo.png" />
								<a href="#"><br />Виды строительства<br /></a>
								<h6><br />- Каркасные дома<br /><br />- Дома изклееного бруса<br /><br />- Фахверковые дома<br /><br />- Дома из брёвен<br /><br />- Беседки<br /><br />- Ремонт и отделка</h6>
								<a href="#">Наши работы<br /><br /></a>
								<a href="#">Отзывы клиентов<br /><br /></a>
								<a href="#">Партнёры<br /><br /></a>
								<a href="#">Контакты<br /><br /></a>
							</nav>
						</div>
						<script>
							let menuBtn = document.querySelector('.menu-btn');
							let menu = document.querySelector('.menu');

							menuBtn.addEventListener('click', function () {
								menuBtn.classList.toggle('active');
								menu.classList.toggle('active');
							})
						</script>
					</div>
					<div class="header_header1_logo"><img src="assets\images\logo.png" /></div>
					<div class="header_header1_inscription1">Строительство деревянных домов<br /><b>за <span>45</span> дней</b></div>
					<div class="header_header1_inscription2">Нажмите, чтобы начать общение</div>
					<div class="header_header1_phone"><img src="assets\images\calling.png">+38 (098) 271-50-35</div>
					<div class="header_header1_number"></div>
				</div>
				<div class="header_header2">
					<div class="header_header2_empty"></div>
					<div class="header_header2_viber-button"><a href="https://www.viber.com"><img src="assets\images\viber.png">Viber</a></div>
					<div class="header_header2_empty2"></div>
					<div class="header_header2_telegram-button"><a href="https://www.telegram.com"><img src="assets\images\telegram.png">Telegram</a></div>
					<div class="header_header2_empty3"></div>
					<div class="header_header2_button-button">Перезвонить мне</div>
					<div class="header_header2_empty4"></div>
				</div>
			</div>
		</header>

		<!-- ПЕРВЫЙ БЛОК: ДОМ -->
		<div class="fblock">
			<div class="house">
				<div class="house_zone"></div>
				<div class="house_inscription1"><b>СДЕЛАЕМ ВАШ <span>ДОМ</span></b></div>
				<div class="house_inscription2"><b>ГОТОВЫМ К КОМФОРТНОМУ<br />ПРОЖИВАНИЮ</b></div>
				<div class="house_inscription3">Строительство деревянных домов "под ключ":<br />коттенжди, беседки, бани, дома из клееного бруса</div>
				<div class="house_button1-button"><a href="asdgdasg.com"><b>Демонтаж</b></a></div>
				<div class="house_button2-button"><a href="asdgdasg.com"><b>Бетонные<br />работы</b></a></div>
				<div class="house_button3-button"><a href="asdgdasg.com"><b>Возведение<br />стен</b></a></div>
				<div class="house_button4-button"><a href="asdgdasg.com"><b>Кровельные<br />работы</b></a></div>
				<div class="house_button5-button"><a href="asdgdasg.com"><b>Отделка<br />фасадов</b></a></div>
				<div class="house_button6-button"><a href="asgasg.com"><b>Инженерные<br />работы</b></a></div>
				<div class="house_title"><b>Заказать счёт</b></div>
				<div class="house_inscription4">Оказываем улуги комплексно,<br />совмешая отдельные виды работ</div>
				<div class="house_book"><img src="assets\images\book.png"></div>
				<div class="house_button7-button"><a href="#">Заказать расчёт</a></div>

			</div>
		</div>

		<!-- Регистрация -->
		<div class="registration-button">
        	<a href="registration.php">Регистрация</a>
    	</div>
		
		<!-- Авторизация -->
		<div class="authorization-button">
        	<a href="authorization.php">Авторизация</a>
    	</div>

		<?php
			$servername = "localhost"; // Или адрес сервера MySQL
			$username = "root"; // Укажите свой логин (по умолчанию root)
			$password = "1aviro"; // Укажите пароль (если меняли)
			$dbname = "pssip"; // Название базы данных

			// Подключение к базе данных
			$conn = new mysqli($servername, $username, $password, $dbname);

			// Проверка соединения
			if ($conn->connect_error) {
				die("Ошибка подключения: " . $conn->connect_error);
			}

			// Запрос на получение товаров с категориями
			$query_tovary = "SELECT Товары.IdТовара, Товары.Название AS Товар, Товары.Цена, Категория.Название AS Категория
							FROM Товары 
							JOIN Категория ON Товары.idКатегории = Категория.idКатегории";

			$result_tovary = $conn->query($query_tovary);

			// Запрос на получение услуг с категориями
			$query_uslugi = "SELECT Услуги.idУслуги, Услуги.Название AS Услуга, Услуги.Цена, Категория.Название AS Категория
							FROM Услуги 
							JOIN Категория ON Услуги.idКатегории = Категория.idКатегории";

			$result_uslugi = $conn->query($query_uslugi);
			?>

			<!DOCTYPE html>
			<html lang="ru">
			<head>
				<meta charset="UTF-8">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
				<title>Главная страница</title>
				<link rel="stylesheet" href="assets/css/styles.css">
			</head>
			<body>

				<h2>Товары</h2>
				<table border="1">
					<tr>
						<th>ID</th>
						<th>Название</th>
						<th>Цена</th>
						<th>Категория</th>
					</tr>
					<?php while ($row = $result_tovary->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['IdТовара']; ?></td>
							<td><?php echo $row['Товар']; ?></td>
							<td><?php echo $row['Цена']; ?></td>
							<td><?php echo $row['Категория']; ?></td>
						</tr>
					<?php endwhile; ?>
				</table>

				<h2>Услуги</h2>
				<table border="1">
					<tr>
						<th>ID</th>
						<th>Название</th>
						<th>Цена</th>
						<th>Категория</th>
					</tr>
					<?php while ($row = $result_uslugi->fetch_assoc()): ?>
						<tr>
							<td><?php echo $row['idУслуги']; ?></td>
							<td><?php echo $row['Услуга']; ?></td>
							<td><?php echo $row['Цена']; ?></td>
							<td><?php echo $row['Категория']; ?></td>
						</tr>
					<?php endwhile; ?>
				</table>

			</body>
			</html>

			<?php
			$conn->close(); // Закрываем соединение с БД
			?>

		<!-- Подвал -->
		<footer>
			<div class="footer">
				<div class="footer_logo"><img src="assets\images\logo.png"></div>
				<div class="footer_vid">Виды строительства</div>
				<div class="footer_vids1"><a href="#services">- Каркасные дома</a></div>
				<div class="footer_vids2"><a href="#services">- Дома из клееного бруса</a></div>
				<div class="footer_vids3"><a href="#services">- Фахверковые дома</a></div>
				<div class="footer_vids4"><a href="#services">- Дома из брёвен</a></div>
				<div class="footer_vids5"><a href="#services">- Беседки</a></div>
				<div class="footer_vids6"><a href="#services">- Ремонт и отделка</a></div>
				<div class="footer_works">Наши работы</div>
				<div class="footer_review">Отзывы клиентов</div>
				<div class="footer_partners">Партнёры</div>
				<div class="footer_contact">Контакты</div>
				<div class="footer_geo"><img src="assets\images\geo.png"> Украина, г. Одесса</div>
				<div class="footer_text">ул. Комитетская, 24Б</div>
				<div class="footer_mail"><img src="assets\images\mail.png"> Эл. почта:odessadomd@gmail.com</div>
				<div class="footer_calling"><img src="assets\images\calling.png"> +38 (098) 271-50-35</div>
				<div class="footer_videos">
					<div class="footer_videos_facebook"><img src="assets\images\facebook.png"></div>
					<div class="footer_videos_instagram"><img src="assets\images\instagram.png"></div>
					<div class="footer_videos_youtube"><img src="assets\images\YouTube.png"></div>
					<div class="footer_videos_text"><b>Свежие видео<br />у нас на канале</b></div>
				</div>
				<div class="footer_arrow"><img src="assets\images\arrow.png"></div>
			</div>
		</footer>
	</body>
</html >