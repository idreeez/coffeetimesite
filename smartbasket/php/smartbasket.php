<? 
use PHPMailer\PHPMailer\PHPMailer;
require_once($_SERVER['DOCUMENT_ROOT'] . '/smartbasket/php/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if (isset($_POST['userName']) ) {
			if(empty($_POST['userName'])) {
				echo 'notName';
			} else {
				$name = "<b>Имя: </b>" . strip_tags($_POST['userName']) . "<br>";
			}
		}
		if (isset($_POST['userTel']) ) {
			if(empty($_POST['userTel'])) {
				echo 'notTel';
			} else {
				$tel = "<b>Телефон: </b>" . strip_tags($_POST['userTel']) . "<br>";
			}
		}

		if (isset($_POST['userEmail']) ) {
			if(empty($_POST['userEmail'])) {
				$email = "<b>Email: почта не указана </b> <br>";
			} else {
				$email = "<b>Email: </b>" . strip_tags($_POST['userEmail']) . "<br>";
			}
		}

        if (isset($_POST['finalPrice']) ) {
            $finalPrice = "<b>Общая стоимость: </b>" . strip_tags($_POST['finalPrice']) . "<br>";
        }



		$productArr=[];
		$counter = 0;
		$body;
		$bodyHeader = '<table border="0" cellpadding="0" cellspacing="0" style="border-bottom:1px; border-right:1px; border-color:#e2e2e2; border-style: solid; width:800px" width="800" align="center">
			<tr>
				<th colspan="5" style="width: 800px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">' . $name .'</th>
			</tr>
			<tr>
				<th colspan="5" style="width: 800px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">' . $tel .'</th>
			</tr>
			<tr>
			<th colspan="5" style="width: 800px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">'. $finalPrice .'</th>
			</tr>
			<tr>
				<th colspan="5" style="width: 800px; padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;">' . $email .'</th>
			</tr>';

		foreach ($_POST as $key =>  $value) {
			$body.= '<tr>';
			if (is_array($value) || $value instanceof Traversable) {
				foreach ($value as $k => $v) {
					if($k == 'productName'){
						$body.=
							'<td style="width: 300px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
											<div style="padding: 5px;">
											'
							. $v .
							'
											</div></td>';
					}
					if($k == 'productSize'){
						if(!empty($v)){
							$body.=
								'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
											<div style="padding: 5px;"> Размер: 
											'
								. $v .
								'
											</div></td>';
						} else {
							$body.=
								'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
									<div style="padding: 5px;"> </div>
								</td>';
						}
					}
					if($k == 'productPrice'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;"> Цена: 
												'
							. $v .
							'
												</div></td>';
					}
					if($k == 'productQuantity'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;"> Кол-во: 
												'
							. $v .
							'
												</div></td>';
					}

					if($k == 'productPriceCommon'){
						$body.=
							'<td style="width: 100px;  padding-top:15px; padding-bottom:15px; padding-right:15px; padding-left:15px; text-align:center; border-top:1px; border-left:1px; border-right:0; border-bottom:0; border-color:#e2e2e2; border-style: solid;" >
												<div style="padding: 5px;"> Общая цена:
												'
							. $v .
							'
												</div></td>';
					}

				}

				$body.= '</tr>';
			}
            
		};
		$bodybottom = '</table>';
	}
	
	if(defined('HOST') && HOST != '') {
		$mail = new PHPMailer;
		$mail->isSMTP();
		$mail->Host = HOST;
		$mail->SMTPAuth = true;
		$mail->Username = LOGIN;
		$mail->Password = PASS;
		$mail->SMTPSecure = 'ssl';
		$mail->Port = PORT;
		$mail->AddReplyTo(SENDER);
	} else {
		$mail = new PHPMailer;
	}

		$mail->setFrom(SENDER);
    $mail->addAddress(CATCHER);
    if(defined(CATCHER)){
        $mail->addAddress(CATCHER);
    }
    $mail->CharSet = CHARSET;
    $mail->isHTML(true);
		$mail->Subject = $SUBJECT; // Заголовок письма
		$mail->Body = "$bodyHeader $body $bodybottom";
		if(!$mail->send()) {
            echo 'attantion';

        } else {
            // echo '<p class="smartlid__respond-success">' . SUCCESSMSGS . '</p>';
            echo 'successmsgs';
        }
}             
require_once '../../connection.php';

$userName = $_POST['userName'];
$userTel = $_POST['userTel'];
$finalPrice = $_POST['finalPrice'];

if (empty($_POST['userEmail'])) {
    $userEmail = 'email не указан';
} else {
    $userEmail = $_POST['userEmail'];
}

try {
    // Вставка данных в таблицу "orders"
    $insertOrderQuery = "INSERT INTO orders (userName, userTel, userEmail, finalPrice, orderDate) VALUES (:userName, :userTel, :userEmail, :finalPrice, NOW())";
    $orderStatement = $db->prepare($insertOrderQuery);
    $orderStatement->bindParam(':userName', $userName);
    $orderStatement->bindParam(':userTel', $userTel);
    $orderStatement->bindParam(':userEmail', $userEmail);
    $orderStatement->bindParam(':finalPrice', $finalPrice);
    $orderStatement->execute();

    $orderId = $db->lastInsertId();

    // Вставка данных в таблицу "ordersItems"
    foreach ($_POST as $key => $value) {
        if (is_array($value) || $value instanceof Traversable) {
            $productName = "";
            $productSize = "";
            $productPrice = 0;
            $productQuantity = 0;
            $productPriceCommon = 0;

            foreach ($value as $k => $v) {
                if ($k == 'productName') {
                    $productName = $v;
                }
                if ($k == 'productSize') {
                    $productSize = $v;
                }
                if ($k == 'productPrice') {
                    $productPrice = floatval($v);
                }
                if ($k == 'productQuantity') {
                    $productQuantity = intval($v);
                }
                if ($k == 'productPriceCommon') {
                    $productPriceCommon = floatval($v);
                }
            }

            $insertOrderItemQuery = "INSERT INTO ordersItems (orderId, productName, productSize, productPrice, productQuantity, productPriceCommon) VALUES (:orderId, :productName, :productSize, :productPrice, :productQuantity, :productPriceCommon)";
            $orderItemStatement = $db->prepare($insertOrderItemQuery);
            $orderItemStatement->bindParam(':orderId', $orderId);
            $orderItemStatement->bindParam(':productName', $productName);
            $orderItemStatement->bindParam(':productSize', $productSize);
            $orderItemStatement->bindParam(':productPrice', $productPrice);
            $orderItemStatement->bindParam(':productQuantity', $productQuantity);
            $orderItemStatement->bindParam(':productPriceCommon', $productPriceCommon);
            $orderItemStatement->execute();
        }
    }

    echo 'success';
} catch (PDOException $e) {
    echo 'Error: ' . $e->getMessage();
}
?>