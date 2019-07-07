<?php session_start();
    include('bd.php'); // Подключение БД
    
    // Достаем всё из БД
    $balalaiki = $mysqli->query("SELECT * FROM `balalaiki`"); // $balalaiki - двумерный массив
    //$balalaiki = $balalaiki ->fetch_assoc();// Первая строка с фоткой из БД
    $i=0;
    echo '<meta charset="utf-8"><br>';
    while ($row = $balalaiki->fetch_assoc()) {
            //echo '<br>email: '.$row["email"].'    photo: '.$row['photo'].'<br>';
            $_SESSION['photo_shop'][$i] = $row["photo"];
            $_SESSION['title_shop'][$i] = $row["title"];
            $_SESSION['price_shop'][$i] = $row["price"];
            $_SESSION['tel_shop'][$i] = $row["tel"];
            $_SESSION['metro_shop'][$i] = $row["metro"];
            $_SESSION['description_shop'][$i] = $row["description"];
            $_SESSION['email_shop'][$i] = $row["email"];
            
            //echo '$_SESSION[\'photo\']['.$i.']: '.$_SESSION['photo'][$i].'<br>';
            //echo '$_SESSION[\'title\']['.$i.']: '.$_SESSION['title'][$i].'<br>';
            $i++;
        }
    
    $i=0;
    $item='';
    $title='';
    $price='';
    $tel='';
    $metro='';
    $description='';
    $email='';
    //echo '$_SESSION[\'photo\']['.$i.']: '.$_SESSION['photo'][$i].'<br>';
    //echo '$_SESSION[\'title\']['.$i.']: '.$_SESSION['title'][$i].'<br>';
    echo '<div class="row">';        
    foreach($_SESSION['photo_shop'] as $item){
        $title=$_SESSION['title_shop'][$i];
        $price=$_SESSION['price_shop'][$i];
        $tel=$_SESSION['tel_shop'][$i];
        $metro=$_SESSION['metro_shop'][$i];
        $description=$_SESSION['description_shop'][$i];
        $email=$_SESSION['email_shop'][$i];
       
        echo '
            <div class="col-sm-4">
                    <div class="card my-3" style="width: 16rem;">
                        <img src="store/'.$item.'" class="card-img-top" alt="Фото инструмента">
                        <div class="card-body">
                            <h5 class="card-title">Название: '.$title.'</h5>
                            <p class="card-text">Цена: '.$price.'р.</p>
                            <a href="card_bd.php?title='.$title.'&photo='.$item.'&price='.$price.'&tel='.$tel.'&email='.$email.'&metro='.$metro.'&description='.$description.'" class="btn btn-primary">Переход в карточку товара</a>
                        </div>
                    </div>
            </div>';
            $i++;
    }
    unset($item);
    echo '</div>'; 
//    echo '<meta http-equiv="refresh" content="8; URL='.$_SERVER['HTTP_REFERER'].'">';

?>