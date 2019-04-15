<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main class="meowblog">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 ml-auto mr-auto">
                    <img src="<?php $this->options->themeUrl('images/404.jpg') ;?>" class="img-fluid rounded shadow" >
                </div>
            </div>
        </div>
    </div>
</main>
<?php $this->need('footer.php');?>
