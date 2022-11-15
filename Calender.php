<?php

$yearMonth = isset($_GET['yearMonth']) ? $_GET['yearMonth'] : date('Y-m');

$timestamp = strtotime($yearMonth . '-01');
if ($timestamp === false) {
    $yearMonth = date('Y-m');
    $timestamp = strtotime($yearMonth . '-01');
}

$today = date('Y-m-j', time());


$year = date('Y', $timestamp);
$month = date('m', $timestamp);
$dateObj   = DateTime::createFromFormat('!m', $month);
$monthName = $dateObj->format('F');
$html_title = $monthName . '-' . $year;

$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) - 1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp) + 1, 1, date('Y', $timestamp)));

$day_count = date('t', $timestamp);

$str = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));


$weeks = array();
$week = '';

$week .= str_repeat('<td></td>', $str);

for ($day = 1; $day <= $day_count; $day++, $str++) {

    $date = $yearMonth . '-' . $day;

    if ($today == $date) {
        $week .= '<td class="today">' . $day;
    } else {
        $week .= '<td>' . $day;
    }
    $week .= '</td>';

    if ($str % 7 == 6 || $day == $day_count) {

        if ($day == $day_count) {
            $week .= str_repeat('<td></td>', 6 - ($str % 7));
        }

        $weeks[] = '<tr>' . $week . '</tr>';

        $week = '';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>PHP Calendar</title>
    <style>
        body {
             background-color: url("../images/pc.jpg");
             background-size: cover;
             background-repeat: no-repeat;
        }
        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-top: 80px;
            margin-bottom: 80px;
            margin-left: 80px;
            margin-right: 80px;
            border:2px solid black;
            font-family: serif;
            border-collapse: collapse;
            table-layout: fixed;
            font-weight: bold;
            background-color: yellow;
        }

        h3 {
            margin-bottom: 30px;
        }

        th {
            padding: 15px;
            background: green;
            height: 30px;
            color:white;
            font-family: arial black;
        }

        td {
            padding: 15px;
            height:100px;
            width:100px;
            background: #00264d;
            text-align: center;
            color:yellow;
        }
         tr {
             padding:15px;
         }
     
          td:hover{
             background:green;
          }

        .today {
            background: green;
        }

        th:nth-of-type(7),
        td:nth-of-type(7) {
            color: red;
        }

        a {
            text-decoration: none;
            color: blueviolet;
        }

        a:active {
            text-decoration: none;
            color: black;
        }

        a:hover {
            color: green;
        }
    </style>
</head>

<body>
    <div class="container">
        <h3><a href="?yearMonth=<?php echo $prev; ?>">Prev</a> <?php echo $html_title; ?> <a href="?yearMonth=<?php echo $next; ?>">Next</a></h3>
       <table>         
            <tr>
                <th>Sunday</th>
                <th>Monday</th>
                <th>Tuesday</th>
                <th>Wednesday</th>
                <th>Thursday</th>
                <th>Friday</th>
                <th>Saturaday</th>
            </tr>
            <?php
            foreach ($weeks as $week) {
                echo $week;
            }
            ?>
        </table>
    </div>
</body>