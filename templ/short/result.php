<h1><?=$header;?></h1>
<div class="input-group">
    <span class="input-group-addon"><?=$_->url;?></span>
    <textarea class="form-control" disabled="true"><?=$url;?></textarea>
</div>
<div class="input-group">
    <span class="input-group-addon"><?=$_->shortUrl;?></span>
    <input type="url" class="form-control" value="<?=$shortUrl;?>">
</div>
<hr>
<p><?=$text;?></p>
