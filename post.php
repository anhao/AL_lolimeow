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
                            <h2 class="entry-title wow swing  animated"><?php $this->title() ?>    </h2>
                            <div class="post-meta author-box wow bounceInRight">
                                <div class="thw-autohr-bio-img">
                                    <div class="thw-img-border">
                                       <?php $this->author->gravatar('60','g',null,'avatar avatar-60 photo img-fluid') ?>
                                    </div>
                                </div>
                                <div class="post-meta-content">
                                    <span class="list-post-date"><i
                                                class="fa fa-calendar"></i> Post on <?php $this->date(); ?>	</span>
                                    <span class="post-author"><i
                                                class="fa fa-user-circle"></i> <?php $this->author(); ?>	</span>
                                    <span class="post-author"><i class="fa fa-comments-o"></i> <a
                                                href="#comments"><?php $this->commentsNum() ?> Comments</a></span>
                                    <span class="post-author"><i
                                                class="fa fa-street-view"></i> <?php get_post_view($this) ?> Views</span>
                                    <span class="post-author"><i
                                                class="fa fa-folder-o"></i>  <?php $this->category(','); ?>	 </span>
                                    <span class="list-post-views"><i
                                                class="fa fa-tags"></i> <?php $this->tags(' ', true, 'none'); ?>	</span>
                                </div>
                            </div>
                        </div>


                        <div class="entry-content wow bounceInLeft">
                           <?php $this->content(); ?>
                        </div>
                    </div>
                    <div class="post-footer clearfix wow bounceInDown">
                        <div class="post-tags">
                            <div class="article-categories">
                                <?php $this->category(' '); ?>
                                <?php $this->tags(' ', true, ''); ?>
                            </div>
                        </div>
                    </div>

                    <div class="thw-author-box author-box thw-sept wow rollIn">
                        <div class="thw-autohr-bio-img">
                            <div class="thw-img-border">
                                 <?php $this->author->gravatar('80','g',null,'avatar avatar-80 photo img-fluid') ?>
                            </div>
                        </div>
                        <div class="author-info">
                            <h4><?php $this->author(); ?></h4>
                            <p><?php $this->options->description(); ?></p>
                        </div>
                    </div>
                    <nav class="post-navigation thw-sept wow bounceInUp">
                        <div class="post-previous">
                            <span><i class="fa fa-angle-left"></i> Previous Post </span>
                            <h4><?php $this->thePrev('%s', '没有了'); ?></h4>
                        </div>
                        <div class="post-next">
                            <span>Next Post <i class="fa fa-angle-right"></i></span>
                            <h4><?php $this->theNext('%s', '没有了'); ?></h4></div>
                    </nav>

                    <?php $this->need('comments.php'); ?>
                </div>

                <?php if ($this->options->related == 'yes'): ?>
                    <?php $this->related(3)->to($relatedPosts); ?>
                    <?php if($relatedPosts->have()):?>
                    <div class="row wow fadeInUp animated">
                        <div class="col-lg-12">
                            <h3 class="title-normal thw-sept text-center">相关推荐</h3></div>
                        <?php while ($relatedPosts->next()): ?>

                            <div class="col-md-4">
                                <div class="card card-blog">
                                    <div class="card-header card-header-image">
                                        <a href="<?php $relatedPosts->permalink(); ?>">
                                            <?php if (array_key_exists('thumb', unserialize($this->___fields()))): ?>
                                                <img class="img img-raised" src="<?php echo $this->fields->thumb; ?>"
                                                     alt="<?php $relatedPosts->title(); ?>">

                                            <?php else: ?>
                                                <?php $thumb = showThumbnail($this);
                                                if (!empty($thumb)): ?>
                                                    <img class="img img-raised" src="<?php echo $thumb ?>">
                                                <?php endif; ?>
                                            <?php endif; ?>

                                        </a>
                                    </div>
                                    <div class="card-body">
                                        <h4 class="card-title"><a
                                                    href="<?php $relatedPosts->permalink(); ?>"
                                                    title="<?php $relatedPosts->title(); ?>"><?php $relatedPosts->title(); ?></a>
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
<?php endif;?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</main>


<?php $this->need('footer.php'); ?>
