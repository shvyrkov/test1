<?php
include('simple_html_dom.php'); // Подключение библиотеки для парсинга
header("Content-type: text/html; charset=utf-8"); // Выставление кодировки
$html = new simple_html_dom(); // Создание объекта типа класса библиотеки
$html->load_file('https://www.avito.ru/moskva/gruzoviki_i_spetstehnika/avtobusy?q=%D0%B0%D0%B2%D1%82%D0%BE%D0%B1%D1%83%D1%81&sgtd=21'); // Страница для парсинга
$html->save(); // в документации написано так сделать
//echo $html; //http://shvyrkov.beget.tech/avito/ - будет выведена страница  для парсинга
//http://vozhzhaev.ru/0248/avito/ - образец
//Надо достать объявления с авито и разместить у нас

//Из документации simplehtmldom, item... - классы из Avito, где лежит объявление о продаже ч.-л.
foreach($html->find('div[class="item item_table clearfix js-catalog-item-enum  item-with-contact js-item-extended"]') as $div) {
//echo $div;
    //Внутри выбранного div с указанным классом ищем ссылку а с указанным классом
    foreach($div->find('a[class="item-description-title-link"]') as $link) { //Вытаскиваем текст без тегов и пр. - и получаем список автобусов
        echo $link->plaintext.'<br><br>'; //Вытаскиваем текст без тегов и пр. - и получаем список автобусов
    }
   // foreach($div->find('img') as $img)   //Вытаскиваем картинки
   //     echo $img.'<hr>';
   echo $div->find('span[class^="price"]', 0).'<br>';//класс начинается с price
   echo $div->find('img', 0).'<hr>'; //Вывод картинки по заданной подписи
   
}
?>
