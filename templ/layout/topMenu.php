<div class="col-xs-12">
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <a class="navbar-brand" href="/"><?=$_->brand;?></a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#topmenu-collapse">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="topmenu-collapse">
            <ul class="nav navbar-nav">
            <?php foreach ($menu as $line) : ?>
                <li <?=isset($line['active']) ? ' class="active"' : '';?>>
                    <a href="<?=$line['url'];?>"><?=$line['ancor'];?></a>
                </li>
            <?php endforeach;?>
            </ul>
        </div>
    </div>
</nav>
</div>