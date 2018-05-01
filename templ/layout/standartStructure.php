<?php assetStart();?>
<style>
html {
  position: relative;
  min-height: 100%;
}
body {
  /* Margin bottom by footer height */
  margin-bottom: 60px;
}
footer {
  padding-top: 20px;
  position: absolute;
  text-align: center;
  bottom: 0;
  width: 100%;
  /* Set the fixed height of the footer here */
  height: 60px;
  background-color: #f5f5f5;
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
</style>
<?php assetEnd('headStyle');?>
<header class="container-fluid">
    <?= template('templ/layout/topMenu', ['menu'=>$topMenu]);?>
</header>
<section class="container">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <?= $content;?>
        </div>
        <aside class="col-md-4 col-xs-12">
            <?= template('templ/layout/sidebarMenu', ['menu'=>$sidebarMenu]);?>
        </aside>
    </div>
</section>
<footer class="container-fluid">
    <span class="text-muted"><?=$_->copyright;?></span>
</footer>
