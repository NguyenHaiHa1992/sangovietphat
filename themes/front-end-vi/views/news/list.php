<?php
$data = News::getItemsWithPager(6,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));
$pages = News::getPager(6,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));

$list = NewsCategory::getActiveMenu();
if(Yii::app()->getRequest()->getParam('cat_id',null) != null){
    $cat_id = Yii::app()->getRequest()->getParam('cat_id',null);
}
else{
    $arr_key = array_keys($list);
    $cat_id = $arr_key[0];
}

$this->widget('wMetaTag',array(
    'setting'=>'NEWS',
));
?>

<div class="col-md-12 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="list-news" class="wContentBox">
            <div class="contentBox">
                <div class="title_box pc-only">
                    <!-- wBreadcrumb -->
                    <?php
                    $this->widget('wBreadCrumb',array(
                        'data'=>array(
//                            'Trang chủ'=>Yii::app()->createUrl('site/index'),
                            $list[$cat_id]->name=>$list[$cat_id]->detail_url,
                        ),
                    ));
                    ?>
                    <!-- end of wBreadcrumb -->
                </div>
                <div class="content_box">
                    <!-- wListItem -->
                    <?php
                        $this->widget('wListItem', array(
                            'class'=>'list-unstyled',
                            'data'=>$data,
                            'template'=>'
                                    <div class="image">
                                        <a href="{detail_url}">
                                            <img src="[getIntroimage_thumb(220,135,false)]" alt="" title="" class="img-responsive">
                                        </a>
                                    </div>
                                    <div class="information">
                                        <a href="{detail_url}" class="title">{name}</a>
                                        <div class="quote">{introtext}</div>
                                        <div class="time">Đăng lúc <span>{format_time}</span></div>
                                        <div class="read-more"><a href="{detail_url}">>> Xem chi tiết</a> </div>
                                    </div>
                                ',
                        ));
                        ?>
                    <!-- end of wListItem -->
                    <div id="pager">
                        <ul class="list-unstyled">
                            <?php
                            $this->widget('wMyPager', array(
                                'pages'=>$pages,
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wContentBox -->
    </div>
</div>