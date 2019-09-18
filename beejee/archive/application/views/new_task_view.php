    <div class="row mb-2">
        <div class="col-sm-9">
            <h4>
                Добавление новой задачи
            </h4>
        </div>
        <div class="col-sm-3 mr-auto">
    
        </div>
        
    </div>
    
    <form method="POST" action="/beejee/main/add_task">
        <div class="row border border-secondary pt-2 pl-2 ml-0 form-group">
            <div class="col-sm-7" style="font-style:italic;">
                <p>
                    <label for="user_name">Имя пользователя: </label> 
                    <input type="text" class="form-control" id="user_name" name="user_name" placholder="John">
                </p>
                <p>
                    <label for="user_email">E-mail: </label> 
                    <input type="email" class="form-control" id="user_email" aria-describedby="emailHelp"  name="user_email" placholder="John@mail.ru">
                        
                </p>
                <p>
                    <label for="task_text">Текст задачи:</label>
                    <textarea class="form-control" id="task_text" name="task_text" rows="3"></textarea>
                </p>
            </div>
            <div class="col-sm-5">
                <p>
                    <button  type="submit" class="btn btn-outline-info">
                        Добавить задачу
                    </button>
                </p>
            </div>   
        </div>
    </form>