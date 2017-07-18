<?php
$data = Product::getItemsWithPager(18,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));
$pages = Product::getPager(9,'page',array('cat_id'=>Yii::app()->getRequest()->getParam('cat_id',null)));
$list_category = ProductCategory::getItems(5,array('status' => true , 'parent_id' => 0,));
$category = null;
if(isset($_GET['cat_id'])){
    $category = ProductCategory::model()->findByPk($_GET['cat_id']);
    if(!isset($category)){

        $this->redirect(iPhoenixUrl::createUrl('product/list'));
    }
}
$this->widget('wMetaTag',array(
    'setting'=>'PRODUCT',
));

//for sub category
// remove sub category requirement 08/07/2017
$sub_categories = ProductCategory::model()->findAllByAttributes(array(
    'parent_id' => isset($_GET['cat_id']) ? $_GET['cat_id'] : null));
?>

<div class="col-md-12 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="list-products" class="wContentBox">
            <div class="contentBox">
                <?php if(isset($category) && !$sub_categories):?>
                    <div class="title_box pc-only">
                        <!-- wBreadcrumb -->
                            <?php
                                $this->widget('wBreadCrumb',array(
                                    'data'=>array(
//                                        'Trang chủ'=>Yii::app()->createUrl('site/index'),
//                                        'Sản phẩm'=>Yii::app()->createUrl('product/list'),
                                        $category->name => $category->detail_url,
                                    ),
                                ));
                            ?>
                        <!-- end of wBreadcrumb -->
                    </div>
                    <div class="content_box">
                        <!--<div class="image-category">-->
                            <?php // if(isset($category->catimage)):?>
                                <!--<img class="img-responsive" src="<?php // echo $category->catimage->getAbsoluteThumbUrl(680,200,false);?>" alt="<?php // echo $category->name;?>"/>-->
                            <?php // else:?>
                                <!--<img class="img-responsive" src="<?php // echo Yii::app()->theme->baseUrl;?>/images/data/slider-01.png" alt="..."/>-->
                            <?php // endif;?>
                        <!--</div>-->
                        <div class="intro-category">
                            <?php echo $category->description;?>
                        </div>
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
                                    <div class="price">Giá: [getPrice_text()]</div>
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
                <?php 
                else:
                    $product_limit = 6;
                    if($sub_categories){
                        $product_limit = 6;
                        $list_category = $sub_categories;
                        if($category){
                            $list_category[] = $category;
                        }
                    }
                    $bread = array('Sản phẩm'=>Yii::app()->createUrl('product/list'),);
                    if($category){
                       $bread = array( $category->name => $category->detail_url,);
                    }
                ?>
                    <div class="title_box pc-only">
                        <!-- wBreadcrumb -->
                        <?php
                        $this->widget('wBreadCrumb',array(
                            'data'=>$bread,
                        ));
                        ?>
                        <!-- end of wBreadcrumb -->
                    </div>
                    <?php foreach($list_category as $key => $category):?>
                        <div class="col-sm-12">
                            <!-- wContentBox -->
                            <div id="category-0<?php echo $key+1;?>" class="wContentBox category">
                                <div class="contentBox">
                                    <div class="title_box">
                                        <a href="<?php echo $category->detail_url;?>" title="<?php echo $category->name;?>">
                                            <!--<img src="<?ph echo $category->getBoximage_thumb(184,18);?>" alt="<?ph echo $category->name;?>" title="<?ph echo $category->name;?>">-->
                                            <!--replace image by category name-->
                                            <?php echo $category->name;?>
                                        </a>
                                    </div>
                                    <div class="content_box">
                                        <!-- wListItem -->
                                        <?php
                                        $this->widget('wListItem', array(
                                            'class'=>'list-unstyled',
                                            'data'=>Product::getItems($product_limit, array('cat_id'=>$category->id)),
                                            'template'=>'
                                        <div class="image"><a href="{detail_url}" title="{name}"><img src="[getIntroimage_thumb(220,137)]" alt="{name}" title="{name}" class="img-responsive"></a></div>
                                        <div class="information">
                                            <a href="{detail_url}" title="{name}">[getTitle_text(6)]</a>
                                        </div>
                                    ',
                                        ));
                                        ?>
                                        <!-- end of wListItem -->
                                    </div>
                                </div>
                            </div>
                            <!-- end of wContentBox -->
                        </div>
                    <?php endforeach;?>
                <?php endif;?>
            </div>
        </div>
        <!-- end of wContentBox -->
    </div>
</div>
<script type="text/javascript">
    /*$(document).ready(function(){
        var cat = '<?php //echo Yii::app()->getRequest()->getParam('cat_id',null);?>';
        $('#list-main-producst > li').each(function(){
            var class_name = $(this).attr('class');
            if(class_name.indexOf("active") != 0){
                class_name = class_name.replace(" active","");
                $(this).attr('class',class_name);
            }
        });

        if(cat != ''){
            var str = $('#li_'+cat).attr('class');
            alert(str);return false;
            str +=' active';
            $('#li_'+cat).attr('class',str);
        }
        return false;
    });*/
    $(document).ready(function(){
        var cat = '<?php echo Yii::app()->getRequest()->getParam('cat_id',null);?>';
        $('#list-main-producst > li').each(function(){
            $(this).removeAttr('class');
        });

        if(cat != ''){
            $('#li_'+cat).attr('class','active');
        }
        return false;
    });
</script>