<?php 
$cs = Yii::app()->getClientScript();
$cs->registerCssFile(Yii::app()->request->getBaseUrl(true).'/css/admin/sprite.css');
$cs->registerScriptFile(Yii::app()->request->getBaseUrl(true).'/js/admin/jquery-1.7.1.min.js');
?>
	<!--begin inside content-->
	<div class="folder top">
		<!--begin title-->
		<div class="folder-header">
			<h1>Help</h1>
			<div class="header-menu">
				<ul>
					<li><a class="header-menu-active new-icon" href=""><span class="span-icon">CMS iPhoennix v1.09</span></a></li>					
				</ul>
			</div>
		</div>
		<!--end title-->
		<div class="folder-content form">
			<div class="fl" style="width:700px; padding-right:10px;">
				<ul>
                    <div class="help-content">
                    	<p class="title">Introduction video about CMS iPhoenix v1.09</p>
                    	<div class="line"></div>
                    	Updating ...
						<!--
                    	<iframe width="650" height="500" src="http://www.youtube.com/embed/x9L-i0WPqNc" frameborder="0" allowfullscreen></iframe>
                    	-->
                    	<div class="clear"></div>
                    </div>
				</ul>
			</div>

			<div class="fr menu-tree" style="width: 250px; border-left: 1px solid #DFDFDF">
			<ul>
				<li><label><b>Help categories</b></label></li>
				<li>
					<?php 
					/*
					$list_style=array('color:red','color:blue','color:black');
					$list_disable_nodes=array();
					foreach ($list_nodes as $id=>$level){
						$node=Category::model()->findByPk($id);
						if($node->status == Menu::STATUS_PENDING){
							$list_disable_nodes[]=$id;
							foreach($node->child_nodes as $id_child=>$level){
								$list_disable_nodes[]=$id_child;	
							}
						}	
					}
					$index = 0;
					foreach ($list_nodes as $id=>$level){
						if($level == 2) $index = $index + 1;
						$node=Category::model()->findByPk($id);
						$blank = "&nbsp";
						$prefix = "--";
						if(in_array($id, $list_disable_nodes))
							$style='color:grey';
						else 
							$style = $list_style[$level-1];
						for($i=1;$i<$level;$i++){
							$blank .= "&nbsp &nbsp &nbsp";
							$prefix .= "---";
						}
						$view =$blank."|".$prefix;
						echo '<div><label class="help'.$level.' index'.$index.'" alt="'.$index.'" id="'.$id.'" style="'.$style.'">'.$view.' <span>'.$node->name.'</span></label></div>';
					}*/
					?>           
					</li>
			</ul>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<!--end inside content-->

<?php
// Script load form update 
$cs->registerScript(
  'js-view-category',
  "jQuery(
  	function($)
	{ 
		$('body').on(
  			'click',
  			'.help3',	
  			function(){
  				jQuery.ajax({
  					'data':{id : this.id},
  					'success':function(data){
						$(\".help-content\").html(data);
					},
					'type':'GET',
					'url':'".$this->createUrl('help/load')."',
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
<script type="text/javascript">
	$('.help3').hide();
	$('.help2').click(function(){
		var i = parseInt($(this).attr('alt'));
		$('.help3').slideUp();
		if($(this).hasClass('active')){
			$(this).removeClass('active');
		}
		else{
			$('.help2').removeClass('active');
			$(this).addClass('active');
			$(".index"+ i +"").slideDown();
		}
	});
	$('.help3').click(function(){
		$('.help3').removeClass('selected');
		$(this).addClass('selected');
	});
</script>