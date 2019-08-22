<?php
session_start();
    include('bd.php'); // Подключение БД
    // Достаем всё из БД 
    $result = $mysqli->query("SELECT * FROM `users` ORDER by id DESC"); // $result - двумерный массив
    $i=0;
    echo '<meta charset="utf-8"><br>';
    while ($row = $result->fetch_assoc()) {
        //echo '<br>user_name: '.$row["name"].'<br>';
            $user_name = $row["name"];
            $user_time = $row["time"];
            $user_date = $row["date"];
            $user_comment = $row["comment"];
           // echo '$user_name: '.$user_name.'<br>';
        echo '<div class="row">
                <div class="col-sm-2">
                    <h6 id="user_name" style="font-weight:bold;">'.$user_name.'</h6>
                </div>
                <div id="user_time" class="col-sm-1">
                    <time>'.$user_time.'</time>
                </div>
                <div id="user_date" class="col-sm-2">
                    <date>'.$user_date.'</date>
                </div>
            </div>
            <p id="user_comment" style="font-size:10pt;">'
                .$user_comment.'
            </p>';
            $i++;
    }
?>