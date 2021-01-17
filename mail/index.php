<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = new PHPMailer(true);
    $name = $_POST['name'];
    $subject = $_POST['subject'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $model = $_POST['model'];
    $image = $_POST['file'];
    $status = $_POST['status'];
    $appliance_name = $_POST['appliance_name'];
    $quantity = 1;
    if (!empty($_POST['quantity'])) {
        $quantity = $_POST['quantity'];
    }
    $totalPrice = 85 * $quantity;
    $data;
    $data = validate($name, $subject, $email, $message, $phone_number, $address, $model, $quantity);
    if ($data === true && $status == 'noError') {
        try {
            // $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'joselin.portfolio.system@gmail.com';
            $mail->Password   = '12345678zZ';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            //Recipients
            if ($email == "") {
                $email = 'joselin.portfolio.system@gmail.com';
            }
            $mail->setFrom($email, $name);
            $mail->addAddress('joselin.portfolio.system@gmail.com', 'Appliance Matter');
            $mail->addReplyTo($email, $name);

            // Content
            $mail->isHTML(true);
            if ($subject == '') {
                $subject = 'Appliance Matters';
            }
            $mail->Subject = $subject;
            $body = '<html>
                  <head>
                  <meta name="viewport" content="width=device-width" />
                  </head>
                  <body style="margin:0px; background: #f8f8f8; ">
                  <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
                  <div style="max-width: 700px; padding:50px 0;  margin: 0px auto; font-size: 14px">
                  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                  <tbody>
                  <tr>
                  <td align="center">
                  </tr>
                  </tbody>
                  </table>
                  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tbody>
                  <tr>
                  <td style="background:#0398fc; padding:20px; color:#fff; text-align:center;"> 
                  <img src="http://appliancematters.ca/images/logo/logo.png" style="border:none; height:60%" >
                  </td>
                  </tr>
                  </tbody>
                  </table>
                  <div style="padding: 40px; background: #fff;">
                  <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                  <tbody>
                  <tr>
                  <td><h3>Dear Appliance Matter,</h3>
                  <p><b>You have new request!</></p>
                  <p>Phone number : +' . $phone_number . '</p>
                  <p>Address : ' . $address . '</p>';

            if (!empty($_POST['appliance_name'])) {
                $body .= '<p>Appliance : ' . $appliance_name . '</p>';
            }

            $body .= ' <p>Quantity : ' . $quantity . '</p>
                  <p>Total Price : $' . $totalPrice . '.00</p>';

            $body .= ' <p>Appliance Model : ' . $model . '</p>
                  <p>' . $message . '</p>
                  - ' . $name . ' </td>
                  <hr>
                  </tr>
                  </tbody>
                  </table>';
            if ($image != '') {
                $body .= '<hr>
          <small>Click the image to view</small> <br>
          <a href="http://appliance-matters.joselin-portfolio.tk/images/upload/' . $image . '">
          <img src="http://appliance-matters.joselin-portfolio.tk/images/upload/' . $image . '" width="100"></a>';
            }
            $body .= '</div>
                  </div>
                  </div>
                  </body>
                  </html>';
            $mail->Body    = $body;

            $mail->send();
            $data = 'success';
        } catch (Exception $e) {
            $data = "failed";
        }
    }
    echo $data;
}


function validate($name, $subject, $email, $message, $phone_number, $address, $model, $quantity)
{
    $validation = [];
    $error_validation = false;

    if (ctype_space($model) || $model == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'model',
                'id' => 'MODEL_EMPTY',
                'message' => 'Model is required'
            ]
        );
    }
    if (ctype_space($address) || $address == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'address',
                'id' => 'ADDRESS_EMPTY',
                'message' => 'Address is required'
            ]
        );
    }
    if ($phone_number == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'phone_number',
                'id' => 'PHONE_NUMBER_EMPTY',
                'message' => 'Phone Number is required; ex: 14378863025'
            ]
        );
    } else {
        if (!is_numeric($phone_number)) {
            $error_validation = true;
            array_push(
                $validation,
                [
                    'field_name' => 'phone_number',
                    'id' => 'PHONE_NUMBER_INVALID',
                    'message' => 'Phone Number is invalid; ex: 14378863025'
                ]
            );
        } else {
            if ($phone_number < 1) {
                $error_validation = true;
                array_push(
                    $validation,
                    [
                        'field_name' => 'phone_number',
                        'id' => 'PHONE_NUMBER_INVALID',
                        'message' => 'Phone Number is invalid; ex: 14378863025'
                    ]
                );
            }
            if (strlen($phone_number) != 11) {
                $error_validation = true;
                array_push(
                    $validation,
                    [
                        'field_name' => 'phone_number',
                        'id' => 'PHONE_NUMBER_INVALID',
                        'message' => 'Phone Number is invalid; ex: 14378863025 (11 digits)'
                    ]
                );
            }
        }
    }
    if (ctype_space($name) || $name == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'name',
                'id' => 'NAME_EMPTY',
                'message' => 'Name is required'
            ]
        );
    }
    if (!preg_match("/^[a-zA-Z .]*$/", $name)) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'name',
                'id' => 'NAME_INVALID',
                'message' => 'Only letters, dot and space are allowed'
            ]
        );
    }

    if (!empty($email)) {
        if (!checkemail($email)) {
            $error_validation = true;
            array_push(
                $validation,
                [
                    'field_name' => 'email',
                    'id' => 'EMAIL_INVALID',
                    'message' => 'Invalid Email format'
                ]
            );
        }
    }
    if (ctype_space($message) || $message == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'message',
                'id' => 'MESSAGE_EMPTY',
                'message' => 'Message is required'
            ]
        );
    }
    if ((!filter_var($quantity, FILTER_VALIDATE_INT))) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'quantity',
                'id' => 'QUANTITY_IS_NUMBER',
                'message' => 'Quantity must be a integer and greater than 0'
            ]
        );
    } else if ($quantity < 1) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'quantity',
                'id' => 'QUANTITY_IS_GREATER_TO_0',
                'message' => 'Quantity must be greater than 0'
            ]
        );
    }
    if (!$error_validation) {
        return true;
    } else {
        return json_encode($validation);
    }
}

function checkemail($str)
{
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}
