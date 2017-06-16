<?php
$data = Product::getItemsWithPager(9,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));
$pages = Product::getPager(9,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));


$this->widget('wMetaTag',array(
    'setting'=>'PRODUCT',
));
?>

<div class="col-md-8 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="list-products" class="wContentBox">
            <div class="contentBox">
                <div class="title_box">
                    <!-- wBreadcrumb -->
                    <?php
                    $this->widget('wBreadCrumb',array(
                        'data'=>array(
                            'Trang chủ'=>Yii::app()->createUrl('site/index'),
                            'sản phẩm'=>Yii::app()->createUrl('product/list')
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
                                <a href="{detail_url}" class="title" title="">
                                    Mã: [getTitle_text(5)]
                                    <img class="thumb img-responsive" width="" height="" src="[getIntroimage_thumb(217,142)]" alt="..." title=""/>
                                </a>
                                <div class="price">Giá: {price}</div>
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