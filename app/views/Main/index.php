<div class="container">
    <?php if (!empty($posts)):?>
        <?php foreach ($posts as $post):?>
    <table class="table table-hover">
        <thead>
        <tr><th></th>
            <th class="field_to_order" id="username">Имя<span class="up glyphicon"></span></th>
            <th class="field_to_order" id="email">е-mail<span class="up glyphicon"></span></th>
            <th>Задача</th>
            <th class="field_to_order" id="status">Статус<span class="up glyphicon"></span></th>
            <th></th>
        </tr>
        </thead>
        <tbody id="selection">

        <tr>
            <td><a href="/task/overview/1"><img class="img_sm img-rounded" src="<?=ROOT . '/public/img/'?>"></a></td>
            <td style="text-align: center"><?=$post['name']?></td>
            <td style="text-align: center"><?=$post['email']?></td>
            <td class="task_body_row" >Test <br />
                <?=$post['text']?><br />
                </td>
            <td class="task_status_row" style="text-align: center"><?=($post['status'] == 0) ? 'На проверке' : 'Проверено модератором'?></td>
            <td>
                <a class="btn btn-default btn-sm" href="<?=$post['id']?>" role="button">Просмотр</a>
            </td>
        </tr>

        <?php endforeach;?>
    <?php endif;?>
</div>

