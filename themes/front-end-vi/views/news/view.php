<?php $this->layout = 'news_layout';?>
<?php
    $data = News::getItemById($_GET['id']);
    $this->widget('wMetaTag',array(
        'data'=>$data,
    ));
    // set og_image
    if(isset($data->introimage) && $data->introimage ){
        $image = $data->introimage->getAbsoluteUrl();
        $this->og_image = $image;
    }    
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
                    
                        <a href="https://twitter.com/share" class="twitter-share-button">Tweet</a> 
                        <script>
                            !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');
                        </script>
                        
                        <script type="text/javascript" src="https://apis.google.com/js/plusone.js" ></script>
                        <g:plusone size="medium" ></g:plusone>
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
                                    <div class="wDetailBox" data-id="{id}">
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
<div id="button-reply" style="display: none">
    <button id="" type="submit" class="submit-btn btn-style-01 pull-right comment-button-reply">Trả lời</button>
</div>
<div id="box-comment" style="display: none">
    <div class="write-cm-box">
        <div class="content">
            <p id="" style="color: red;display: none"></p>
            <textarea id="" rows="5" placeholder="" class="content-comment"></textarea>
            <input id="" type="text" class="userName pull-left" placeholder="Tên của bạn">
            <button id="" type="submit" class="submit-btn btn-style-01 button-reply-submit">Gửi bình luận</button>
        </div>
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
                    getCommentChild();
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

    getCommentChild();
        
    // click button reply
    $(document).on('click', '.comment-button-reply', function(e){
        var html = $('#box-comment').html();
        $(this).before(html);
        $(this).parent().find('textarea').first().focus();
        $(this).hide();
    });
    
    // submit reply
    $(document).on('click','.button-reply-submit',function(e){
        e.preventDefault();
        $(this).attr('disabled','disabled');
        $(this).css('opacity','0.5');
        var parent_id = 0;
        var name = $(this).parent().find('input').first().val();
        var content = $(this).parent().find('textarea').first().val();
        var parent_class = 'Product';
        var comment_parent = $(this).closest('li').find('.wDetailBox').first().attr('data-id');
        var that = $(this);
        $.ajax({
            /*url:'<?php //echo Yii::app()->createUrl("product/ajaxComment"); ?>',*/
            url:'<?php echo $_SERVER['REQUEST_URI']; ?>',
            type:'POST',
            dataType:'json',
            data:{
                comment:{
                    name:name, content:content, parent_id:parent_id,
                    parent_class:parent_class, comment_parent: comment_parent
                }
            },
            cache:false,
            success:function(data){
                if(data.success){
                    var html = '<li class="item item1">'
                                    + '<div class="wDetailBox" data-id="'+ data.id +'">'
                                        + '<div class="avatar-user"><img src="/themes/front-end-vi/images/data/avatar.png" alt="..."></div>'
                                        + '<div class="detailBox">'
                                            + '<a class="author" title="">'+name+'</a>'
                                            + '<span class="time">Gửi lúc '+data.created_time+'</span>'
                                            + '<div class="content">'+content+'</div>'
                                        + '</div>'
                                    + '</div></li>';
                    that.closest('li').find('ul').append(html);
                    that.parent().find('input').first().val('');
                    that.parent().find('textarea').first().val('');
                    that.removeAttr('disabled');
                    that.css('opacity','1');
                }
                else{
                    that.parent().find('p').first().text(data.message);
                    that.parent().find('p').first().slideDown('slow').delay('2000').slideUp('slow');
                    that.removeAttr('disabled');
                    that.css('opacity','1');
                }
            }
        });
        return false;
    });
    
    function getCommentChild(){
        //get comment child
        var ids = [];
        if($('#list-comments').length){
            $('#list-comments').find('.wDetailBox').each(function(item, i){
                ids.push($(this).attr('data-id'));
            });
        }
        if(ids.length){
            $.ajax({
                url: '/product/commentChild',
                type: 'GET',
                data: {ids: ids.join()},
                dataType: 'JSON',
                success: function(data){
    //                if(data.comments){
                        ids.forEach(function(id){
                            var html = '<ul id="" class="wListItem list-unstyled" style="margin-left: 85px">';
                            if(data.comments && data.comments[id]){
                                var listComment = data.comments[id];
                                html += '';
                                listComment.forEach(function(cmt){
                                    html += '<li class="item item1">'
                                        + '<div class="wDetailBox" data-id="'+ cmt.id +'">'
                                            + '<div class="avatar-user"><img src="/themes/front-end-vi/images/data/avatar.png" alt="..."></div>'
                                            + '<div class="detailBox">'
                                                + '<a class="author" title="">'+cmt.name+'</a>'
                                                + '<span class="time">Gửi lúc '+cmt.created_time+'</span>'
                                                + '<div class="content">'+cmt.content+'</div>'
                                            + '</div>'
                                        + '</div></li>';
                                });
    //                            html += '</ul>';
                            }
                            html += '</ul>';
                            html += $('#button-reply').html();
                            $('.wDetailBox').each(function(item){
                                var attrId = $(this).attr('data-id');
                                if(attrId == id){
                                    $(this).after(html);
                                }
                            });
                        });
    //                }
                }
            });
        }
    }
</script>