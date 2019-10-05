<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php if ($this->options->valine=='yes'):?>
<?php if ($this->allow('comment')): ?>
    <div class="pagenav text-center"></div>
    <div id="vcomments">
    </div>
    <script>

        new Valine({
            el: '#vcomments',
            appId: '<?php _e($this->options->valine_id) ?>',//APP_ID
            appKey: '<?php _e($this->options->valine_key) ?>',//APP_KEY
            placeholder:'快来评论把',//评论显示内容
            notify:false,//评论回复邮件提醒
            verify:false,//验证码服务。
            path:window.location.pathname,//当前文章路径
            pageSize:10,
            highlight:true,
            recordIP:true
        })
    </script>
<?php endif;?>
<?php else:?>

<?php function threadedComments($comments, $options)
{
    if ($comments->authorId == $comments->ownerId) {
        $user = '<span class="badge badge-warning"><i class="fa fa-check-square"></i> 博主</span>';
    } else {
        $user = '<span class="badge badge-info"><i class="fa fa-globe"></i> 游客</span>';
    }

    $commentLevelClass = $comments->levels > 0 ? ' comment byuser comment-author-mogu bypostauthor odd alt depth-2' : 'comment even thread-even depth-1 parent'; //评论层数大于0为子级，否则是父级
    ?>



            <li class="commentsline">
                <div class="<?php echo $commentLevelClass?>" id="<?php $comments->theId(); ?>">
                    <div class="author-box">
                        <div class="thw-autohr-bio-img">
                                <div class="thw-img-border">
                                <?php $comments->gravatar('58', ''); ?>
                                </div>
                        </div>
                    </div>
                    <div class="comment-body">
                        <div class="meta-data">
                        <span class="pull-right">
                                    <i class="fa fa-mail-reply-all"></i> <?php $comments->reply(); ?>
                        </span>
                            <span class="comment-author">
                                        <?php $comments->author(); ?>
                                    <?php echo $user;?>
                            </span>
                            <span class="comment-date">
                                <?php $comments->date('Y-m-d H:i'); ?>
                            </span>
                        </div>
                        <div class="comment-content">
                            <?php $comments->content(); ?>
                            <?php if ('waiting' == $comments->status) { ?>
                            <em class="awaiting"><?php $options->commentStatus(); ?></em>
                            <?php } ?>
                        </div>
                    </div>
                </div>

                <?php  if($comments->children){?>
                <ul class="children">
                    <?php $comments->threadedComments($options); ?>
                </ul><!-- .children -->
                <?php }?>
            </li>

<?php } ?>
<?php $this->comments()->to($comments); ?>
<?php if ($comments->have()): ?>
<div id="comments" class="comments-area thw-sept wow bounceInUp">
    <h3 class="comments-heading"><?php $this->commentsNum(_t('0'), _t('%d'), _t('%d')); ?> Comments </h3>
    <ul class="comments-list">
    <?php $comments->listComments(array(
        'before'        =>  '',
        'after'         =>  '',
        'beforeAuthor'  =>  '',
        'afterAuthor'   =>  '',
        'beforeDate'    =>  '',
        'afterDate'     =>  '',
        'dateFormat'    =>  $this->options->commentDateFormat,
        'replyWord'     =>  _t('回复'),
        'commentStatus' =>  _t('您的评论正等待审核！'),
        'avatarSize'    =>  32,
        'defaultAvatar' =>  NULL
    )); ?>
    <?php $comments->pageNav('←', '→', 1, '...',
        array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center',
            'itemTag' => 'li','currentClass'=>'active','prevClass'=>'','nextClass'=>'')); ?>

    </ul>
    <div class="pagenav text-center"></div>
</div><!-- Post comment end -->
<?php endif; ?>
<?php if ($this->allow('comment')): ?>
    <h3 class="title-normal thw-sept text-center wow swing" id="respond_com">留下你的评论</h3>
    <div class="clearfix text-center">
       快留下你的小秘密吧
    </div>
    <div id="<?php $this->respondId();?>">
        <form id="commentform " action="<?php echo str_replace("http","https",$this->commentUrl()); ?>" method="post" role="form">

            <div class="row justify-content-center mb10">
                <div class="col-md-4"><a id="cancel-comment-reply-link" href="javascript:;"
                                         class="btn btn-sm btn-info" style="display:none;">取消回复</a>
                </div>
            </div>

            <?php if ($this->user->hasLogin()): ?>
                <!--                <p>--><?php //_e('登录身份: '); ?><!--<a href="--><?php //$this->options->profileUrl(); ?><!--">--><?php //$this->user->screenName(); ?><!--</a>. <a href="--><?php //$this->options->logoutUrl(); ?><!--" title="Logout">--><?php //_e('退出'); ?><!-- &raquo;</a></p>-->
                <div class="row justify-content-center mb10">
                    <div class="col-md-12" data-no-instant><a href="<?php $this->options->profileUrl(); ?>" class="btn btn-sm btn-info">您已登录:<?php $this->user->screenName(); ?></a>
                        <a href="<?php $this->options->logoutUrl(); ?>" class="btn btn-sm br" title="退出登录">退出
                            &raquo;</a><?php $comments->cancelReply('取消回复'); ?></div>
                </div>
            <?php else: ?>
                <div class="row" id="comment-author-info">
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="text" name="author" id="author" class="form-control"
                                   value="<?php $this->remember('author'); ?>" required
                                   placeholder="昵称 *" tabindex="1">
                        </div>
                    </div><!-- Col 4 end -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="email" name="mail" id="email" class="form-control"
                                   value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?>
                                   placeholder="邮箱 *" tabindex="2"/>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input type="url" name="url" id="url" class="form-control"
                                   value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?>
                                   placeholder="网址" size="22" tabindex="3"/>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                                        <textarea class="form-control  required-field" rows="5" name="text"
                                                  id="comment" tabindex="4"
                                                  placeholder="你可以在这里输入评论内容..."><?php $this->remember(''); ?></textarea>
                    </div>
                </div><!-- Col 12 end -->
            </div><!-- Form row end -->
            <div class="clearfix text-center">

                <button class="btn btn-1 btn-outline-success" name="submit" type="submit" id="submit"
                        tabindex="5">发表评论
                </button>
            </div>

        </form>

    </div>
<?php endif; ?>
<?php endif; ?>
