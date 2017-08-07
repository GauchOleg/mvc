<!--<code>--><?//=__FILE__?><!--</code>-->
<?php foreach ($post as $value):?>
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/">Весь список</a></li>
                <li class="active">Просмотр</li>
            </ol>
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Имя: <b><?=$value['name']?></b><br>
                            email: <b><?=$value['email']?></b><br>
                            Статус: <b><?php echo ($value['status'] == 0) ? 'На проверке' : 'Проверен'?></b>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <div class="col-md-5"><img class="img-responsive img-thumbnail" src="http://sketch.pp.ua/images/task/1502108887.jpg"><br></div>
                        <div class="col-md-7"><p><?=$value['text']?></p></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach;?>
