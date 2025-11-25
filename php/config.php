<?php
    require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/phpmailer.php');
	require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/phpmailer/smtp.php');
	const HOST = 'smtp.yandex.ru';
	const LOGIN = 'coffeetimekam';
	const PASS = 'stexbwcilryklkjh';
	const PORT = '465';

    const SENDER = 'coffeetimekam@yandex.ru';
    const CATCHER = 'coffeetimekam@yandex.ru';
    $orderNumber = uniqid('', true);
    $orderIdInt = hexdec(substr($orderId, 0, 8));
    $SUBJECT = 'Новый заказ';
    const CHARSET = 'UTF-8';
    