<!--begin inside content-->
<div id="main-content" class="folder top">
	<!--begin title-->
	<div class="folder-header">
		<h1>Audio Categories</h1>
		<div class="header-menu">
			<ul>
				<li><a class="header-menu-active new-icon" href=""><span>Audio Categories</span></a></li>					
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
<!--end inside content-->
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
 			jConfirm(\"Are you sure you want to delete this category?\",\"Notice\",function(r){
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
						'url':'".iPhoenixUrl::createUrl('admin/audioCategory/delete')."',
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
					'url':'".iPhoenixUrl::createUrl('admin/audioCategory/update')."',
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
        			'url':'".iPhoenixUrl::createUrl('admin/audioCategory/create')."',
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
  				jQuery.ajax({
  					'success':function(data){
						$(\".folder-content\").html(data);
						$(\".folder-content\").append('<div class=\"clear\"></div>');
        			},
        			'type':'GET',
        			'url':'".iPhoenixUrl::createUrl('admin/audioCategory/write')."',
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
  			'#AudioCategory_parent_id',	
  			function(){
  				jQuery.ajax({
  					'data':{parent_id : $(this).val()},
  					'success':function(data){  		
  						if($(\"#AudioCategory_order_view\")){				
							$(\"#AudioCategory_order_view\").html(\"\");
							for(var i=1;i<=data;i++){
								if(i==data){
									var option='<option value=\"'+i+'\" selected=\"selected\">'+i+'</option>';
								}
								else {
									var option='<option value=\"'+i+'\">'+i+'</option>';
								}
								$(\"#AudioCategory_order_view\").append(option);
							}
						}
					},
					'type':'GET',
					'url':'".iPhoenixUrl::createUrl('admin/audioCategory/updateListOrderView')."',
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