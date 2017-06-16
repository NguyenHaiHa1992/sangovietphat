<script type="text/javascript" src="<?php echo Yii::app()->baseUrl;?>/tinymce/tiny_mce/tiny_mce.js"></script>
<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1><?php echo iPhoenixLang::admin_t('Product categories','product');?></h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span><?php echo iPhoenixLang::admin_t('Product categories','product');?></span></a></li>					
			</ul>
		</div>
	</div>
	<!--end title-->
	<div class="folder-content form">
		<!--begin left content-->
		<?php 
		echo $this->renderPartial('_form', array('model'=>$model,'action'=>$action)); 
		?>
		<!--end left content-->
		<!--begin right content-->
		<?php			
		echo $this->renderPartial('_tree', array('list_nodes'=>$model->list_nodes)); 			
		?>
		<!--end right content-->
		<div class="clear"></div>
	</div>
</div>
<div type="hidden" value="" id="popup_value"></div>
<?php 
$lang='vi';
if(isset($_GET['lang'])){
	$lang=$_GET['lang'];
}
$cs = Yii::app()->getClientScript(); 
// Script delete
$cs->registerScript(
  'js-delete-category',
  "jQuery(function($) { $('body').on('click','.i16-trashgray',	
  		function(){
  			$('#popup_value').val(this.id);
  			jConfirm(\"Are you sure want to delete this category?\",\"Notice\",function(r){
	  			if(r==true){
					jQuery.ajax({
						'data':{id : $(\"#popup_value\").val(), current_id: $(\"#current_id\").val()},
						'dataType':'json',
						'success':function(data){
							if(data.status == true){
								$(\".folder-content\").html(data.content);
								$(\".folder-content\").append('<div class=\"clear\"></div>');
							}
							else {
								jAlert(data.content);
							}
						},
						'type':'GET',
						'url':'".iPhoenixUrl::createUrl('admin/productCategory/delete')."',
						'cache':false});
	        	};
	        	});
        	return false;	
        	});
        })",
  CClientScript::POS_END
);

// Script load form update 
$cs->registerScript(
  'js-update-category',
  "jQuery(
  	function($)
	{ 
		$('body').on(
  			'click',
  			'.i16-statustext',	
  			function(){
  				jQuery.ajax({
  					'data':{id : this.id},
  					'success':function(data){
						$(\".folder-content\").html(data);
						$(\".folder-content\").append('<div class=\"clear\"></div>');
					},
					'type':'GET',
					'url':'".iPhoenixUrl::createUrl('admin/productCategory/update')."',
					'cache':false
				});
				return false;
			}
		);
	}
	);",
  CClientScript::POS_END
);
// Script load form create 
$cs->registerScript(
  'js-create-category',
  "jQuery(
  	function($) 
  	{ 
  		$('body').on(
  			'click',
  			'#create-category',	
  			function(){
  				jQuery.ajax({
  					'success':function(data){
						$(\".folder-content\").html(data);
						$(\".folder-content\").append('<div class=\"clear\"></div>');
        			},
        			'type':'GET',
        			'url':'".iPhoenixUrl::createUrl('admin/productCategory/create')."',
        			'cache':false,
        		});
        		return false;
        	}
        );
     }
    );",
  CClientScript::POS_END
);
// Script update & create category to database
$cs->registerScript(
  'js-write-category',
  "jQuery(
  	function($) { 
  		$('body').on(
  			'click',
  			'#write-category',	
  			function(){
  				tinyMCE.triggerSave();
  				jQuery.ajax({
  					'success':function(data){
						$(\".folder-content\").html(data);
						$(\".folder-content\").append('<div class=\"clear\"></div>');
        			},
        			'type':'POST',
        			'url':'".iPhoenixUrl::createUrl('admin/productCategory/write')."',
        			'cache':false,
        			'data':jQuery(this).parents(\"form\").serialize()
        		});
        		return false;
        	}
        );
      }
   );",
  CClientScript::POS_END
);
$cs->registerScript(
  'js-update-list-order-view',
  "jQuery(
  	function($)
	{ 
		$('body').on(
  			'change',
  			'#ProductCategory_parent_id',	
  			function(){
  				jQuery.ajax({
  					'data':{parent_id : $(this).val()},
  					'success':function(data){  		
  						if($(\"#ProductCategory_order_view\")){				
							$(\"#ProductCategory_order_view\").html(\"\");
							for(var i=1;i<=data;i++){
								if(i==data){
									var option='<option value=\"'+i+'\" selected=\"selected\">'+i+'</option>';
								}
								else {
									var option='<option value=\"'+i+'\">'+i+'</option>';
								}
								$(\"#ProductCategory_order_view\").append(option);
							}
						}
					},
					'type':'GET',
					'url':'".iPhoenixUrl::createUrl('admin/productCategory/updateListOrderView')."',
					'cache':false
				});
				return false;
			}
		);
	}
	);",
  CClientScript::POS_END
);
?>