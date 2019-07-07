<?php session_start();

    $i=0;
    $item='';
    $title='';
    $price='';
    //echo '$_SESSION[\'photo\']['.$i.']: '.$_SESSION['photo'][$i].'<br>';
    //echo '$_SESSION[\'title\']['.$i.']: '.$_SESSION['title'][$i].'<br>';
            
    foreach($_SESSION['photo'] as $item){
        $title=$_SESSION['title'][$i];
        $price=$_SESSION['price'][$i];
        $tel=$_SESSION['tel'][$i];
        $metro=$_SESSION['metro'][$i];
        $description=$_SESSION['description'][$i];
        
        echo '
            <div id="'.$i.'" class="card my-3" style="width: 16rem;">
                          <img src="store/'.$item.'" class="card-img-top" alt="Фото инструмента">
                          <div class="card-body">
                            <h5 class="card-title">Название: '.$title.'</h5>
                            <p class="card-text">Цена: '.$price.'р.</p>
                            <p class="card-text">Телефон: '.$tel.'<p>
                            <p class="card-text">Метро: '.$metro.'</p>
                            <p class="card-text">Описание: '.$description.'</p>
                            <form action="delete_info.php" method="POST">
                                <input type="hidden" name="info" value="'.$item.'" >
                                <input type="hidden" name="ind" value="'.$i.'" >
                                <button type="submit" class="btn btn-warning">Удалить</button>
                            </form>
                          </div>
                        </div>';
            $i++;
    }
    unset($item);
  
/*
    $item='';
    for($i=0; $i<count($_SESSION['photo']); $i++){
        $item=$_SESSION['photo'][$i];
        echo '
            <div id="'.$i.'" class="card my-3" style="width: 16rem;">
              <img src="store/'.$item.'" class="card-img-top" alt="Фото инструмента">
              <div class="card-body">
                <h5 class="card-title">Название карточки</h5>
                <p class="card-text">'.$item.'</p>
                <form action="delete_info.php" method="POST">
                    <input type="text" name="info" value="'.$item.'" ><br>
                    <input type="text" name="ind" value="'.$i.'" ><br>
                    <button type="submit" class="btn btn-primary">Удалить</button>
                </form>
              </div>
            </div>';
    }
*/
//    echo '<meta http-equiv="refresh" content="8; URL='.$_SERVER['HTTP_REFERER'].'">';

?>