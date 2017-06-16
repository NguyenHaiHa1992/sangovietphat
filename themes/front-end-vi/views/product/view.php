<?php
$data = Product::getItemById($_GET['id']);
$this->widget('wMetaTag',array(
    'data'=>$data,
));
?>


<div class="modal fade" id="myDetail" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-body">
                <?php if(isset($data->detailimage)):?>
                <img src="<?php echo $data->detailimage->getAbsoluteThumbUrl(560,400,false);?>" class="img-responsive" alt="<?php echo $data->name;?>">
                <?php else:?>
                    <p>Chưa có ảnh chi tiết cho sản phẩm này!</p>
                <?php endif;?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-8 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="detail-product" class="wContentBox">
            <div class="contentBox">
                <div class="title_box">
                    <?php $this->widget('wBreadCrumb',array(
                        'data'=>iPhoenixUrl::createBreadcrumb($data),
                    ));?>
                </div>
                <div class="content_box">
                    <!-- wContentBox -->
                        <?php
                            $this->widget('wContentBox',array(
                                'data'=>$data,
                                'template'=>'
                                    <div id="short-description">
                                        <div class="image" id="main-image"><a href="#" data-toggle="modal" data-target="#myDetail"><img src="[getIntroimage_thumb(218,142)]" class="thumb img-responsive"></a></div>
                                        <div class="title">Mã: {name}</div>
                                        <div class="quote">{introduction}.</div>
                                        <!--
                                        <div class="price">Giá hoàn hiện: {price}</div> <span class="notice">*Đã bao gồm công thợ, phụ liệu lót sàn cao cấp</span>
                                        -->
                                    </div>
                                    <div id="specifications" class="info_box">
                                        <div class="title">Thông số kỹ thuật</div>
                                        <div class="content">
                                            <table>
                                                <tr>
                                                    <td>Model</td>
                                                    <td>{model}</td>
                                                </tr>
                                                <tr>
                                                    <td>Độ dày</td>
                                                    <td>{thickness}</td>
                                                </tr>
                                                <tr>
                                                    <td>Chiều rộng</td>
                                                    <td>{width}</td>
                                                </tr>
                                                <tr>
                                                    <td>Chiều dài</td>
                                                    <td>{height}</td>
                                                </tr>
                                                <tr>
                                                    <td>Bảo hành</td>
                                                    <td>{warranty}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <div id="description" class="info_box">
                                        <div class="title">Chi tiết sản phẩm</div>
                                        <div class="content">
                                            <p>{description}</p>
                                        </div>
                                    </div>
                                ',
                            ));
                        ?>
                    <!-- end of wContentBox #detail-product-->
                    <div class="break-line"></div>
                    <!-- wContentBox -->
                    <div id="list-products" class="info_box">
                        <div class="title">Sản phẩm cùng loại</div>
                        <div class="content_box">
                            <!-- wListItem -->
                            <?php
                            $this->widget('wListItem', array(
                                'class'=>'list-unstyled',
                                'data'=>$data->relatedItems,
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
                        </div>
                    </div>
                    <div class="break-line"></div>
                    <!-- end of wContentBox #list-products-->
                    <div id="plugin-social">
                        <div class="title">Chia sẻ: </div>
                        <?php $pageUrl = $data->detail_url;?>
                        <div class="fb-like" data-href="<?php echo $pageUrl;?>" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>
                    </div>
                    <!-- wCommentBox -->
                    <div id="comment-box">
                        <div class="title">
                            Bình luận
                        </div>
                        <div  class="wrapper">
                            <div class="write-cm-box">
                                <div class="content">
                                    <p id="cmt_error" style="color: red;display: none"></p>
                                    <textarea id="cmt_content" rows="5" placeholder= "" class="content-comment"></textarea>
                                    <input id="cmt_name" type="text" class="userName pull-left" placeholder="Tên của bạn">
                                    <button id="cmt_button" type="submit" class="submit-btn btn-style-01">Gửi bình luận</button>
                                </div>
                            </div>
                            <!-- wListItem -->
                            <?php
                            $theme_url = Yii::app()->theme->baseUrl;
                            $this->widget('wListItem', array(
                                'id'=>'list-comments',
                                'data'=>Comment::getCommentsWithPager($_GET['id'],'Product',5),
                                'template'=>'
                                    <div class="wDetailBox">
                                        <div class="avatar-user"><img src="'.$theme_url.'/images/data/avatar.png" alt="..."></div>
                                        <div class="detailBox">
                                            <a class="author" title="">{name}</a>
                                            <span class="time">Gửi lúc {format_time}</span>
                                            <div class="content">{content}.</div>
                                        </div>
                                    </div>
                                ',
                            ));
                            ?>
                            <!-- end of wListItem -->
                            <div id="pager">
                                <ul class="list-unstyled">
                                    <?php
                                    $this->widget('wMyPager', array(
                                        'pages'=>Comment::getCommentsPager($_GET['id'],'Product',5),
                                    ));
                                    ?>
                                </ul>
                            </div>
                        </div><!--end .wrapper-->
                    </div>
                    <!-- end of wCommentBox -->
                </div>
            </div>
        </div>
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
        var cat = '<?php echo $data->category->id;?>';
        $('#list-main-producst > li').each(function(){
            $(this).removeAttr('class');
        });

        $('#li_'+cat).attr('class','active');
        return false;
    });
</script>
<script type="text/javascript">

    $(document).on('click','#cmt_button',function(e){
        e.preventDefault();
        $('#cmt_button').attr('disabled','disabled');
        $('#cmt_button').css('opacity','0.5');
        var parent_id = '<?php echo $_GET["id"]; ?>';
        var name = $('#cmt_name').val();
        var content = $('#cmt_content').val();
        var parent_class = 'Product';
        $.ajax({
            /*url:'<?php //echo Yii::app()->createUrl("product/ajaxComment"); ?>',*/
            url:'<?php echo $_SERVER['REQUEST_URI']; ?>',
            type:'POST',
            dataType:'json',
            data:{
                comment:{
                    name:name,content:content,parent_id:parent_id,parent_class:parent_class
                }
            },
            cache:false,
            success:function(data){
                if(data.success){
                    $('#comment-box').empty();
                    $('#comment-box').html(data.html);
                    resetForm();
                }
                else{
                    $('#cmt_error').text(data.message);
                    $('#cmt_error').slideDown('slow').delay('2000').slideUp('slow');
                    $('#cmt_button').removeAttr('disabled');
                    $('#cmt_button').css('opacity','1');
                }
            }
        });
        return false;
    });

    function resetForm(){
        $('#cmt_name').val('');
        $('#cmt_content').val('');
        $('#cmt_button').removeAttr('disabled');
        $('#cmt_button').css('opacity','1');
    }

</script>