<?php
    $this->widget('wMetaTag',array(
    'setting'=>'CONTACT',
));?>
<div class="modal fade" id="myMap" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <div class="modal-body" id="map_content">
                <?php echo Setting::s('BRANCH_HANOI_IFRAME','INFORMATION');?>
            </div>
        </div>
    </div>
</div>
<div class="col-md-12 pull-right" id="main-content">
    <div class="col-sm-12">
        <!-- wContentBox -->
        <div id="contact" class="wContentBox">
            <div class="contentBox">
                <!--<div class="title_box">-->
                    <!-- wBreadcrumb -->
                    <?php
//                    $this->widget('wBreadCrumb',array(
//                        'data'=>array('Trang chủ'=>Yii::app()->createUrl('site/index')),
//                    ));
                    ?>
                    <!-- end of wBreadcrumb -->
                <!--</div>-->
                <div class="content_box">
                    <div id="address-company">
                        <div class="wrapper">
                            <div class="name-company"><?php echo Setting::s('COMPANY_NAME','INFORMATION');?></div>
                            <div class="agency">
                                <button type="button" class="btn map select-map" id="1">
                                </button>
                                <div class="detail">
                                    <span><span class="high-light">Hà Nội </span>: <?php echo Setting::s('BRANCH_HANOI_ADDRESS','INFORMATION');?></span>
                                    <span>Điện thoại: <?php echo Setting::s('BRANCH_HANOI_PHONE','INFORMATION');?></span>
                                    <span>Fax: <?php echo Setting::s('BRANCH_HANOI_FAX','INFORMATION');?></span>
                                </div>
                            </div>
                            <div class="agency">
                                <button type="button" class="btn map select-map" id="2">
                                </button>
                                <div class="detail">
                                    <span><span class="high-light">Hải Phòng </span>: <?php echo Setting::s('BRANCH_HAIPHONG_ADDRESS','INFORMATION');?></span>
                                    <span>Điện thoại: <?php echo Setting::s('BRANCH_HAIPHONG_PHONE','INFORMATION');?></span>
                                    <span>Fax: <?php echo Setting::s('BRANCH_HAIPHONG_FAX','INFORMATION');?></span>
                                </div>
                            </div>
                            <div class="email"><span class="high-light">Email: <?php echo Setting::s('EMAIL','INFORMATION');?></span>  </div>
                        </div>
                    </div>
                    <div id="contact-form">
                        <div class="form-group">
                            <label for="inputFullname" class="control-label">Họ và tên</label>
                            <input type="text" id="inputFullname" placeholder="Họ và tên">
                            <span class="error" id="error_name"> *Thông báo lỗi</span>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail" class=" control-label">Email</label>
                            <input type="email" id="inputEmail" placeholder="Email">
                            <span class="error" id="error_email"> *Thông báo lỗi</span>
                        </div>
                        <div class="form-group">
                            <label for="inputPhone" class="control-label">Điện thoại</label>
                            <input type="tel" id="inputPhone" placeholder="Điện thoại">
                            <span class="error" id="error_tel"> *Thông báo lỗi</span>
                        </div>
                        <!--<div class="form-group">
                            <label for="selectCity" class="control-label">Tỉnh/Thành phố</label>
                            <select id="selectCity">
                                <?php /*foreach($list_city as $key => $city):*/?>
                                    <option value="<?php /*echo $key; */?>"><?php /*echo $city;*/?></option>
                                <?php /*endforeach;*/?>
                            </select>
                            <span class="error" id="city_error"> *Thông báo lỗi</span>
                        </div>
                        <div class="form-group">
                            <label for="selectDistrict" class="control-label">Quận/Huyện</label>
                            <select id="selectDistrict">
                                <option value="" selected>Quận/ Huyện</option>
                            </select>
                            <span class="error" id="district_error"> *Thông báo lỗi</span>
                        </div>-->
                        <div class="form-group">
                            <label for="inputAddress" class="col-sm-3 control-label">Địa chỉ</label>
                            <textarea id="inputAddress" placeholder="Địa chỉ"></textarea>
                            <span class="error" id="error_address"> *Thông báo lỗi</span>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle" class="control-label">Tiêu đề</label>
                            <input type="text" id="inputTitle" placeholder="Tiêu đề">
                            <span class="error" id="error_title"> *Thông báo lỗi</span>
                        </div>
                        <div class="form-group">
                            <label for="inputContent" class="col-sm-3 control-label">Nội dung</label>
                            <textarea id="inputContent" rows="5" placeholder="Nội dung"></textarea>
                            <span class="error" id="error_content"> *Thông báo lỗi</span>
                        </div>
                        <p id="send_success" style="color: blue;display: none">Bạn đã gửi liên hệ thành công, chúng tôi sẽ phản hồi bạn trong thời gian sớm nhất!</p>
                        <div class="group-btn">
                            <button id="btn_cancel" type="reset" class="btn-style-01">Hủy</button>
                            <button id="btn_submit" type="submit" class="btn-style-01">Gửi thông tin</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end of wContentBox -->
    </div>
