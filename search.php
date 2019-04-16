<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<main class="meowblog">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 post-standard-list3-style">

                    <?php if($this->have()): ?>
                        <?php while ($this->next()): ?>
                            <div class="entry-blog blog-default wow fadeInUp">
                                <div class="entry-blog-listing clearfix">
                                    <div class="post-standard-view">
                                        <div class="entry-blog-list-left">
                                            <div class="entry-format">
                                                <div class="featured-image">
                                                    <a href="<?php $this->permalink() ?>	"
                                                       title="<?php $this->title() ?>	">
                                                        <?php if(array_key_exists('thumb',unserialize($this->___fields()))):?>
                                                        <img class="img-fluid"
                                                             src="<?php echo $this->fields->thumb;?>"></a>
                                                    <?php else:?>
                                                        <?php $thumb = showThumbnail($this); if(!empty($thumb)):?>

                                                            <img class="img-fluid"
                                                                 src="<?php echo $thumb;?>"></a>
                                                        <?php endif;?>
                                                    <?php endif;?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="entry-blog-list-right">
                                            <div class="post-content">
                                                <div class="post-header">
                                            <span class="category-meta">
                                               <i class="fa fa-folder-o"></i>  <?php $this->category(' ', true) ?>
                                            </span>
                                                    <h2 class="entry-post-title">
                                                        <a href="<?php $this->permalink() ?>	"
                                                           title="<?php $this->title() ?>	"><?php $this->title() ?>    </a>
                                                    </h2>
                                                </div>
                                                <div class="post-meta author-box mb10">
                                                    <div class="thw-autohr-bio-img">
                                                        <div class="thw-img-border">

                                                <?php $this->author->gravatar('60','g',null,'avatar avatar-60 photo img-fluid') ?>
                                                </div>
                                                    </div>
                                                    <div class="post-meta-content">
                                                    <span class="list-post-date"><i
                                                            class="fa fa-calendar"></i> <?php $this->date('F j, Y'); ?>	</span>
                                                        <span class="post-author"><i
                                                                class="fa fa-user-circle"></i> <?php $this->author(); ?>	</span>
                                                        <span class="post-author"><i
                                                                class="fa fa-comments-o"></i> 评论（<?php $this->commentsNum('%d'); ?>	） </span>
                                                        <span class="list-post-Views"><i
                                                                class="fa fa-street-view"></i>  <?php get_post_view($this) ?>
 Views</span>
                                                    </div>
                                                </div>
                                                <div class="post-intro-text">
                                        <?php $this->excerpt(140,'...'); ?>
                                        </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php else: ?>
                    <h3 class="text-muted text-center"><?php echo _e('暂无搜索结果') ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php $this->need('footer.php'); ?>

