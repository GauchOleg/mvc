<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <?php if(!$result && $result !== null){?>
            <div class="alert alert-danger .alert-dismissible" role="alert">Ошибка при загрузке файла
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <?php }elseif($result !== null && $result !== false){?>
                <div class="alert alert-success" role="alert">Файл успешно загружен
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            <?php }?>
            <form method="post" action="" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Имя</label>
                    <input type="text" class="form-control" placeholder="Имя" name="name">
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email">
                </div>
                <div class="form-group">
                    <label>Текст задачи</label>
                    <textarea class="form-control" rows="5" placeholder="Текст задачи" name="text"></textarea>
                </div>
                <div class="form-group">
                    <label>Картинка</label>
                    <input type="file" name="photo">
                    <p class="help-block">Загружаемые форматы</p>
                </div>
                <input type="submit" class="btn btn-default btn-block" name="send" value="Отправить">
            </form>
        </div>
</div>