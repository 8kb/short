<div class="panel panel-default">
    <ul class="list-group">
        <?php foreach ($menu as $line) : ?>
        <li class="list-group-item">
            <a href="<?=$line['url'];?>"><?=$line['ancor'];?></a>
        </li>
        <?php endforeach;?>
    </ul>
</div>