    <div class="row mb-2">
        <div class="col-sm-9">
            <h4>
                Добавлена новая задача
            </h4>
        </div>
        <div class="col-sm-3 mr-auto">
    
        </div>
        
    </div>
        
    <div class="row border border-secondary pt-2 pl-2 ml-0 form-group">
        <div class="col-sm-7" style="font-style:italic;">
            <p>
                Имя пользователя: <?php echo $data["user_name"]; ?>
            </p>
            <p>
                E-mail: <?php echo $data["user_email"]; ?>
            </p>
            <p>
                Текст задачи: <?php echo $data["task_text"]; ?>
            </p>
        </div>
        <div class="col-sm-5">
            <p>
                <button type="button" class="btn btn-outline-info">
                    <a  href="/beejee/" class="navbar-brand">К списку задач</a>
                </button>
            </p>
        </div>   
    </div>
    