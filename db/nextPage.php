<?php
require 'connect.php';

$offset = $_POST['offset'];
$page = $_POST['page'];

$selectUser = "SELECT reviews.id, users.name, users.email, ratings.star, reviews.description, reviews.created FROM 
                users, ratings, reviews WHERE ratings.user_id = users.id AND reviews.user_id = users.id and 
                reviews.deleted = 0 order BY reviews.id DESC LIMIT $offset, 3";

$result = mysqli_query($connect, $selectUser);

$data = [];
while ($row = mysqli_fetch_array($result)) {
    $date = new DateTime($row['created']);
    array_push(
        $data,
        [
            'id' => $row['id'],
            'name' => $row['name'],
            'email' => $row['email'],
            'star' => $row['star'],
            'description' => $row['description'],
            'created' => $date->format('d-m-Y h:i:s A'),
            'timeString' => timeago($row['created'])
        ]
    );
}
echo json_encode($data);


function timeago($date)
{
    $timestamp = strtotime($date);

    $strTime = array("second", "minute", "hour", "day", "month", "year");
    $length = array("60", "60", "24", "30", "12", "10");

    $currentTime = time();
    if ($currentTime >= $timestamp) {
        $diff     = time() - $timestamp;
        for ($i = 0; $diff >= $length[$i] && $i < count($length) - 1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . " " . $strTime[$i] . "(s) ago ";
    }
}
