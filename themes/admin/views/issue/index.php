
<?php
Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl.'/js/jquery.jeditable.mini.js');
?>
	<!--begin inside content-->
	<div id="main-content" class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1><?php echo iPhoenixLang::admin_t('Quản trị Ticket');?></h1>
			<div class="header-menu">
				<ul>
					<li class="ex-show"><a class="activities-icon"><span><?php echo iPhoenixLang::admin_t('Danh sách Ticket');?></span></a></li>
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content">
            <div>
            	<a href="<?php echo Yii::app()->createAbsoluteUrl('admin/issue/create'); ?>" class="button" style="width:180px;">Tạo Ticket</a>
                <div class="line top bottom"></div>	
            </div>
         	<!--begin box search-->
	 	<?php 
		Yii::app()->clientScript->registerScript('search', "
			$('#issue-search').submit(function(){
			$.fn.yiiGridView.update('issue-list', {
				data: $(this).serialize()});
				return false;
			});");
		?>
		<div class="box-search">            
			<h2><?php echo iPhoenixLang::admin_t('Search','main');?></h2>
			<?php $form=$this->beginWidget('CActiveForm', array('method'=>'get','id'=>'issue-search')); ?>
			<!--begin left content-->
			<div class="fl" style="width:600px;">
				<ul>
					<li>
						<?php echo $form->label($model,'status'); ?>
						<?php echo $form->dropDownList($model,'status',$model->list,array('style'=>'width:200px;height: 25px')); ?>
					</li>					                              
				</ul>
			</div>
			<!--end left content-->
			
			<div>
			<div class="row"></div>
					<?php 
						echo CHtml::submitButton(iPhoenixLang::admin_t('Filter','main'),
						array(
							'class'=>'button',
							''
						)); 						
					?>   
			</div>
			<?php $this->endWidget(); ?>
			<div class="clear"></div>
			<div class="line top bottom"></div>
		</div>
		<!--end box search-->		
			<?php 
			$this->widget('iPhoenixGridView', array(
				'iclass'=>'issueForm',
  				'id'=>'issue-list',
  				'dataProvider'=>$dataProvider,		
  				'columns'=>array(
					array(
      					'class'=>'CCheckBoxColumn',
						'selectableRows'=>2,
						'headerHtmlOptions'=>array('width'=>'2%','class'=>'table-title'),
						'checked'=>'in_array($data->id,Yii::app()->session["checked-issue-list"])'
    				),			
    				array(
						'name'=>'name',
						'value'=>'$data->name',
						'header'=>'Tên Ticket',
					),
					array(
						'name'=>'description',
						'value'=>'strip_tags($data->description)',
						'header'=>'Mô tả',
					),
					array(
						'name'=>'status',
						'value'=>'$data->status',
						'header'=>'Trạng thái',
					),
					array(
						'name'=>'created_time',
						'value'=>'date("d/m/Y",$data->created_time)',
						'header'=>'Ngày tạo',
					),
					array(
						'header'=>iPhoenixLang::admin_t('Function','main'),
						'class'=>'iPhoenixToolButtonColumn',
    					'template'=>'{view}{update}{delete}',
    					'deleteConfirmation'=>'Are you sure you want to delete this Ticket?',
						'afterDelete'=>'function(link,success,data){ if(success) jAlert("Delete successfully"); }',
    					'buttons'=>array
    					(
    						'view' => array(
								'label'=> iPhoenixLang::admin_t('View','main'),
								'url'=>'iPhoenixUrl::createUrl("admin/issue/view", array("task_id"=>$data->id))',
							),
    						'update' => array(
    							'label'=>iPhoenixLang::admin_t('Update','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/issue/Update", array("task_id"=>$data->id))',
    						),
        					'delete' => array(
    							'label'=>iPhoenixLang::admin_t('Delete','main'),
    							'url'=>'iPhoenixUrl::createUrl("admin/issue/delete",array("task_id"=>$data->id))'
    						),
        				),
						'headerHtmlOptions'=>array('width'=>'10%','class'=>'table-title'),
					),    				
 	 			),
 	 			'template'=>'{displaybox}{checkbox}{summary}{items}{pager}',
  				'summaryText'=>'{count} Ticket',
 	 			'pager'=>array('class'=>'MyWSPager','header'=>'','prevPageLabel'=>'< '.iPhoenixLang::admin_t('Previous'),'nextPageLabel'=>iPhoenixLang::admin_t('Next').' >','htmlOptions'=>array('class'=>'pages fr')),
				'actions'=>array(
					'delete'=>array(
						'action'=>'delete',
						'label'=>iPhoenixLang::admin_t('Delete','main'),
						'imageUrl' => Yii::app()->theme->baseUrl.'/images/delete.png',
						'url'=>'admin/issue/checkbox'
					),
				),
 	 			)); ?>
		</div>
	</div>
	<!--end inside content-->
	<div class="bg-overlay"></div>
	