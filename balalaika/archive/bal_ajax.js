    // Функция для определения типа браузера: IE или нет и соответствующей инициализации переменной xmlhttp объектом для передачи данных на сервер
    function getXmlHttp(){ 
        var xmlhttp;
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); // Для новых версий IE
        } // ActiveXObject - объект в IE для передачи данных на сервер
        catch (e) { // e - тип ошибки (Error)
            try {
              xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); // Для старых версий IE
            } 
            catch (E) {
                xmlhttp = false;
            }
        }
       if (!xmlhttp && typeof XMLHttpRequest!='undefined') { // Если это не IE, то ---
          xmlhttp = new XMLHttpRequest(); // XMLHttpRequest - объект, который есть во всех нормальных браузерах
        }
     return xmlhttp;
    }
    
    function sendingForm (formname) { // target - Вход, Регистрация или Выход
        var xmlhttp = getXmlHttp(); // Создаём объект типа XMLHttpRequest
        
        if(formname == 'exit') { // Выход из л.к.
            for(var i=0;i<document.forms[formname].elements.length;i++){ // length-1 - если input, если button, то вычитать 1 не надо
            p += "&"+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value) ;//присваиваем значение 
            }
            xmlhttp.open('POST', 'exit.php', true);
            xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
              xmlhttp.send(p); // Отправляем POST-запрос
              xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      document.location.reload(true);// Перезагрузка страницы, чтобы проставились переменные $_SESSION['name'] и др.
                  }
                }
              };
        }      
        else {
            if(formname == 'enter') var p = 'target=enter';
            else if(formname == 'registration')  p = 'target=registration';
            for(i=0;i<document.forms[formname].elements.length;i++){ // length-1 - если input, если button, то вычитать 1 не надо
            p += "&"+document.forms[formname].elements[i].name+"="+encodeURIComponent(document.forms[formname].elements[i].value) ;//присваиваем значение 
            }
              xmlhttp.open('POST', 'obr_base.php', true); // Открываем асинхронное соединение
              xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); // Отправляем кодировку
              xmlhttp.send(p); // Отправляем POST-запрос
              xmlhttp.onreadystatechange = function() { // Ждём ответа от сервера
                if (xmlhttp.readyState == 4) { // Ответ пришёл
                  if(xmlhttp.status == 200) { // Сервер вернул код 200 
                      f_reg.innerHTML = xmlhttp.responseText;
        //alert('f_reg.innerHTML = '+ f_reg.innerHTML);
                      // Если есть этот текст, то вместо Войти+Регистрация будет Выйти
                      if(~xmlhttp.responseText.indexOf('вы успешно авторизованы') || ~xmlhttp.responseText.indexOf('вы успешно зарегистрировались')) { 
                        // Выставление Выход вместо Вход Регистрация, если бы не было перезагрузки страницы - reload()
                        // btn_sign.innerHTML='<form name="exit" action="javascript:;" method="post" onsubmit="return sendingForm(\'exit\')">'+
                        //   '<button type"submit" class="btn btn-outline-success my-2 my-sm-0" >Выход</button>'+
                        //    '</form>';
        // Перезагрузка страницы через 3 сек., чтобы проставились переменные $_SESSION['name'] и др.
                            setTimeOut(3000,document.location.reload(true));
                            //document.location.reload(true);
                      }
                   }
                  }
                } ;
            }
     }
// Переменная для формы для авторизации пользователя. 
     var enter ='<form name="enter" action="javascript:;" method="post" onsubmit="return sendingForm(\'enter\')">'+    
                    '<div class="form-group">'+
                        '<label>Ваш e-mail: </label>'+
                        '<input type="email" name="email" class="form-control" placeholder="e-mail">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label for="exampleInputPassword1">Пароль: </label>'+
                        '<input type="password" name="password" class="form-control" placeholder="Пароль">'+
                    '</div>'+
                    '<button type="submit" class="btn btn-primary">Подтвердить</button>'+
                '</form>';
// Переменная для формы для регистрации пользователя.
    var registration ='<form name="registration" action="javascript:;" method="post" onsubmit="return sendingForm(\'registration\')">'+
                   '<div class="form-group">'+
                        '<label>Ваше имя: </label>'+
                        '<input type="text" name="name" class="form-control" placeholder="Имя">'+
                   '</div>'+
                    '<div class="form-group">'+
                        '<label>Ваша фамилия: </label>'+
                        '<input type="text" name="lastname" class="form-control" placeholder="Фамилия">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label>Ваш e-mail: </label>'+
                        '<input type="email" name="email" class="form-control" placeholder="e-mail">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label for="exampleInputPassword1">Пароль: </label>'+
                        '<input type="password" name="password" class="form-control" placeholder="Пароль">'+
                    '</div>'+
                    '<div class="form-group">'+
                        '<label for="exampleInputPassword1">Пароль: </label>'+
                        '<input type="password" name="password_2" class="form-control" placeholder="Повторите пароль">'+
                    '</div>'+
                    '<button type="submit" class="btn btn-primary">Подтвердить</button>'+
                '</form>';
                
    function enter_gen() { // Ф-ция вызывается при нажатии на кнопку Вход.
        exampleModalLabel.innerHTML="Вход";// "Вход" - будет записано в модальное окно
        f_reg.innerHTML = enter; // При вызове ф-ции в метку f_reg будет записана форма типа enter
    } 
    function form_gen() { // Ф-ция вызывается при нажатии на кнопку Регистрация.
        exampleModalLabel.innerHTML="Регистрация";//"Регистрация" - будет записано в модальное окно
        f_reg.innerHTML = registration; // При вызове ф-ции в метку f_reg будет записана форма типа form для регистрации.
    } 