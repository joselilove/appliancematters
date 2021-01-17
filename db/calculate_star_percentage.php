<?php
require 'connect.php';

$selectStar = "SELECT * FROM `ratings`";

$result = mysqli_query($connect, $selectStar);

$ratingData = [];
while ($row = mysqli_fetch_array($result)) {
    array_push(
        $ratingData,
        $row['star']
    );
}


$ratingPercentage = [
    [
        'star_name' => 'star-1',
        'percentage' => getPercentagePerStar($ratingData, 1) . '%'
    ],
    [
        'star_name' => 'star-2',
        'percentage' => getPercentagePerStar($ratingData, 2) . '%'
    ],
    [
        'star_name' => 'star-3',
        'percentage' => getPercentagePerStar($ratingData, 3) . '%'
    ],
    [
        'star_name' => 'star-4',
        'percentage' => getPercentagePerStar($ratingData, 4) . '%'
    ],
    [
        'star_name' => 'star-5',
        'percentage' => getPercentagePerStar($ratingData, 5) . '%'
    ]
];

echo json_encode($ratingPercentage);

function getPercentagePerStar($ratingData, $star)
{
    $totalAllStar = getTotalStar($ratingData);
    $totalPerStar = getTotalPerStar($ratingData, $star);
    $result = getStarPercentage($totalAllStar, $totalPerStar);
    return $result;
}

function getTotalStar($ratingData)
{
    $total = 0;
    for ($i = 0; $i < count($ratingData); $i++) {
        $total++;
    }
    return $total;
}

function getTotalPerStar($ratingData, $star)
{
    $total = 0;
    for ($i = 0; $i < count($ratingData); $i++) {
        if ($ratingData[$i] == $star) {
            $total++;
        }
    }
    return $total;
}

function getStarPercentage($totalAllStar, $totalPerStar)
{
    $percentage = $totalPerStar / $totalAllStar;
    $percentage *= 100;
    return $percentage;
}
