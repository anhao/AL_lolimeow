<?php
/**
 *  标签云
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
                <div class="col-md-12">
                    <h2 class="text-center">标签云</h2>
                    <div class="tag-btn text-center">
                        <div class="btn-group">
                            <button type="button" class="btn " id="btn-canvas">词云</button>
                            <button type="button" class="btn btn-google-plus" id="btn-text">全部</button>
                        </div>
                    </div>
                    <?php $this->widget('Widget_Metas_Tag_Cloud', 'ignoreZeroCount=1&limit=99999')->to($tags); ?>
                    <div id="tag-text">
                        <div class="post-tags text-center" style="font-size: 24px">
                            <div class="article-categories">
                                <?php while ($tags->next()): ?>
                                    <a href="<?php $tags->permalink(); ?>" title="该标签下有<?php $tags->count(); ?>篇文章"
                                       data-toggle="tooltip"><?php $tags->name(); ?></a>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    </div>
                    <div id="tag-canvas" class="text-center " style="display: none;margin-top: 10px">
                        <div id="canvas-container" align="center">
                            <canvas id="tag-cloud"></canvas>
                        </div>
                    </div>
                    <div id="comments">
                        <?php $this->need('comments.php'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!--标签云插件-->
<script>
    <?php
    $tagCanvas = [];
    foreach ($tags->stack as $k => $v) {
        $tagCanvas[] = [$v['name'], $v['count'], $v['permalink']];
    }
    ?>
    var lists = <?php echo json_encode($tagCanvas) ?>;
</script>
<script src="<?php $this->options->themeUrl('js/wordcloud2.min.js?2019521') ?>"></script>
<!--end 标签云-->
<?php $this->need('footer.php'); ?>
