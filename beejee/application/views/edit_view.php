    <div class="row mb-2">
        <div class="col-sm-9">
            <h4>
                Редактирование задачи
            </h4>
        </div>
        <div class="col-sm-3 mr-auto">
        </div>
    </div>
    
    <form method="POST" action="/beejee/admin/save">
        <div class="row border border-secondary pt-2 pl-2 ml-0 form-group">
            <div class="col-sm-7" style="font-style:italic;">
                <p>
                    Имя пользователя: <?php echo $data["user_name"]; ?>
                </p>
                <p>
                    E-mail: <?php echo $data["user_email"]; ?>
                </p>
                <p>
                    <label for="task_text">Текст задачи:</label>
                    <textarea class="form-control" id="task_text" name="task_text" rows="3" ><?php echo $data["task_text"]; ?></textarea>
                </p>
            </div>
            <div class="col-sm-5">
                <p>
                    <label for="task_status">Статус: </label> 
                    <input type="text" class="form-control" id="task_status" name="task_status" value="<?php echo $data["task_status"]; ?>">
                </p>
                <p>
                    <label for="task_edited">Редактирование администратором: </label> 
                    <input type="text" class="form-control" id="task_edited" name="task_edited" value="<?php echo $data["task_edited"]; ?>">
                </p>
                
                <input type="hidden"  name="task_id" value="<?php echo $data["task_id"]; ?>">
            
                <p>
                    <button  type="submit" class="btn btn-outline-info">
                        Сохранить
                    </button>
                </p>
            </div>   
        </div>
    </form>