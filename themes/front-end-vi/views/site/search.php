<?php
$data_news = News::getSearchItemsWithPager(3,'page_news',$keyword);
$pages_news = News::getSearchPager(3,'page_news',$keyword);

$data_product = Product::getSearchItemsWithPager(3,'page_product',$keyword);
$pages_product = Product::getSearchPager(3,'page_product',$keyword);


$this->widget('wMetaTag',array(
    'setting'=>"SEARCH",
));
?>


<div class="col-md-8 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="list-news" class="wContentBox">
            <div class="contentBox">
                <div class="title_box">Tìm kiếm "<?php echo $keyword;?>" trong tin tức</div>
                <div class="content_box">
                    <!-- wListItem -->
                    <?php
                    $this->widget('wListItem', array(
                        'class'=>'list-unstyled',
                        'data'=>$data_news,
                        'template'=>'
                                <div class="image"><img src="[getIntroimage_thumb(220,135,false)]" alt="" title="" class="img-responsive"></div>
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
                                'pages'=>$pages_news,
                            ));
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="title_box">Tìm kiếm "<?php echo $keyword;?>" trong sản phẩm</div>
                <div class="content_box">
                    <!-- wListItem -->
                    <?php
                    $this->widget('wListItem', array(
                        'class'=>'list-unstyled',
                        'data'=>$data_product,
                        'template'=>'
                                <div class="image"><img src="[getIntroimage_thumb(220,135,false)]" alt="" title="" class="img-responsive"></div>
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
                                'pages'=>$pages_product,
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