<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Group Paramenters');?> <?php echo iPhoenixLang::admin_t($model->category);?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('Group Paramenters');?> <?php echo iPhoenixLang::admin_t($model->category);?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
             <!--begin box search-->
         	<?php 
			Yii::app()->clientScript->registerScript('search', "
				$('#setting-search').submit(function(){
				$.fn.yiiGridView.update('setting-list', {
					data: $(this).serialize()});
					return false;
				});");
			?>
            <div class="box-search">            
                <h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
                <?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'setting-search')); ?>
                <!--begin left content-->
                <div class="fl" style="width:600px;">
                    <ul>
                        <li>
                         	<?php echo $form->label($model,'name'); ?>
                         	<?php $this->widget('CAutoComplete', array(
                         	'model'=>$model,
                         	'attribute'=>'name',
							'url'=>iPhoenixUrl::createUrl('admin/setting/suggestName',array('category'=>$model->category)),
							'htmlOptions'=>array(
								'style'=>'width:230px;',
								),
						)); ?>				
                        </li>
                        <li>
                        <?php 
							echo CHtml::submitButton(iPhoenixLang::admin_t('Filter','main'),
    						array(
    							'class'=>'button',
    							'style'=>'margin-left:153px; width:95px;',
    							''
    						)); 						
    					?>
                        </li>
                    </ul>
                </div>
                <!--end left content-->           
                <?php $this->endWidget(); ?>
                <div class="clear"></div>
                <div class="line top bottom"></div>
            </div>
            <!--end box search-->		
			<?php 
			$this->widget('iPhoenixGridView', array(
				'iclass' => 'Setting',
  				'id'=>'setting-list',
  				'dataProvider'=>$model->search(),		
  				'columns'=>array(			
    				array(
						'name'=>'name',
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),
					array(
						'name'=>'value',
						'headerHtmlOptions'=>array('width'=>'30%','class'=>'table-title'),
                		'type'=>'html',
                		'value' => '"<a class=\'edit-value-".$data->id."\'>$data->value</a>"',
					), 	
					array(
						'name'=>'description',
						'headerHtmlOptions'=>array('width'=>'30%','class'=>'table-title'),
					), 																   	  		
 	 			),
 	 			'template'=>'{displaybox}{summary}{items}{pager}',
  				'summaryText'=>'{count} '.iPhoenixLang::admin_t('Parameters'),
 	 			'pager'=>array('class'=>'CLinkPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous','main'),'nextPageLabel'=>iPhoenixLang::admin_t('Next','main').' >','htmlOptions'=>array('class'=>'pages fr')),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	
	<script type="text/javascript">
		$("body").ajaxComplete(function() {
			$("a[class^=edit-value-]").editable("<?php echo iPhoenixUrl::createUrl('admin/setting/edit')?>", {
				submitdata : function (value,settings){
								return {"id":$(this).attr("class").substr("11"),"attribute":"value"};
							},
				indicator : "<?php echo iPhoenixLang::admin_t('Saving...','main');?>",
				width : '80%',
				tooltip   : "<?php echo iPhoenixLang::admin_t('Click to edit...','main');?>",
				type : "text",
				submit   : "<?php echo iPhoenixLang::admin_t('Save','main');?>",
				name : "value",
				ajaxoptions : {"type":"GET"}
			 });
		});
	
		$("a[class^=edit-value-]").editable("<?php echo iPhoenixUrl::createUrl('admin/setting/edit')?>", {
			submitdata : function (value,settings){
							return {"id":$(this).attr("class").substr("11"),"attribute":"value"};
						},
			indicator : "<?php echo iPhoenixLang::admin_t('Saving...','main');?>",
			width : '80%',
			tooltip   : "<?php echo iPhoenixLang::admin_t('Click to edit...','main');?>",
			type : "text",
			submit   : "<?php echo iPhoenixLang::admin_t('Save','main');?>",
			name : "value",
			ajaxoptions : {"type":"GET"}
		 });
	</script>	