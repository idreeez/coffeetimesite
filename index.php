<?php 
	require_once 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>#КофеТайм</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="smartbasket/css/smartbasket.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="node_modules/animate.css/animate.css">
	<link rel="stylesheet" href="node_modules/bootstrap-icons/font/bootstrap-icons.css">
	<link rel="shortcut icon" href="img/site-icon.png" type="image/png">
	<script src="js/jquery-3.6.4.js"></script>
</head>
	<body class="body">
	<button type="button" class="btn btn-floating btn-lg animate__animated" id="btn-back-to-top" style="background-color: #75453e;z-index:10;">
  		<i class="bi bi-arrow-up-short" style="color:#fff;"></i></button> <!-- КНОПКА ПРОКРУТА -->
	<button type="button" class="btn btn-floating btn-lg animate__animated" data-bs-toggle="modal" data-bs-target="#faq" id="btn-faq" style="background-color: #75453e;z-index:10;">
			<i class="bi bi-question" style="color:#fff;"></i></button> <!-- ВОПРОСЫ -->

			<header class="header d-flex align-items-center justify-content-center py-4 mb-4" id="main">
				<a href="/" class="col-md-1 logo" >
					<img src="img/logocoffeetime.png" alt="logotype" width="100%" > <!-- ЛОГОТИП -->
				</a>
			<ul class="nav col-5 justify-content-center">
				<li><a href="#main" class="nav-link px-2">Главная</a></li>
				<li><a href="#about-us" class="nav-link px-2">О нас</a></li>
				<li><a href="#menu" class="nav-link px-2">Меню</a></li>
				<li><a href="#reviews" class="nav-link px-2">Отзывы</a></li>
				<li><a href="#contacts" class="nav-link px-2">Контакты</a></li>
			</ul>

			<div class="col-md-1 bag-card">
			<a href="#" class="bag"><i class="bi bi-bag-fill"></i></a>
			</div>
			</header>
	  <div class="container container-sm text-center d-flex py-5 justify-content-center section1" id="section1"> <!-- ГЛАВНАЯ -->
	    <div class="col-md-7 p-lg-5 my-5 text_section1">
	      <h1 class=" fw-bold animate__animated animate__fadeInUp ">Наслаждайтесь жизнью с лучшим кофе</h1>
	      <p class="lead fw-normal animate__animated animate__fadeInUp animate__delay-1s">#КофеТайм - это место, где вы можете насладиться ароматным кофе и вкусным десертом из нашего меню. Наша кофейня погружает в атмосферу уюта и спокойствия. А кофе с собой поднимет ваше настроение.</p>
	      <a class="btn btn-primary animate__animated animate__fadeInUp animate__delay-2s" href="#menu">Перейти к меню</a>
	   </div>
	    <img src="img/coffee_cup.png" alt="cup" width="30%" height="30%" class="animate__animated animate__fadeInUp">
	  </div> 
	  <div class="container py-5 section2 animate__animated animate__fadeInUp" id="about-us"> <!-- О НАС --> 
		<div class="coffee_cup_parallax">
			<img src="img/coffee_cup/6.png" alt="6" width="2%" class="rellax position-absolute"data-rellax-speed="2.7"style="transform: translate(52px, -353px);">
			<img src="img/coffee_cup/5.png" alt="5" width="2%" class="rellax position-absolute" data-rellax-speed="2.6"style="transform: translate(4px, -35px);">
			<img src="img/coffee_cup/4.png" alt="4" width="2%" class="rellax position-absolute" data-rellax-speed="2.8"style="transform: translate(353px, -204px);">
			<img src="img/coffee_cup/3.png" alt="3" width="2%" class="rellax position-absolute" data-rellax-speed="2.4"style="transform: translate(420px, -323px);">
			<img src="img/coffee_cup/2.png" alt="2" width="2%" class="rellax position-absolute" data-rellax-speed="2.5"style="transform: translate(303px, -253px);">
			<img src="img/coffee_cup/1.png" alt="1" width="45%" class="rellax position-absolute" data-rellax-speed="0.8" style="transform: translate(11px, -393px);">
			<img src="img/open_cup.png" alt="cup" width="30%" class="cup position-absolute" style="transform: translate(106px, -64px);">
			<img src="img/krishka.png" alt="krishka" width="30%" class="rellax position-absolute" data-rellax-speed="1.5"style="transform: translate(146px, -163px);">

		</div>
		<img src="img/static_cup.png" alt="stcup" width="40%" class="static_cup position-absolute" style="transform: translate(46px, -339px);">
		<h1 class="fw-bold d-flex offset-7 section2_h1">О нашей кофейне</h1>
		<div id="myCarousel" class="carousel slide offset-6 py-3" data-bs-ride="carousel">
			<div class="carousel-indicators">
			  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
			  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
			  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
			  <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
			</div>
			<div class="carousel-inner">
			  <div class="carousel-item active">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
				<div class="col-md-4 mb-2 mb-md-0 py-2">
				  <div class="carousel-caption text-start slide1">
					<h2 class="fw-bold">У нас царит уютная атмосфера</h2>
					<p>В уютном кофейне #КофеТайм можно выпить чашку ароматного кофе, попробовать вкусный десерт. Это тихая и уютная кофейня, которая располагает к спокойному общению.</p>
				  </div>
				</div>
			  </div>
			  <div class="carousel-item">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
				<div class="col-md-4 mb-2 mb-md-0 py-2">
				  <div class="carousel-caption text-start slide2">
					<h2 class="fw-bold">Обширное меню</h2>
					<p>В меню всегда присутствует большой выбор сортов кофе, фирменных сладостей, а также подарочных наборов. Кофе также можно забрать с собой.</p>
				  </div>
				</div>
			  </div>
			  <div class="carousel-item">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
				<div class="col-md-4 mb-2 mb-md-0 py-2 ">
				  <div class="carousel-caption text-start slide3">
					<h2 class="fw-bold">Комфортное место</h2>
					<p>Помещение #КофеТайм оформлено в приятном стиле: удобная мебель, имитация окон с помощью зеркал, авторские рисунки, а так же красиво выложенная столешница вдоль витрины.</p>
				  </div>
				</div>
			  </div>
			  <div class="carousel-item">
				<svg class="bd-placeholder-img" width="100%" height="100%" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" preserveAspectRatio="xMidYMid slice" focusable="false"></svg>
				<div class="col-md-3 mb-2 mb-md-0 py-2">
				  <div class="carousel-caption text-start slide4">
					<h2 class="fw-bold">Приятные цены</h2>
					<p>Цены в кофейне не пугают своей заоблачностью, обслуживание всегда на уровне, люди с разными запросами смогут здесь приятно провести время.</p>
				  </div>
				</div>
			  </div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
			  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
			  <span class="carousel-control-next-icon" aria-hidden="true"></span>
			</button>
		  </div>
	  </div>
	  <div class="container py-5 section4" id="section4"><!-- СКИДКИ -->
		<h1 class="fw-bold offset-7 animate__animated">Балуем своих клиентов постоянными акциями!</h1>
		<div class="container row py-5 justify-content-center">
		<div class="acard acard1 col-12 col-md-5 col-sm-5 text-center animate__animated">
			<div class="sec4img1">
			  <img src="img/103.png" alt="10" width="50%">
			</div>
			<div class="py-4">
			  <p class="fw-bold fs-4">скидки на всю продукцию в течении этого месяца</p>
			  <button type="button" class="btn btn-primary" id="skidka1btn">Подробнее</button>
			</div>
		  </div>
		  <div class="acard acard2 col-12 col-md-5 col-sm-5 text-center animate__animated animate__delay-1s ">
		  	<div>
		  		<img src="img/desert2.png" alt="10" width="50%">
		  	</div>
			<div class="py-4">
			  <p class="fw-bold fs-4">при покупке от 1000 рублей получи десерт в подарок</p>
			  <button type="button" class="btn btn-primary" id="skidka2btn">Подробнее</button>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="container py-5 section5 text-center" id="menu"> <!-- МЕНЮ -->
	  	<h1>МЕНЮ</h1>
		  <div class="menu animate__animated">
		  <ul class="nav col-md-auto mb-2 justify-content-center mb-md-0"> <!-- НАВИГАЦИЯ МЕНЮ -->
			<li><a href="#drinks" class="nav-link px-2">Напитки</a></li>
			<li class="ellipse">&#8226;</li>
			<li><a href="#deserts" class="nav-link px-2">Десерты</a></li>
			<li class="ellipse">&#8226;</li>
			<li><a href="#gifts" class="nav-link px-2">Наборы</a></li>
		  </ul>
		</div>
		

	  		<svg width="30" height="2" class="mb-2"><rect width="30" height="2" style="fill:#75453e;" id="drinks"/></svg>
	  		<h3 class="text-uppercase py-5 fw-bold animate__animated" >Наши вкуснейшие напитки</h3>
			<div class="row"> 	
			<?php foreach ($info_drinks as $data): ?>
				<div class=" col-11 col-xs-12 col-md-12 col-sm-7 col-lg-4 product  animate__animated">
					<div class="card product-content product-wrap text-start">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<div class="product-image"> 
								<img src="<?= $data['img']; ?>" style="" alt="img" > 
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="product-deatil">
								<h2 class="name"><?= $data['name']; ?></h2>
								<p style="padding-bottom: 0rem; color:gray; overflow: visible;"><?= $data['description']; ?></p>
						</div>
						<div class="description">
							<div class="product__size">
							<div class="product__size-element product__size-element_active" data-sb-curent-price="<?= $data['price200ml'];?>" data-sb-curent-size="200" data-sb-curent-id-or-vendor-code="00<?= $data['id'];?>">200мл</div> 
							<div class="product__size-element" data-sb-curent-price="<?= $data['price300ml'];?>" data-sb-curent-size="300" data-sb-curent-id-or-vendor-code="010<?= $data['id'];?>">300мл</div> 								
							<div class="product__size-element" data-sb-curent-price="<?= $data['price400ml'];?>" data-sb-curent-size="400" data-sb-curent-id-or-vendor-code="020<?= $data['id'];?>">400мл</div>
							</div>
							<div class="product__quantity"></div>
						</div>
						<div class="product-info">
							<div class="d-flex">
							<h2><div class="product__price d-flex"><span class="product__price-number"><?= $data['price200ml'];?></span> <span class="rubl">&#x20bd;</span></div></h2>
									<div class="col-10 col-md-12 col-sm-10 col-xs-12"> 
										<button type="button" class="w-50 btn btn-primary button-shop" data-sb-id-or-vendor-code="00<?= $data['id'];?>" data-sb-product-name="<?= $data['name']; ?>" data-sb-product-price="<?= $data['price200ml'];?>" data-sb-product-quantity="1" data-sb-product-size="200">В корзину</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		  <svg width="30" height="2" class="mb-2"><rect width="30" height="2" style="fill:#75453e;" id="deserts"/></svg>
		  <h3 class="text-uppercase py-5 fw-bold animate__animated" >Наши сладкие десерты</h3>
		  <div class="row"> 	
			<?php foreach ($info_deserts as $data): ?>
				<div class="col-11 col-xs-12 col-md-4 col-sm-7 product  animate__animated gifts">
					<div class="card product-content product-wrap text-start ">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<div class="product-image"> 								
								<img src="<?= $data['img']; ?>" style="" alt="img" > 
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="product-deatil">
								<h2 class="name"><?= $data['name']; ?></h2>
								<p style="padding-bottom: 0rem; color:gray; overflow: visible;"><?= $data['description']; ?></p>
						</div>
						<div class="description">
							<div class="product__quantity"></div>
						</div>
						<div class="product-info">
							<div class="d-flex">
							<h2><div class="product__price d-flex"><span class="product__price-number"><?= $data['price'];?></span> <span class="rubl">&#x20bd;</span></div></h2>
									<div class="col-10 col-md-12 col-sm-10 col-xs-12"> 
										<button type="button" class="w-50 btn btn-primary button-shop" data-sb-id-or-vendor-code="0<?= $data['id'];?>" 
										data-sb-product-name="<?= $data['name']; ?>" data-sb-product-price="<?= $data['price'];?>" data-sb-product-quantity="1">В корзину</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
		  <svg width="30" height="2" class="mb-2"><rect width="30" height="2" style="fill:#75453e;" id="gifts"/></svg>
		  <h3 class="text-uppercase py-5 fw-bold animate__animated" >Подарочные наборы</h3>
		  <div class="row"> 	
			<?php foreach ($info_gifts as $data): ?>
				<div class="col-11 col-xs-12 col-md-4 col-sm-7 product  animate__animated ">
					<div class="card product-content product-wrap text-start">
						<div class="col-md-12 col-sm-12 col-xs-12 text-center">
							<div class="product-image"> 								
								<img src="<?= $data['img']; ?>" style="" alt="img" width="95%" > 
							</div>
						</div>
						<div class="col-md-12 col-sm-12 col-xs-12">
						<div class="product-deatil">
								<h2 class="name"><?= $data['name']; ?></h2>
								<p style="padding-bottom: 0rem; color:gray; overflow: visible;"><?= $data['description']; ?></p>
						</div>
						<div class="description">
							<div class="product__quantity"></div>
						</div>
						<div class="product-info">
							<div class="d-flex">
							<h2><div class="product__price d-flex"><span class="product__price-number"><?= $data['price'];?></span> <span class="rubl">&#x20bd;</span></div></h2>
									<div class="col-10 col-md-12 col-sm-10 col-xs-12"> 
										<button type="button" class="w-50 btn btn-primary button-shop" data-sb-id-or-vendor-code="000<?= $data['id'];?>" data-sb-product-name="<?= $data['name']; ?>" data-sb-product-price="<?= $data['price'];?>" data-sb-product-quantity="1">В корзину</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
			</div>
	  </div>
	  <div class="container py-5 section6 text-center" id="reviews"><!-- ОТЗЫВЫ -->
		<h1 class="fw-bold text-start animate__animated">Отзывы наших любимых гостей</h1>
			<div class="row row-cols-md-2 py-5">
			<?php foreach ($info_reviews as $data): ?>
				<div class="col-md py-2">
					<div class="card mb-4 rounded-3 animate__animated">
						<div class="text-center">
						<div class="review-image">
						<img src="<?= $data['img']; ?>" alt="1">
						</div>
						</div>

						<div class="card-body">
						<h2><?= $data['name']; ?></h2>
						<p class="mb-4"><?= $data['feedback']; ?></p>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
		<div class="container py-5 section7" id="contacts"><!-- КОНТАКТЫ -->
			<div class="row">
				<div class="col">
					<h1 class="fw-bold offset-1 ">Где нас найти?</h1>
					<ul>
					<a href="https://yandex.ru/maps/10959/kamishin/house/volgogradskaya_ulitsa_47a/YEwYdQFoQUUEQFtqfXx3eHxqYQ==/?from=mapframe&ll=45.368802%2C50.069378&source=mapframe&utm_source=mapframe&z=17">
						<li>
						<div>
							<i class="bi bi-geo-alt"></i>
						</div>
						<div><span>ул. Волгоградская, дом 19</span></div>
						</li>
					</a>
						<a href="mailto:coffeetimekam@yandex.ru">
						<li>
								<div><i class="bi bi-envelope"></i></div>
								<div><span>coffeetimekam@yandex.ru</span></div>	
						</li>
					</a>
					<a href="https://vk.com/coffeetimekam">
						<li>
								<div><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill:#75453e;"><path class="st0" d="M13.162 18.994c.609 0 .858-.406.851-.915-.031-1.917.714-2.949 2.059-1.604 1.488 1.488 1.796 2.519 3.603 2.519h3.2c.808 0 1.126-.26 1.126-.668 0-.863-1.421-2.386-2.625-3.504-1.686-1.565-1.765-1.602-.313-3.486 1.801-2.339 4.157-5.336 2.073-5.336h-3.981c-.772 0-.828.435-1.103 1.083-.995 2.347-2.886 5.387-3.604 4.922-.751-.485-.407-2.406-.35-5.261.015-.754.011-1.271-1.141-1.539-.629-.145-1.241-.205-1.809-.205-2.273 0-3.841.953-2.95 1.119 1.571.293 1.42 3.692 1.054 5.16-.638 2.556-3.036-2.024-4.035-4.305-.241-.548-.315-.974-1.175-.974h-3.255c-.492 0-.787.16-.787.516 0 .602 2.96 6.72 5.786 9.77 2.756 2.975 5.48 2.708 7.376 2.708z"/></svg></div>
								<div><span>vk.com/coffeetimekam</span></div>
						</li>
					</a>
					<a href="telto:89025554545">
						<li>
							<div><i class="bi bi-telephone-fill"></i></div>
							<div><span>8-902-555-45-45</span></div>
						</li>
					</a>
					</ul>
					<h1 class="fw-bold offset-1 ">График работы</h1>
					<ul>
						<li>Пн-Пт 09:00 - 21:00</li>
						<li>Сб-Вс 12:00 - 21:00</li>
					</ul>
				</div>
				<div class="col">
				<div style="position:relative;overflow:hidden;" class="offset-1"><a href="https://yandex.com/maps/10959/kamishin/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Камышин</a><a href="https://yandex.com/maps/10959/kamishin/house/volgogradskaya_ulitsa_19/YEwYdQ5iSkwFQFtqfXx2cnpiYg==/?ll=45.392625%2C50.073647&utm_medium=mapframe&utm_source=maps&z=17.15" style="color:#eee;font-size:12px;position:absolute;top:14px;">Яндекс Карты — транспорт, навигация, поиск мест</a><iframe src="https://yandex.com/map-widget/v1/?ll=45.392625%2C50.073647&mode=search&ol=geo&ouri=ymapsbm1%3A%2F%2Fgeo%3Fdata%3DCgoxNTE2NDI1MzA3EnLQoNC-0YHRgdC40Y8sINCS0L7Qu9Cz0L7Qs9GA0LDQtNGB0LrQsNGPINC-0LHQu9Cw0YHRgtGMLCDQmtCw0LzRi9GI0LjQvSwg0JLQvtC70LPQvtCz0YDQsNC00YHQutCw0Y8g0YPQu9C40YbQsCwgMTkiCg3QkTVCFWFLSEI%2C&z=17.15" width="560" height="400" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
				</div>
			</div>
		</div>
		<footer class="text-center text-lg-starttext-muted">
			<section class="p-4">
			  <div class="container text-center text-md-start mt-5">
				<div class="row mt-3">
				  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
					 <img src="img/logocoffeetime.png" alt="logotype" width="70%">
					</h6>
					<p>
					Мы будем очень рады видеть вас у нас в гостях, и ценим, что вы рассматриваете нашу кофейню в качестве места для проведения вашего досуга!
					</p>
				  </div>
				  <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
					  Меню
					</h6>
					<p>
					  <a href="#drinks" class="text-reset">Напитки</a>
					</p>
					<p>
					  <a href="#deserts" class="text-reset">Десерты</a>
					</p>
					<p>
					  <a href="#gifts" class="text-reset">Подарочные наборы</a>
					</p>
				  </div>
				  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
					<h6 class="text-uppercase fw-bold mb-4">
					  Навигация
					</h6>
					<p>
					  <a href="#header" class="text-reset">Главная</a>
					</p>
					<p>
					  <a href="#about-us" class="text-reset">О нас</a>
					</p>
					<p>
					  <a href="#reviews" class="text-reset">Отзывы</a>
					</p>
				  </div>
				  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
					<h6 class="text-uppercase fw-bold mb-4">Контакты</h6>
					<p>ул. Волгоградская, дом 19</p>
					<p>
					  coffeetimekam@gmail.com
					</p>
					<p>8-902-555-45-45</p>
				  </div>
				</div>
			  </div>
			</section>
			<div class="text-center p-4" style="color: #75453e;">
			  © 2023 #КофеТайм. Все права защищены.
			</div>
		  </footer>

		<!-- МОДАЛЬНЫЕ ОКНА -->
		<div class="modal fade" id="faq" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true"> <!-- FAQ -->
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">
				  <div class="modal-header">
						<h5 class="modal-title" id="modalLabel">Часто задаваемые вопросы</h5>
						<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Закрыть"></button>
				  </div>
				  <div class="modal-body">
					<li class="mb-1" style="list-style: none;">
						<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#zakaz" aria-expanded="true">
						 <span class="fw-bold">Как оплатить заказ?</span>
						</button>
						<div class="collapse" id="zakaz">
							<h4>Заказ оплачивается наличными или картой при самовывозе или при доставке курьером.</h4>
						</div>
					  </li>
					  <li class="mb-1" style="list-style: none;">
						<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#dostavka" aria-expanded="true">
						 <span class="fw-bold">Как происходит доставка заказа?</span>
						</button>
						<div class="collapse" id="dostavka">
							<h4>Варианты доставки заказа:</h4>
						  <ul class="">
							<li>Самовывоз из нашей кофейни</li>
							<li>Доставка курьером в пределах г. Камышина</li>
						  </ul>
						</div>
					  </li>
					  <li class="mb-1" style="list-style: none;">
						<button class="btn btn-toggle align-items-center rounded collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse3" aria-expanded="true">
						 <span class="fw-bold">Какая разница между латте и капучино?</span>
						</button>
						<div class="collapse" id="home-collapse3">
						  <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
							<li>Латте и капучино - это два разных напитка. Латте состоит из эспрессо, молока и молочной пены, в то время как капучино состоит из эспрессо, равного количества молока и молочной пены. Капучино обычно более крепкий и имеет более плотную пену, чем латте.</li>
						  </ul>
						</div>
					  </li>
				  </div>
				</div>
			  </div>
		</div>
		<!-------------------------------------- TOASTS -->
		<div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3" data-delay="1000">
			<div id="skidka1" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			  <div class="toast-header">
				<img src="img/site-icon.png" class="rounded me-2" alt="icon" width="5%">
				<strong class="me-auto" style="color:#75453e">-10% от всех покупок</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
			  </div>
			  <div class="toast-body">
				Если вы сомневались раньше, то сейчас лучшее время для покупок! Поспешите посетить нашу кофейню и приобрести вкусные напитки и десерты по лучшей цене!
			  </div>
			</div>
		  </div>
		  <div class="toast-container position-fixed bottom-0 start-50 translate-middle-x p-3" data-delay="1000">
			<div id="skidka2" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
			  <div class="toast-header">
				<img src="img/site-icon.png" class="rounded me-2" alt="icon" width="5%">
				<strong class="me-auto" style="color:#75453e">Получи десерт в подарок!</strong>
				<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Закрыть"></button>
			  </div>
			  <div class="toast-body">
				С 1 июня до 17 июля 2023 года при любой покупке от 1000 рублей в нашей кофейне #КофеТайм, вы получаете десерт "Чизкейк с ягодами" в подарок к заказу.
			  </div>
			</div>
		  </div>
			  
			  <!-- ЗЕРНА -->
			<div class="beans bean-1 animate__animated animate__delay-1s"></div>
			<div class="beans bean-2 animate__animated animate__delay-1s"></div>
			<div class="beans bean-3 animate__animated"></div>
			<div class="beans bean-4 animate__animated"></div>
			<div class="beans bean-5 animate__animated"></div>
			<div class="beans bean-6 animate__animated"></div>
			<div class="beans bean-7 animate__animated"></div>
			<div class="beans bean-8 animate__animated"></div>
			<div class="beans bean-9 animate__animated"></div>
			<div class="beans bean-10 animate__animated"></div>
			<div class="beans bean-16 animate__animated"></div>


			<div class="smart-basket__wrapper"></div>

			<script src="./smartbasket/js/smartbasket.min.js"></script>

				<script>
					$(function () {
						$('.smart-basket__wrapper').smbasket({
							productElement: 'product',
							buttonAddToBasket: 'button-shop',
							productPrice: 'product__price-number',
							productSize: 'product__size-element',
							
							productQuantityWrapper: 'product__quantity',
							smartBasketMinArea: 'bag',
							countryCode: '+7',
							smartBasketCurrency: '₽',
							smartBasketMinIconPath: './smartbasket/img/shopping-basket-wight.svg',

							agreement: {
								isRequired: true,
								isChecked: true,
								isLink: 'privacy.html',
							},
							nameIsRequired: false,
						});
					});
				</script>


			</body>
<script src="js/main.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/rellax.min.js"></script>
<script>
	const rellax = new Rellax(".rellax");
  </script>
<script src="js/animscroll.js"></script>
</html>

