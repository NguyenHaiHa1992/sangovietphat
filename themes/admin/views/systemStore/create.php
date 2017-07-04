<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin name-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('Product Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon"><span><?php echo iPhoenixLang::admin_t('Add Product');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end name-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List products');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/product')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
        <div class="fl" style="width:580px; min-height: 180px">
            <ul>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'name'); ?>
                        <?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>
                        <?php echo $form->error($model, 'name'); ?>
                    </li>
                </div>
                <div class="row none">
                    <li>
                        <?php echo $form->labelEx($model,'status'); ?>
                        <?php echo $form->checkbox($model,'status'); ?>
                        <?php echo $form->error($model, 'status'); ?>
                    </li>
                </div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'order_view'); ?>
                        <?php echo $form->textField($model,'order_view',array('style'=>'width:300px')); ?>
                        <?php echo $form->error($model,'order_view'); ?>
                        <a name="Chọn sản phẩm" onclick="showPopUp('list_suggest_product');return false;" id="btn-add-product" class="button" style="width: 50px;text-decoration: none;">Chọn</a>
                    </li>
                </div>
            </ul>
        </div>
        <div class="clear"></div>
        <div style="clear: both; margin: 0 0 0 10px;">
                <ul>
        <li>
                                <input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />
                                <input type="submit" class="button" value="Add" style="margin-left:20px; width:125px;" />
                        </li>
                </ul>
        </div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<?php /*echo $this->renderPartial('_form_component',array('model'=>$model));*/?>
<?php /*  echo $this->renderPartial('_list_suggest_product',
								array(
									'class_checkbox'=>'SuggestProduct',
									'class'=>'list_suggest_product',
									'attribute'=>'order_view',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> null
								)); */ ?>
<?php /*echo $this->renderPartial('_list_suggest_news',
    array(
        'class_checkbox'=>'SuggestNews',
        'class'=>'list_suggest_news',
        'attribute'=>'tmp_news_ids',
        // 'news'=>$news,
        'suggest'=>$suggest,
        'list_category_news'=>$list_category_news,
        'condition_search'=> null
    )); */?>
<script type="text/javascript">
/*** Auto save model after 1 minute script ***/
setInterval (
     function () {
        var status = $ ("#status"). val (); // determine whether the status of being no autosave function is running
        var autosave = $("#autoSave option:selected").val(); // determine whether the autosave function is on of off
        if (status != "on" && autosave == "on") // if no function is running, then run the function
        {
           $ ("#btn-save").attr ("disabled", true); // for the function is running, the user can not press the save button
           $.ajax ({
              url: "<?php echo Yii :: app () -> createUrl ('admin/product/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
              type: "post",
              dataType: "json",
              data: $('form',$('.folder-content')).serialize(),
              beforeSend: function () {
                    $ ("#status").val ("on");
              },
              success: function (data) {
                    $ ("#status").val("off");
                    if (data.success) {
						console.log('auto save success');
                    }
                    else {
                       $ ("#btn-save").attr("disabled", false);
                    }
              }
          });
       }
    }, 
    60000 // auto save operation performed 1 minute once
);

//Convert signed string to unsigned string
$('#Product_name').blur(function(){
	var name = $(this).val();
	$('#Product_alias').val(createAlias(name));
});

