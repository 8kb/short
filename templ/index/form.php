<h1><?=$header;?></h1>
<form method="post">
   <div class="input-group">
      <input type="url" name="short[url]" class="form-control" id="url" placeholder="<?=$_->urlPlaceholder;?>">
      <span class="input-group-btn">
        <button class="btn btn-default" type="submit"><?=$_->btn;?></button>
      </span>
    </div>
</form> 
<hr>
<p><?=$text;?></p>
