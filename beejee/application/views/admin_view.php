<div class="row mb-2">
    <div class="col-sm-9">
        <h4>
            Список задач
        </h4>
    </div>
    <div class="col-sm-3 mr-auto">

    </div>
    
</div>

<?php foreach ($data as $load_task):?>

    <div class="row border border-secondary pt-2 pl-2 ml-0">
        <div class="col-sm-7">
        
            <p>
                <span style="font-style:italic;">Имя пользователя: </span> <?php echo $load_task["user_name"]; ?>
            </p>
            <p>
                <span style="font-style:italic;">E-mail: </span><?php echo $load_task["user_email"]; ?>
            </p>
            
            <p>
                <span style="font-style:italic;">Текст задачи: </span><?php echo $load_task["task_text"]; ?>
            </p>
        </div>
        <div class="col-sm-5">
            <p>
                <span style="font-style:italic;">Задача № </span> <?php echo $load_task["task_id"]; ?>
            </p>
            <p>
                <span style="font-style:italic;">Статус: </span> <?php echo $load_task["task_status"]; ?>
            </p>
            <p>
                <span style="font-style:italic;">Редактирование администратором: </span> <?php echo $load_task["task_edited"]; ?>
            </p>
        
            <p class="" ><!--Для админа-->
                <form method="POST" action="/beejee/admin/edit_task">   
                    <input type="hidden"  name="task_id" value="<?php echo $load_task["task_id"]; ?>">
                    <button type="submit" class="btn btn-outline-danger">
                        Редактировать
                    </button>
                </form>
            </p>
        </div>        
    </div>
    
<?php endforeach;?>