function createAlias(string) {
	// First, remove any multi space with single space
	string = string.replace(/ +(?= )/g,'');

	// Second, remove first and last space if had
	string = string.trim();

	// Sigend to un-signed 
    var signedChars     = "àảãáạăằẳẵắặâầẩẫấậđèẻẽéẹêềểễếệìỉĩíịòỏõóọôồổỗốộơờởỡớợùủũúụưừửữứựỳỷỹýỵÀẢÃÁẠĂẰẲẴẮẶÂẦẨẪẤẬĐÈẺẼÉẸÊỀỂỄẾỆÌỈĨÍỊÒỎÕÓỌÔỒỔỖỐỘƠỜỞỠỚỢÙỦŨÚỤƯỪỬỮỨỰỲỶỸÝỴ";
    var unsignedChars   = "aaaaaaaaaaaaaaaaadeeeeeeeeeeeiiiiiooooooooooooooooouuuuuuuuuuuyyyyyAAAAAAAAAAAAAAAAADEEEEEEEEEEEIIIIIOOOOOOOOOOOOOOOOOUUUUUUUUUUUYYYYY";
    var pattern = new RegExp("[" + signedChars + "]", "g");
    var output = string.replace(pattern, function (m, key, input) {
        return unsignedChars.charAt(signedChars.indexOf(m));
    });

	// Remove all special characters
	//output = output.replace(/[^a-z0-9\s]/gi, '');

	// Replace white space with dash, and lowercase all characters
	output = output.replace(/\s+/g, '-').toLowerCase();

	return output;
}

$('#select1').click(function () {
	$("#select1").attr("class","active");	
	$("#select2").attr("class","");	
	$("#select3").attr("class","");	
	$("#select4").attr("class","");
	$("#select5").attr("class","");
	$("#select6").attr("class","");

    $('#tab1').attr("class","content active");	
    $('#tab2').attr("class","content");	
    $('#tab3').attr("class","content");	
    $('#tab4').attr("class","content");
    $('#tab5').attr("class","content");
    $('#tab6').attr("class","content");	
});
$('#select2').click(function () {
	$("#select2").attr("class","active");	
	$("#select1").attr("class","");	
	$("#select3").attr("class","");	
	$("#select4").attr("class","");
	$("#select5").attr("class","");
	$("#select6").attr("class","");

    $('#tab2').attr("class","content active");	
    $('#tab1').attr("class","content");	
    $('#tab3').attr("class","content");	
    $('#tab4').attr("class","content");	
    $('#tab5').attr("class","content");	
    $('#tab6').attr("class","content");
});
$('#select3').click(function () {
	$("#select3").attr("class","active");	
	$("#select1").attr("class","");	
	$("#select2").attr("class","");	
	$("#select4").attr("class","");
	$("#select5").attr("class","");
	$("#select6").attr("class","");

    $('#tab3').attr("class","content active");	
    $('#tab1').attr("class","content");	
    $('#tab2').attr("class","content");	
    $('#tab4').attr("class","content");	
    $('#tab5').attr("class","content");	
    $('#tab6').attr("class","content");
});
$('#select4').click(function () {
	$("#select4").attr("class","active");	
	$("#select1").attr("class","");	
	$("#select2").attr("class","");	
	$("#select3").attr("class","");
    $("#select5").attr("class","");
    $("#select6").attr("class","");

    $('#tab4').attr("class","content active");	
    $('#tab1').attr("class","content");	
    $('#tab2').attr("class","content");	
    $('#tab3').attr("class","content");	
    $('#tab5').attr("class","content");	
    $('#tab6').attr("class","content");
});
$('#select5').click(function () {
	$("#select5").attr("class","active");	
	$("#select1").attr("class","");	
	$("#select2").attr("class","");	
	$("#select3").attr("class","");
    $("#select4").attr("class","");
	$("#select6").attr("class","");

    $('#tab5').attr("class","content active");	
    $('#tab1').attr("class","content");	
    $('#tab2').attr("class","content");	
    $('#tab3').attr("class","content");	
    $('#tab4').attr("class","content");	
    $('#tab6').attr("class","content");
});
$('#select6').click(function () {
	$("#select6").attr("class","active");	
	$("#select1").attr("class","");	
	$("#select2").attr("class","");	
	$("#select3").attr("class","");
    $("#select4").attr("class","");
	$("#select5").attr("class","");

    $('#tab6').attr("class","content active");	
    $('#tab1').attr("class","content");	
    $('#tab2').attr("class","content");	
    $('#tab3').attr("class","content");	
    $('#tab4').attr("class","content");	
    $('#tab5').attr("class","content");
});
</script>