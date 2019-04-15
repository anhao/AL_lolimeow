<?php
/**
 * 友情链接
 *
 * @package custom
 */
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<main class="meowblog">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 ml-auto mr-auto">
                    <div class="post-single">
                        <div class="entry-header single-entry-header">
                            <h2 class="entry-title wow swing  animated">
                                <?php $this->title() ?>
                            </h2>
                        </div>
                        <div class="entry-content wow bounceInLeft">
                            <?php $this->content(); ?>
                            <div class="btn btn-success col-md-12 ml-auto mr-auto ">
                                博主与以下
                                <span class="badge badge-danger">
                      <?php echo link_count() ?>
                    </span>
                                位大佬存在&nbsp;&nbsp;排名不分先后
                            </div>
                            <div class="userItems mt30">
                                <div class="row" data-no-instant>
                    <?php Links_Plugin::output("SHOW_LINKS"); ?>
                                </div>
                            </div>
                        </div>
                        <?php $this->need('comments.php'); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


<?php $this->need('footer.php');?>
