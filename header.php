<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8 ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="Cache-Control" content="no-transform"/>
    <meta http-equiv="Cache-Control" content="cdn.staticfile.org"/>
    <?php if($this->options->favicon): ?><link rel="shortcut icon" href="<?php $this->options->favicon(); ?>"><?php endif;?>

    <?php if($this->options->iosicon): ?><link rel="apple-touch-icon" href="<?php $this->options->iosicon();?>"><?php endif; ?>

    <title><?php $this->archiveTitle(array(
            'category'  =>  _t(' %s '),
            'search'    =>  _t(' %s '),
            'tag'       =>  _t(' %s '),
            'author'    =>  _t(' %s '),
            'date'      =>  _t(' %s ')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>
    <meta name="keywords" content="<?php $this->keywords(); ?>" />
    <?php $this->header('keywords=&generator=&pingback=&xmlrpc=&wlw=&commentReply=&rss1=&rss2=&atom='); ?>
    <script src="//cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <link href="//cdn.staticfile.org/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" href="//cdn.staticfile.org/animate.css/3.7.0/animate.min.css" rel="stylesheet">
    <link type="text/css" href="<?php $this->options->themeUrl('css/themes.min.css'); ?>" rel="stylesheet">
    <link type="text/css" href="<?php $this->options->themeUrl('css/style.css'); ?>" rel="stylesheet">
    <?php if($this->options->valine=='yes'):?>
    <script src="//cdn1.lncld.net/static/js/3.0.4/av-min.js"></script>
    <script src='//cdn.staticfile.org/valine/1.3.6/Valine.min.js'></script>
    <?php endif; ?>
    <!--[if lt IE 9]>
    <script src="//cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
    <script src="//cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <link type="text/css" href="<?php $this->options->themeUrl('css/highlight.css'); ?>" rel="stylesheet">
    <script src="//cdn.staticfile.org/highlight.js/9.15.5/highlight.min.js"></script>
    <script data-no-stant>hljs.initHighlightingOnLoad();</script>
</head>
<body>
<!--[if lt IE 8]>
<div class="browsehappy" role="dialog">
    当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/" target="_blank">升级你的浏览器</a>。
</div>
<![endif]-->
<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="<?php $this->options->siteUrl(); ?>">
                <?php if ($this->options->logoUrl): ?>
                <img src="<?php _e($this->options->logoUrl); ?>" alt="<?php _e($this->options->title() );?>" title="<?php _e($this->options->title());?>"
                     class="headerlogo"></a>
            <?php else: ?>
                <span title="<?php _e($this->options->title()); ?>"><?php _e($this->options->title()); ?></span></a>
            <?php endif ?>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global"
                    aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <?php if ($this->options->logoUrl): ?>
                                <img src="<?php _e($this->options->logoUrl); ?>" alt="<?php _e($this->options->title() );?>" title="<?php _e($this->options->title() );?>"
                                     class="headerlogo">
                            <?php else: ?>
                                <span title="<?php _e($this->options->title()); ?>"><?php _e($this->options->title()); ?></span>
                            <?php endif ?>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse"
                                    data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false"
                                    aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center ml-lg-auto">
                    <li class="nav-item"><a href="<?php $this->options->siteUrl(); ?>" class="nav-link">首页</a></li>
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link"
                                                     aria-haspopup="true">分类</a>
                        <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
                        <ul class="dropdown-menu">
                            <?php while ($category->next()): ?>
                                <li class="nav-item"><a
                                            class="dropdown-item" <?php if ($this->is('category', $category->slug)): ?><?php endif; ?>
                                            href="<?php $category->permalink(); ?>"
                                            title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>
                    <li class="nav-item dropdown"><a href="#" data-toggle="dropdown" class="dropdown-toggle nav-link">页面</a>
                        <?php $this->widget('Widget_Contents_Page_List')->to($pages); ?>
                        <ul class="dropdown-menu">
                            <?php while ($pages->next()): ?>
                                <li class="nav-item"><a
                                        class="dropdown-item" <?php if ($this->is('page', $pages->slug)): ?><?php endif; ?>
                                        href="<?php $pages->permalink(); ?>"
                                        title="<?php $pages->title(); ?>"><?php $pages->title(); ?></a></li>
                            <?php endwhile; ?>
                        </ul>
                    </li>

                    <li class="nav-item"><a href="#search" class="nav-link"><i class="fa fa-search"></i>Search</a></li>
                </ul>
                <div id="search">
                    <span class="close">X</span>
                    <form role="search" id="searchform" method="post" action="<?php $this->options->siteUrl(); ?>">
                        <input type="search" name="s" value="" placeholder="<?php _e('输入关键字搜索'); ?>"/>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>
<section class="section-profile-cover section-blog-cover section-shaped my-0 "
         style="background-image: url('<?php al_banner() ?>')">
    <div class="shape shape-style-1 shape-primary alpha-4">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <?php if($this->is('search')): ?>
    <div class="container shape-container d-flex align-items-center py-lg">
        <div class="col px-0">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="headerpagetit text-white">搜索:[<?php $this->archiveTitle(array('search'=>'%s'),'','') ?>]关键词的结果 共<?php _e($this->getTotal())?> 篇文章</h2>
                </div>
            </div>
        </div>
    </div>
    <?php endif;?>
    <div class="separator separator-bottom separator-skew">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none">
            <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
        </svg>
    </div>
</section>