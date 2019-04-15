<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main class="meowblog">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 ml-auto mr-auto">
                    <div class="post-single wow bounceInUp animated">
                        <div class="entry-header single-entry-header">
                            <h1 class="entry-title"><?php $this->title() ?>	</h1>
                        </div>

                        <div class="entry-content">
                        <?php $this->content(); ?>
                        </div>
                    </div>

                    <?php $this->need('comments.php'); ?>

                </div>
            </div>
            <hr>
        </div>
    </div>
</main>


<?php $this->need('footer.php'); ?>

