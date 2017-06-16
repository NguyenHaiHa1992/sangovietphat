<?php $this->layout = 'news_layout';?>
<?php
    $data = News::getItemById($_GET['id']);
    $this->widget('wMetaTag',array(
        'data'=>$data,
    ));
?>
<div class="col-md-8" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="news-detail" class="wContentBox">
            <div class="contentBox">
                <div class="title_box">
                    <ol class="breadcrumb">
                        <?php $this->widget('wBreadCrumb',array(
                            'data'=>iPhoenixUrl::createBreadcrumb($data),
                        ));?>
                    </ol>
                </div>
                <div class="content_box">
                    <div id="content-news">


                        <!-- wContentBox -->
                        <?php
                        $this->widget('wContentBox',array(
                            'data'=>$data,
                            'template'=>'
                                <div class="wDetailBox">
                                <div class="detailBox">
                                    <div class="title_box" title="">{name}</div>
                                    <span class="time">Đăng lúc <span>{format_time}</span></span>
                                    <div class="content">
                                        <p>{content}.</p>
                                    </div>
                                    <a class="author" title="">{author_name}</a>
                                </div>
                            </div>
                            ',
                        ));
                        ?>
                        <!-- end of wContentBox #detail-news-->


                    </div>
                    <div class="break-line"></div>
                    <?php /*
                        $this->widget('wFacebookLikebox',array(

                        ));
                    */?>
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
                                'data'=>Comment::getCommentsWithPager($_GET['id'],'News',5),
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
                                        'pages'=>Comment::getCommentsPager($_GET['id'],'News',5),
                                    ));
                                    ?>
                                </ul>
                            </div>
                        </div><!--end .wrapper-->
                    </div>
                    <!-- end of wCommentBox -->
                    <div id="relate-news">
                        <div class="title">Các tin liên quan</div>
                        <!-- wListItem -->
                        <?php
                        $this->widget('wListItem', array(
                            'class'=>'list-unstyled',
                            'data'=>$data->relatedNews,
                            'template'=>'
                                    <a href="{detail_url}">{name}.</a>
                                ',
                        ));
                        ?>
                        <!-- end of wListItem -->
                    </div>

                </div>
            </div>
        </div>
        <!-- end of wContentBox -->
    </div>
</div>

<script type="text/javascript">
    $(document).on('click','#cmt_button',function(e){
        e.preventDefault();
        $('#cmt_button').attr('disabled','disabled');
        $('#cmt_button').css('opacity','0.5');
        var parent_id = '<?php echo $_GET["id"]; ?>';
        var name = $('#cmt_name').val();
        var content = $('#cmt_content').val();
        var parent_class = 'News';
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