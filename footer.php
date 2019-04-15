<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<footer class="footer">
    <div class="container">
        <div class="row row-grid align-items-center">
            <div class="col-lg-12 text-lg-center btn-wrapper justify-content-center">
                <?php if ($this->options->social_qq) : ?>
                    <a href="https://wpa.qq.com/msgrd?v=3&uin=<?php echo $this->options->social_qq; ?>&site=qq&menu=yes"
                       target="_blank" class="btn btn-neutral btn-icon-only btn-qq btn-round btn-lg wow fadeInUpBig"
                       data-toggle="tooltip" data-original-title="博主大大QQ<?php echo $this->options->al_qq; ?>">
                        <i class="fa fa-qq"></i></a>
                <?php endif ?>
                <?php if ($this->options->social_github): ?>
                    <a target="_blank" href="<?php echo $this->options->social_github; ?>"
                       class="btn btn-neutral btn-icon-only btn-github btn-round btn-lg" data-toggle="tooltip"
                       data-original-title="Github">
                        <i class="fa fa-github"></i></a>
                <?php endif ?>

                <?php if ($this->options->social_email): ?>
                    <a href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=<?php echo $this->options->social_email; ?>"
                       target="_blank"
                       class="btn btn-neutral btn-icon-only btn-mail btn-round btn-lg wow fadeInUpBig"
                       data-toggle="tooltip"
                       data-original-title="Email：<?php echo $this->options->social_email; ?>">
                        <i class="fa fa-envelope"></i></a>
                <?php endif ?>

                <?php if ($this->options->social_weibo): ?>
                    <a href="<?php echo $this->options->social_weibo; ?>" target="_blank"
                       class="btn btn-neutral btn-icon-only btn-weibo btn-round btn-lg" data-toggle="tooltip"
                       data-original-title="<?php echo $this->options->social_weibo; ?>">
                        <i class="fa fa-weibo"></i></a>
                <?php endif; ?>
            </div>
        </div>
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-12 ">
                <ul class="nav nav-footer justify-content-center">
                    <?php echo $this->options->social_links; ?>
                </ul>
            </div>
            <div class="col-md-12">
                <div class="copyright text-center">
                    &copy; <?php _e(date('Y')) ?>
                    <a href="<?php $this->options->siteUrl() ?>" target="_blank"><?php $this->options->title() ?> </a>.
                    Theme by <a href="https://alone88.cn"
                                target="_blank">Alone88</a> 页面加载耗时:<?php _e(timer_stop()) ?>
                    <div style="display:none;">
                        <?php  _e($this->options->social_script)?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div id="lolijump">
    <img src="<?php $this->options->themeUrl('images/lolijump.gif') ?>">
</div>
<script language="javascript">
    $pageNavClass = $('.pagination li a');
    $pageNavClass.addClass('paging-link');
    lastScrollY = 0;
    function heartBeat0() {
        diffY = document.body.scrollTop;
        percent = .1 * (diffY - lastScrollY);
        if (percent > 0) percent = Math.ceil(percent);
        else percent = Math.floor(percent);
        document.all.lolijump.style.pixelTop += percent;
        lastScrollY = lastScrollY + percent;
    }

    window.setInterval("heartBeat0()", 1);
    $('#lolijump').click(function () {
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    });

</script>

<script src="//cdn.staticfile.org/popper.js/1.7.0/popper.min.js"></script>
<script src="//cdn.staticfile.org/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.staticfile.org/headroom/0.9.4/headroom.min.js"></script>
<script src="//cdn.staticfile.org/wow/1.0.1/wow.min.js"></script>
<script src="<?php $this->options->themeUrl('js/theme.js') ?>"></script>
<?php if($this->is('single')):?>
    <?php if($this->options->fancybox=='yes'):?>
    <script src="https://cdn.staticfile.org/fancybox/3.2.1/jquery.fancybox.min.js"></script>
    <?php endif;?>
<?php endif ?>
<?php $this->footer(); ?>
<?php
if($this->options->pjaxset=='yes'):?>
<script src="//cdn.staticfile.org/instantclick/3.1.0/instantclick.min.js" data-no-instant></script>
<script data-no-instant>
    InstantClick.init('mousedown');
</script>
<?php endif; ?>
</body>
</html>
