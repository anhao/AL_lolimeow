<?php
/**
 * 文章归档
 *
 * @package custom
 */
?>

<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
<div class="meowblog">
    <div class="main-container">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 ml-auto mr-auto">
<?php $this->widget('Widget_Contents_Post_Recent', 'pageSize=10000')->to($archives);
$year = 0;
$mon = 0;
$output = '<div class="timeline timeline-one-side" data-timeline-content="axis" data-timeline-axis-style="dashed" >';
while ($archives->next()):
    $year_tmp = date('Y', $archives->created);
    $mon_tmp = date('m', $archives->created);
    $y = $year;
    $m = $mon;
    if ($mon != $mon_tmp && $mon > 0) $output .= '</ul></li>';
    if ($year != $year_tmp && $year > 0) $output .= '</ul></div>';
    if ($year != $year_tmp) {
        $year = $year_tmp;
        $output .= '<span class="timeline-step badge-success"><br><i class="fa fa-clock-o"></i><br></span><div class="timeline-content"> <h5 class="text-muted font-weight-bold biji-tit">' . $year . '年 </h5><ul>';
    }
    if ($mon != $mon_tmp) {
        $mon = $mon_tmp;
        $output .= '<li><span class="al_mon biji-oth">' . $mon . ' 月   <b class="openoff" style="color: #ff5f33;" data-toggle="open"> [ 展开 ]</b></span><ul class="al_post_list biji-content">';
    }
    $output .= '<li>' . date('d日: ', $archives->created) . '<a href="' . $archives->permalink . '" title="' . $archives->title . '">' . $archives->title . '</a> </li>';
endwhile;
$output .= '</ul></li></ul></div>';
echo $output;
?>
            </div>
            </div>
        </div>
    </div>
    <?php $this->need('footer.php'); ?>
