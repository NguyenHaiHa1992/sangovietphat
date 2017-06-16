<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('News Management');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span><?php echo iPhoenixLang::admin_t('Update news');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<div>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('List news');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/news')?>'"/>
            <input type="button" class="button" value="<?php echo iPhoenixLang::admin_t('Add news');?>" style="width:180px;" onClick="parent.location='<?php echo iPhoenixUrl::createUrl('admin/news/create')?>'"/>
            <div class="line top bottom"></div>	
        </div>
		<?php $form=$this->beginWidget('CActiveForm', array('method'=>'post','enableAjaxValidation'=>true)); ?>	
		<!--begin left content-->
		<div class="fl" style="width:680px; min-height: 180px">
			<ul>
				<?php 
				$list=array();
				foreach ($list_category as $id=>$level){
					$cat=NewsCategory::model()->findByPk($id);
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
						<?php echo $form->textField($model,'name',array('style'=>'width:500px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'name'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'alias'); ?>
						<?php echo $form->textField($model,'alias',array('style'=>'width:500px;','maxlength'=>'256')); ?>	
						<?php echo $form->error($model, 'alias'); ?>				
					</li>
				</div>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'home'); ?>
						<?php echo $form->checkbox($model,'home'); ?>	
						<?php echo $form->error($model, 'home'); ?>				
					</li>
				</div>
				<div class="row none">
					<li>
						<?php echo $form->labelEx($model,'new'); ?>
						<?php echo $form->checkbox($model,'new'); ?>	
						<?php echo $form->error($model, 'new'); ?>				
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
						<?php echo $form->textField($model,'order_view',array('style'=>'width:300px;')); ?>	
						<?php echo $form->error($model, 'order_view'); ?>				
					</li>
				</div>					
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'tmp_suggest_ids'); ?>
						<?php echo $form->textField($model,'tmp_suggest_ids',array('readonly'=>'readonly','style'=>'width:300px')); ?>	
						<?php echo $form->error($model,'tmp_suggest_ids'); ?>
						<a title="Chọn Tin tức" onclick="showPopUp('list_suggest_news');return false;" id="btn-add-product" class="button" style="width: 100px;text-decoration: none;">Chọn</a>			
					</li>
				</div>	
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'introimage_id'); ?>
						<?php echo $this->renderPartial('/image/_signupload', array('model'=>$model,'attribute'=>'introimage_id','h'=>60,'w'=>60)); ?>		
						<?php echo $form->error($model, 'introimage_id'); ?>
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
		<div>
			<ul>
				<div class="row">
					<li>
						<?php echo $form->labelEx($model,'images'); ?>
						<?php echo $this->renderPartial('/image/_galleryupload', array('model'=>$model,'attribute'=>'tmp_image_ids','h'=>100,'w'=>100)); ?>		
						<?php echo $form->error($model, 'images'); ?>
					</li>
				</div>
			</ul>
		</div>
		<div class="row">
			<div id="tabContainer">
				<div id="tabMenu">
					<ul class="menu">
						<li><a id="select1" class="active"><span><?php echo $form->label($model, 'introtext'); ?></span></a></li>
						<li><a id="select2"><span><?php echo $form->label($model, 'content'); ?></span></a></li>
					</ul>
				</div>
				<div id="tabContent">
					<div id="tab1" class="content active">
						<div class="clear"></div>
			            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'introtext','language'=>Yii::app()->params['admin_lang'],'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
						<?php echo $form->error($model, 'introtext'); ?>
					</div>
					<div id="tab2" class="content">
						<div class="clear"></div>
			            <?php $this->widget('application.extensions.tinymce.ETinyMce',array('model'=>$model,'attribute'=>'content','language'=>Yii::app()->params['admin_lang'],'editorTemplate'=>'full','htmlOptions'=>array('style'=>'width:100%;height:500px'))); ?>
						<?php echo $form->error($model, 'content'); ?>
					</div>
				</div>
			</div><!--end tabContainer-->
		</div>
		<div>
			<ul>
                <li>
					<input type="reset" class="button" value="<?php echo iPhoenixLang::admin_t('Cancel','main');?>" style="margin-left:15px; width:125px;" />
					<input type="submit" class="button" value="<?php echo iPhoenixLang::admin_t('Update','main');?>" style="margin-left:20px; width:125px;" />	
				</li>
			</ul>
		</div>
		<!--end left content-->
		<?php $this->endWidget(); ?>
		<div class="clear"></div>          
	</div>
</div>
<!--end inside content-->
<!-- Auto save selection button -->
<div class="toolbar">
	<?php echo CHtml :: HiddenField ('status','');?>
	<select id="autoSave">
		<option value="off" selected="selected"><?php echo iPhoenixLang::admin_t('Not auto save','main');?></option>
		<option value="on"><?php echo iPhoenixLang::admin_t('Auto save (every 60s)','main');?></option>
	</select>
</div>
<?php	echo $this->renderPartial('_list_suggest_news', 
								array(
									'class_checkbox'=>'SuggestNews',
									'class'=>'list_suggest_news',
									'attribute'=>'tmp_suggest_ids',
									'suggest'=>$suggest,
									'list_category'=>$list_category,
									'condition_search'=> 'id <> '.$model->id
								));?>

<script type="text/javascript">
/*** Auto save model after 1 minute script ***/
setInterval (
     function () {
		var autosave = $("#autoSave option:selected").val(); // determine whether the autosave function is on of off
        var status = $("#status").val() // determine whether the status of being no autosave function is running
        if (status != "on" && autosave == "on") // if no function is running, then run the function
        {
           $ ("#btn-save").attr ("disabled", true); // for the function is running, the user can not press the save button
           $.ajax ({
              url: "<?php echo Yii :: app () -> createUrl ('admin/news/autoSave',array('id'=>$model->id))?>", // ​​call a function to autosave
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
$('#News_name').blur(function(){
	var name = $(this).val();
	$('#News_alias').val(createAlias(name));
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
	output = output.replace(/[^a-z0-9\s]/gi, '');

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
</script>