</div>
<script type="text/javascript">
    /*$(document).on('change','#selectCity',function(){
        var id = $('#selectCity').val();
        $("#selectDistrict").find("option").remove();
        $.ajax({
            'type' : 'POST',
            'url' : '<?php //echo CController::createUrl("contact/UpdateDropdownlist");?>',
            'data' : 'id='+id,
            'cache' : false,
            'success' : function(string) {
                $("#selectDistrict").append(string);
            }
        });
    });*/

    $(document).ready(function(){
        $('.select-map').click(function(e){
            e.preventDefault();
            var a = $(this).attr('id');
            var content = '';
            if(a == '1'){
                content = '<?php echo Setting::s('BRANCH_HANOI_IFRAME','INFORMATION');?>';
            }
            else{
                content = '<?php echo Setting::s('BRANCH_HAIPHONG_IFRAME','INFORMATION');?>';
            }
            $('#map_content').html(content);
            $('#myMap').modal('show');
            return false;
        });
    });

    $(document).ready(function(){
        $('.select-video').click(function(e){
            e.preventDefault();
            var a = $(this).attr('href');
            if(a == 1){
                $('#branch_hanoi').attr('display','block');
                $('#branch_haiphong').attr('display','none');
            }
            else{
                $('#branch_hanoi').attr('display','none');
                $('#branch_haiphong').attr('display','block');
            }
            return false;
        });
    });

    $(document).on('click','#btn_submit',function(e){
        e.preventDefault();
        $('#btn_submit').attr('disabled','disabled');
        $('#btn_cancel').attr('disabled','disabled');
        $('#btn_submit').css('opacity','0.5');
        $('#btn_cancel').css('opacity','0.5');
        var fullname = $('#inputFullname').val();
        var email = $('#inputEmail').val();
        var phone = $('#inputPhone').val();
        /*var city = $('#selectCity >option:selected').val();
        var district = $('#selectDistrict >option:selected').val();*/
        var address = $('#inputAddress').val();
        var title = $('#inputTitle').val();
        var content = $('#inputContent').val();
        $.ajax({
            url:'<?php echo Yii::app()->createUrl('contact/ajaxContact'); ?>',
            type:'POST',
            dataType:'json',
            data:{fullname:fullname,email:email,phone:phone,address:address,title:title,content:content},
            cache:false,
            success:function(data){
                if(data.success){
                    $('#send_success').slideDown('slow').delay('3000').slideUp('slow');
                    resetForm();
                }
                else{

                    $.each(data.message,function(key,value){
                        $('#error_'+key).text(value[0]);
                        $('#error_'+key).slideDown('slow').delay('2000').slideUp('slow');
                    });
                    $('#btn_submit').removeAttr('disabled');
                    $('#btn_submit').css('opacity','1');
                    $('#btn_cancel').attr('disabled','disabled');
                    $('#btn_cancel').css('opacity','1');
                }
            }
        });
        return false;
    });

    function resetForm(){
        $('#inputFullname').val('');
        $('#inputEmail').val('');
        $('#inputPhone').val('');
        /*$('#selectCity >option:selected').val('');
        $('#selectDistrict >option:selected').val('');*/
        $('#inputAddress').val('');
        $('#inputTitle').val('');
        $('#inputContent').val('');
        $('#btn_submit').removeAttr('disabled');
        $('#btn_submit').css('opacity','1');
        $('#btn_cancel').attr('disabled','disabled');
        $('#btn_cancel').css('opacity','1');
    }
</script>