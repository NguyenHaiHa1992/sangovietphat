<?php 
$cs = Yii::app()->getClientScript();
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
		<div class="fl" id="help-content-wrapper" style="padding-right:10px;">
			<ul>
                <div class="help-content">
				<?php
				$sidebar = array();
				foreach($list_cat as $cat){
					$i = 0;
					foreach($list_help as $help){
						if(intval($cat->id) == intval($help->catid)){
							if($i==0){
								$sidebar[] = '<div><label style="color:red" class="help1" id="'.$cat->id.'">&nbsp;|-- <span>'.$help->cat.'</span></label></div>';

								echo '<div class="cat-help" id="'.$help->catid.'">'.$help->cat.'</div>';
							}

							if($i>0){
								$sidebar[] = '<div><label style="color:green" class="help2" id="'.$help->id.'">&nbsp;&nbsp;&nbsp;|---- <a href="#'.$help->id.'"><span>'.$help->title.'</span></a></label></div>';

								echo '<div class="help-content"><p class="title" id="'.$help->id.'">'.$help->title.'</p>'.$help->content.'<div class="clear"></div></div>';
							}

							$i++;
						}
					}
				}
				?>
                </div>
			</ul>
		</div>
		<div class="fr menu-tree" style="width: 250px; border-left: 1px solid #DFDFDF;">
		<ul>
			<li><label><b>Help categories</b></label></li>
			<li>
				<?php foreach($sidebar as $item) echo $item;?>
			</li>
		</ul>
		</div>
		<div class="clear"></div>
	</div>
</div>
<!--end inside content-->
<div id="back-to-top" style="position: fixed; right: 5px; bottom: 5px; cursor: pointer">
	<img src="<?php echo Yii::app()->theme->baseUrl?>/images/back-to-top.png" alt="back to top"/>
</div>

<script type="text/javascript">
	var w = $('.folder-content.form').width() - 300;
	$('#help-content-wrapper').width(w);
	$(window).resize(function(){
		w = $('.folder-content.form').width() - 300;
		$('#help-content-wrapper').width(w);
	});
    $('#back-to-top').click(function () {
        $('html,body').animate({ scrollTop: 0 }, 500);
    });
	$('a',$('.menu-tree')).click(function(){
	    $('html, body').animate({
	        scrollTop: $( $.attr(this, 'href')).offset().top
	    }, 500);
	    return false;
	});
</script>