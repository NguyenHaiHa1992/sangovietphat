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
        'data'=>Comment::getCommentsWithPager($parent_id,$parent_class,5),
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
                'pages'=>Comment::getCommentsPager($parent_id,$parent_class,2),
            ));
            ?>
        </ul>
    </div>