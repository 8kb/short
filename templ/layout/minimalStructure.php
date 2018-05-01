<?php assetStart();?>
<style>
    html, body {
        height: 100%;
    }
       
    p {
        text-align: justify;
        line-height: 1.5;
    }
    .main-section {
        padding-top: 20px;
        padding-bottom: 50px;
        background-color: inherit;
    }
    .main-header {
        background-color: inherit;
    }
    .main-footer {
      padding: 30px;
    }
</style>
<?php assetEnd('headStyle');?>
<section class="container main-continer">
    <div class="row">
        <div class="col-xs-12">
            <?= $content;?>
        </div>
    </div>
</section>
<footer class="container main-footer">
    <div class="row">
        <div class="col-md-12">
            <p style="text-align: center">
                <span class="text-muted"><?=$_->copyright;?></span>
            </p>
        </div>
    </div>
</footer>
