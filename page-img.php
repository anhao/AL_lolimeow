<?php
/**
 * 图片上传
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

                <div class="col-md-8 ml-auto mr-auto">

                    <div class="card card-nav-tabs text-center">
                        <div class="card-header card-header-primary">
                            <?php $this->options->title()?>专用图床  - alapi.cn 提供支持
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">上传图片</h4>
                            <div id="uploadinfo"></div>
                            <div id="urls"></div>
                            <div id="html"></div>
                            <div id="bbcode"></div>
                            <div id="markdown"></div>
                            <div id="markdownlink"></div>
                            <div id="delete"></div>

                            <div class="form-group form-file-upload form-file-multiple">
                                <a href="javascript:">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" accept="image/*"
                                               multiple="multiple">
                                        <label class="custom-file-label" for="image">请选择图片上传</label>
                                    </div>
                                </a>
                            </div>
                            <div id="img2"></div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

</main>
<script src="//cdn.staticfile.org/layer/2.3/layer.js"></script>
<script src="//cdn.staticfile.org/clipboard.js/2.0.4/clipboard.min.js"></script>
<script src="<?php $this->options->themeUrl('js/ajaxscript.js') ?>"></script>
<?php $this->need('footer.php'); ?>
