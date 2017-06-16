<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin name-->
		<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('Product Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span><?php echo iPhoenixLang::admin_t('Update product');?></span></a></li>
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
				<?php 
					$list=array();
					foreach ($list_category as $id=>$level){
						$cat=ProductCategory::model()->findByPk($id);
						$view = "";
						for($i=1;$i<$level;$i++){
							$view .="---";
						}
						$list[$id]=$view." ".$cat->name." ".$view;
					}
				?>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'cat_id'); ?>
						<?php echo $form->dropDownList($model,'cat_id',$list,array('style'=>'width:300px')); ?>
						<?php echo $form->error($model, 'cat_id'); ?>
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'name'); ?>
						<?php echo $form->textField($model,'name',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'name'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'alias'); ?>
						<?php echo $form->textField($model,'alias',array('style'=>'width:300px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'alias'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'price'); ?>
						<?php echo $form->textField($model,'price',array('style'=>'width:300px;','maxlength'=>'32')); ?>
						<?php echo $form->error($model, 'price'); ?>				
					</li>
				</div>
				<div class="row" style="display:none">
					<li>
						<?php echo $form->labelEx($model,'old_price'); ?>
						<?php echo $form->textField($model,'old_price',array('style'=>'width:300px;','maxlength'=>'32')); ?>
						<?php echo $form->error($model, 'old_price'); ?>				
					</li>
				</div>
				<div class="row none">
					<li>
						<?php echo $form->labelEx($model,'status'); ?>
						<?php echo $form->checkbox($model,'status'); ?>	
						<?php echo $form->error($model, 'status'); ?>				
					</li>
				</div>	
				<div class="row none">
					<li>
						<?php echo $form->labelEx($model,'home'); ?>
						<?php echo $form->checkbox($model,'home'); ?>	
						<?php echo $form->error($model, 'home'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'new'); ?>
						<?php echo $form->checkbox($model,'new'); ?>	
						<?php echo $form->error($model, 'new'); ?>				
					</li>
				</div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'model'); ?>
                        <?php echo $form->textField($model,'model',array('style'=>'width:300px')); ?>
                        <?php echo $form->error($model,'model'); ?>
                    </li>
                </div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'thickness'); ?>
						<?php echo $form->textField($model,'thickness',array('style'=>'width:300px')); ?>
						<?php echo $form->error($model,'thickness'); ?>
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'width'); ?>
						<?php echo $form->textField($model,'width',array('style'=>'width:300px')); ?>
						<?php echo $form->error($model,'width'); ?>
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'height'); ?>
						<?php echo $form->textField($model,'height',array('style'=>'width:300px')); ?>
						<?php echo $form->error($model,'height'); ?>
					</li>
				</div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'warranty'); ?>
                        <?php echo $form->textField($model,'warranty',array('style'=>'width:300px')); ?>
                        <?php echo $form->error($model, 'warranty'); ?>
                    </li>
                </div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
                        <?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>
                        <?php echo $form->error($model,'tmp_suggest_ids'); ?>
                        <a name="Chọn sản phẩm" onclick="showPopUp('list_suggest_product');return false;" id="btn-add-product" class="button" style="width: 50px;text-decoration: none;">Chọn</a>
                    </li>
                </div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'introimage_id'); ?>
						<?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'introimage_id','h'=>60,'w'=>60)); ?>		
						<?php echo $form->error($model, 'introimage_id'); ?>
					</li>
				</div>
                <div class="row">
                    <li>
                        <?php echo $form->labelEx($model,'detailimage_id'); ?>
                        <?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'detailimage_id','h'=>60,'w'=>60)); ?>
                        <?php echo $form->error($model, 'detailimage_id'); ?>
                    </li>
                </div>
			</ul>
		</div>
		<div style="width:480px;" class="fr">
			<ul>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'meta_title'); ?>
						<?php echo $form->textArea($model,'meta_title',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
						<?php echo $form->error($model, 'meta_title'); ?>
					</li>
				</div>		
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'meta_keyword'); ?>
						<?php echo $form->textArea($model,'meta_keyword',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
						<?php echo $form->error($model, 'meta_keyword'); ?>
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'meta_description'); ?>
						<?php echo $form->textArea($model,'meta_description',array('style'=>'width:300px; height:80px','maxlength'=>'256')); ?>		
						<?php echo $form->error($model, 'meta_description'); ?>
					</li>
				</div>
			</ul>
		</div>
		<div class="clear"></div>
		<div class="row">
			<div id="tabContainer">
				<div id="tabMenu">
					<ul class="menu">
						<li><a id="select1" class="active"><span><?php echo $form->label($model, 'introduction'); ?></span></a></li>
						<li><a id="select2"><span><?php echo $form->label($model, 'description'); ?></span></a></li>
					</ul>
				</div>
				<div id="tabContent">
					<div id="tab1" class="content active">
						<div class="clear"></div>
			            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'introduction','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
						<?php echo $form->error($model, 'introduction'); ?>
					</div>
					<div id="tab2" class="content">
						<div class="clear"></div>
			            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'description','language'=>Yii::app()->language,'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
						<?php echo $form->error($model, 'description'); ?>
					</div>
				</div>
			</div><!--end tabContainer-->
		</div>
		<div style="clear: both; margin: 0 0 0 10px;">
			<ul>
                <li>
					<input type="reset" class="button" value="Cancel" style="margin-left:15px; width:125px;" />
					<input type="submit" class="button" value="Update" style="margin-left:20px; width:125px;" />
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<?php  echo $this->renderPartial('_list_suggest_product',
    array(
        'class_checkbox'=>'SuggestProduct',
        'class'=>'list_suggest_product',
        'attribute'=>'tmp_suggest_ids',
        'suggest'=>$suggest,
        'list_category'=>$list_category,
        'condition_search'=> null
    )); ?>
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