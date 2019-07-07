<?php session_start();

    $i=0;
    $item='';
    $title='';
    $price='';
            
    foreach($_SESSION['photo'] as $item){
        $id=$_SESSION['id'][$i];// Уникальный номер карточки в таблице `balalaiki` БД
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
                            
                <!-- Передаём $id в карточку изменения для получения соответствующей строчки из таблицы в БД-->
                            <a href="change_info_card.php?id='.$id.'" class="btn btn-primary">Изменить</a>

                            <form action="delete_info.php" method="POST" style="display:inline;">
                                <input type="hidden" name="info" value="'.$item.'" >
                                <input type="hidden" name="ind" value="'.$i.'" >
                                <input type="submit" class="btn btn-warning" value="Удалить">
                            </form>
                          </div>
                        </div>';
            $i++;
    }
    unset($item);
?>

