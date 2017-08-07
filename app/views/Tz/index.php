<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h4><?=$description?></h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php foreach ($post as $value):?>
                <div>
                    <?=$value['text']?>
                </div>
            <?php endforeach;?>
        </div>
    </div>
</div>