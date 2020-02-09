<?php
require 'connect.php';

$name = $_POST['name'];
$email = mysqli_real_escape_string($connect, $_POST['email']);
$review = mysqli_real_escape_string($connect, $_POST['review']);
$star = (isset($_POST['star'])) ? $_POST['star'] : 0;
$agree = (isset($_POST['agree'])) ? $_POST['agree'] : '';
$data = validate($name, $email, $review, $star, $agree);

if ($data === true) {
    $name = mysqli_real_escape_string($connect, $name);
    $email = mysqli_real_escape_string($connect, $email);
    $review = mysqli_real_escape_string($connect, $review);
    $star = mysqli_real_escape_string($connect, $star);
    $agree = mysqli_real_escape_string($connect, $agree);

    $insertUser = "INSERT INTO `users` (`id`, `name`, `email`, `api_id`, `deleted`, `created`, `modified`) VALUES (NULL, '" . $name . "', '" . $email . "', NULL, '0', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);";
    $userResult = mysqli_query($connect, $insertUser);

    $userId = mysqli_insert_id($connect);
    $data = $userId;
    $insertStar = "INSERT INTO `ratings` (`user_id`, `star`) VALUES (" . $userId . ", " . $star . ");";
    $starResult = mysqli_query($connect, $insertStar);

    $insertReview = "INSERT INTO `reviews` (`user_id`, `description`) VALUES (" . $userId . ", '" . $review . "');";
    $reviewResult =  mysqli_query($connect, $insertReview);

    if ($userResult === true && $starResult === true && $reviewResult === true) {
        $data = 'success';
    } else {
        $data = mysqli_error($connect);
    }
}
echo $data;

function validate($name, $email, $review, $star, $agree)
{
    $validation = [];
    $error_validation = false;
    // name start
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

    if (strlen($name) > 45) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'name',
                'id' => 'NAME_LIMIT',
                'message' => 'Maximum characters are 45 only'
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
    // emil start
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

    if (strlen($email) > 45) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'email',
                'id' => 'EMAIL_LIMIT',
                'message' => 'Maximum characters are 45 only'
            ]
        );
    }

    // review
    if (ctype_space($review) || $review == '') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'review',
                'id' => 'REVIEW_EMPTY',
                'message' => 'Review is required'
            ]
        );
    }

    if (strlen($review) > 2000) {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'review',
                'id' => 'REVIEW_LIMIT',
                'message' => ' Maximum characters are 2000 only'
            ]
        );
    }

    //star
    if (!empty($star)) {
        if ((!filter_var($star, FILTER_VALIDATE_INT))) {
            $error_validation = true;
            array_push(
                $validation,
                [
                    'field_name' => 'rating',
                    'id' => 'RATING_IS_NUMBER',
                    'message' => 'Rating is required'
                ]
            );
        } else if ((int) $star < 1 && (int) $star > 5) {
            $error_validation = true;
            array_push(
                $validation,
                [
                    'field_name' => 'rating',
                    'id' => 'RATING_IS_GREATER_TO_0_AND_LESS_THAN_6',
                    'message' => 'Rating is required'
                ]
            );
        }
    }

    // agree
    if ($agree != 'on') {
        $error_validation = true;
        array_push(
            $validation,
            [
                'field_name' => 'agree',
                'id' => 'AGREE_EMPTY',
                'message' => 'You must agree before submitting'
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
