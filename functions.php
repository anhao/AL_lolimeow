<?php

//后台输入信息
function themeConfig($form)
{
    $logoUrl = new Typecho_Widget_Helper_Form_Element_Text('logoUrl', NULL, NULL, _t('站点 LOGO 地址'), _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO'));
    $form->addInput($logoUrl->addRule('xssCheck', _t("请不要在图片链接中使用特殊字符")));
    $favicon = new Typecho_Widget_Helper_Form_Element_Text('favicon', NULL, 'https://alone88.cn/img/icon-a.png', _t('favicon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置favicon'));
    $form->addInput($favicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $iosicon = new Typecho_Widget_Helper_Form_Element_Text('iosicon', NULL, 'https://alone88.cn/img/icon-a.png', _t('apple touch icon地址'), _t('一般为http://www.yourblog.com/image.png,支持 https:// 或 //,留空则不设置Apple Touch Icon'));
    $form->addInput($iosicon->addRule('xssCheck', _t('请不要在图片链接中使用特殊字符')));
    $default_thumb = new Typecho_Widget_Helper_Form_Element_Text('default_thumb', null, null, _t('默认缩略图'), _t('文章的默认缩略图,默认缩略图自动获取文章第一张图片，如果这里不设置，文章页没有图片，则随机显示一张主题里的图片'));
    $form->addInput($default_thumb);
    $social_qq = new Typecho_Widget_Helper_Form_Element_Text('social_qq', NULL, NULL, _t('腾讯QQ'), _t('5-10个数字，如：1830934534，不设置则不显示'));
    $form->addInput($social_qq->addRule('xssCheck', _t('请不要在QQ号码中添加特殊字符')));
    $social_email = new Typecho_Widget_Helper_Form_Element_Text('social_email', NULL, NULL, _t('邮箱地址'), _t('如 im@alone88.cn，不设置则不显示'));
    $form->addInput($social_email->addRule('xssCheck', _t('请不要在邮箱中添加特殊字符')));
    $social_github = new Typecho_Widget_Helper_Form_Element_Text('social_github', NULL, NULL, _t('Github地址'), _t('如 https://github.com/anhao， 不设置则不显示'));
    $form->addInput($social_github->addRule('xssCheck', '请不要在链接中添加特殊字符'));
    $social_weibo = new Typecho_Widget_Helper_Form_Element_Text('social_weibo', NULL, NULL, _t('微博地址'), _t('如 https://weibo.com/hi_lp， 不设置则不显示'));
    $form->addInput($social_weibo->addRule('xssCheck', '请不要在链接中添加特殊字符'));
    $social_links = new Typecho_Widget_Helper_Form_Element_Textarea('social_links', NULL, NULL, _t('底部链接'), _t('底部显示的链接，格式：&lt;li class="nav-item"&gt;&lt;a href="#" class="nav-link" target="_blank"&gt;关于我&lt;/a&gt;&lt;/li&gt;
'));
    $form->addInput($social_links);
    $social_script = new Typecho_Widget_Helper_Form_Element_Textarea('social_script', NULL, NULL, _t('统计代码'), _t('统计代码'));
    $form->addInput($social_script);
    /*$banner_set = new Typecho_Widget_Helper_Form_Element_Select('banner_set',
        array('local' => '本地',
            'nolocal' => '外链'),
        'local',
        _t('顶部banner设置,是本地图片还是外链图片'), _t('默认本地')
    );
    $form->addInput($banner_set);*/
    $valine = new Typecho_Widget_Helper_Form_Element_Select('valine', array('no' => '关闭', 'yes' => '开启'), 'no', _t('是否Valine评论,默认关闭'),
        _t("Valine 是一款快速、简洁且高效的无后端评论系统。开启Valine评论则会关闭Typecho自带的评论系统,Valine官网：<a href='https://valine.js.org/' title='Valine官网'>https://valine.js.org/</a>"));
    $form->addInput($valine);
    if (Helper::options()->valine == 'yes') {
        $valine_id = new Typecho_Widget_Helper_Form_Element_Text('valine_id', null, null, _t('LeanCloud 的APP_ID'), _t('需要开启valine,才用的到，不填Valine显示不出来'));
        $form->addInput($valine_id);
        $valine_key = new Typecho_Widget_Helper_Form_Element_Text('valine_key', null, null, _t('LeanCloud 的APP_KEY'), _t('需要开启valine,才用的到,不填Valine显示不出来'));
        $form->addInput($valine_key);
    }
    $index_links = new Typecho_Widget_Helper_Form_Element_Select('index_links', array(
        'no' => '关闭',
        'yes' => '开启'
    ), 'no', _t('首页底部友情链接开关'), _t('首页友情链接开关,友情链接依赖于Typecho Links插件修改版'));
    $form->addInput($index_links);
    if (Helper::options()->index_links == 'yes') {
        $links_page = new Typecho_Widget_Helper_Form_Element_Text('links_page', null, null, _t('友情链接申请界面'), _t('首页底部友情链接申请页面'));
        $form->addInput($links_page->addRule('xssCheck'), _t('链接不要使用特殊字符'));
        $links_num = new Typecho_Widget_Helper_Form_Element_Text('links_num', null, null, _t('首页友情链接显示数量'), _t('如果不填，默认显示10条'));
        $form->addInput($links_num->addRule('xssCheck', _t('数量不要使用特殊字符')));
    }
    $fancybox = new Typecho_Widget_Helper_Form_Element_Select('fancybox', array(
        'yes' => '开启',
        'no' => '关闭'), 'yes',
        _t('是否开启 Fancybox '), _t('fancyBox是一款优秀的弹出框Jquery插件。默认开启 ')
    );
    $form->addInput($fancybox);
    $pjaxset = new Typecho_Widget_Helper_Form_Element_Select('pjaxset', array(
        'no' => '关闭',
        'yes' => '开启'
    ), 'no', _t('是否开启PJAX加速'), _t('开启系统评论可能失效，Valine可以正常使用'));
    $form->addInput($pjaxset);
    $related = new Typecho_Widget_Helper_Form_Element_Select('related', array(
        'no' => '关闭',
        'yes' => '开启'
    ), 'yes', _t('是否开启文章相关推荐'), _t('默认开启，开启了则会根据文章的tag推荐相关的文章'));
    $form->addInput($related);
}


//分页
function themeInit($archive)
{
    Helper::options()->commentsMaxNestingLevels = 999; //评论回复最高多少层
//    Helper::options()->commentsAntiSpam = false;//评论关闭反垃圾保护
//    Helper::options()->commentsMaxNestingLevels = 999; /*无限嵌套评论*/

    if ($archive->is('archive')) {
        $archive->parameter->pageSize = 9; //显示文章数
    }
    if ($archive->is('index')) {
        $archive->parameter->pageSize = 9;
    }
    if ($archive->is('search')) {
        $archive->parameter->pageSize = 9;
    }
    if (Helper::options()->fancybox == 'yes') {
        if ($archive->is('single')) {
            $archive->content = fancybox_replace($archive->content);
        }
    }

}

//banner 图片地址
function al_banner()
{

    $widget = Widget_Options::widget('Widget_Options');
    $banner_no = 10;
    $temp_no = rand(1, $banner_no);
    $banner_url = $widget->themeUrl.'/images/banner/banner('.$temp_no.').jpg';
    echo $banner_url;
}

//友情连接数量
//依赖于link插件
function link_count()
{
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    $count = $db->fetchObject($db->select(array('COUNT(lid)' => 'num'))->from($prefix . 'links'))->num;
    return $count;
}

//随机缩略图
function showThumbnail($widget)
{
    // 当文章无图片时的默认缩略图
    $rand = rand(1, 14); // 随机 1-14 张缩略图

    $random = $widget->widget('Widget_Options')->themeUrl . '/images/rand/' . $rand . '.jpg'; // 随机缩略图路径
    //正则匹配 主题目录下的/images/的图片（以数字按顺序命名）

    $cai = '';
    $attach = $widget->attachments(1)->attachment;
    $pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
    $patternMD = '/\!\[.*?\]\((http(s)?:\/\/.*?(jpg|png))/i';
    $patternMDfoot = '/\[.*?\]:\s*(http(s)?:\/\/.*?(jpg|png))/i';

    if ($attach && $attach->isImage) {

        $ctu = $attach->url . $cai;
    } //调用第一个图片附件
    else

//下面是调用文章第一个图片
        if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        } //如果是内联式markdown格式的图片
        else if (preg_match_all($patternMD, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        } //如果是脚注式markdown格式的图片
        else if (preg_match_all($patternMDfoot, $widget->content, $thumbUrl)) {
            $ctu = $thumbUrl[1][0] . $cai;
        } //以上都不符合，即随机输出图片
        else {
            $ctu = $random;
        }
    return $ctu;
}


//访问统计
function get_post_view($archive)
{
    $cid = $archive->cid;
    $db = Typecho_Db::get();
    $prefix = $db->getPrefix();
    if (!array_key_exists('views', $db->fetchRow($db->select()->from('table.contents')))) {
        $db->query('ALTER TABLE `' . $prefix . 'contents` ADD `views` INT(10) DEFAULT 0;');
        echo 0;
        return;
    }
    $row = $db->fetchRow($db->select('views')->from('table.contents')->where('cid = ?', $cid));
    if ($archive->is('single')) {
        $views = Typecho_Cookie::get('extend_contents_views');
        if (empty($views)) {
            $views = array();
        } else {
            $views = explode(',', $views);
        }
        if (!in_array($cid, $views)) {
            $db->query($db->update('table.contents')->rows(array('views' => (int)$row['views'] + 1))->where('cid = ?', $cid));
            array_push($views, $cid);
            $views = implode(',', $views);
            Typecho_Cookie::set('extend_contents_views', $views); //记录查看cookie
        }
    }
    echo $row['views'];
}

/**
 * 加载时间
 * @return bool
 */
function timer_start()
{
    global $timestart;
    $mtime = explode(' ', microtime());
    $timestart = $mtime[1] + $mtime[0];
    return true;
}

timer_start();
function timer_stop($display = 0, $precision = 3)
{
    global $timestart, $timeend;
    $mtime = explode(' ', microtime());
    $timeend = $mtime[1] + $mtime[0];
    $timetotal = number_format($timeend - $timestart, $precision);
    $r = $timetotal < 1 ? $timetotal * 1000 . " ms" : $timetotal . " s";
    if ($display) {
        echo $r;
    }
    return $r;
}


//fancybox
function fancybox_replace($content)
{
    global $post;

    $pattern = '/<img(.*?)src=\"(.*?)\"(.*?)>/i';
    $replacement = '<a href="javascript:void(0)" data-src="$2" data-fancybox="gallery"><img $1 src="$2" $3/></a>';
    $content = preg_replace($pattern, $replacement, $content);
    return $content;
}