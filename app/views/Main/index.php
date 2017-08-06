<div class="container">
    <?php if (!empty($posts)):?>
        <?php foreach ($posts as $post):?>
            <table class="table table-hover">
            <tbody class=".table-hover">
                <tr>
                    <td class="task_body_row"><?=$post['name']?></td>
                    <td class="task_body_row"><?=$post['email']?></td>
                    <td><?=$post['text']?></td>
                </tr>
            </tbody>
            </table>
        <?php endforeach;?>
    <?php endif;?>
</div>

