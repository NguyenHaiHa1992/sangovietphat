<?php 
    $controller = Yii::app()->controller;
    $controllerName = $controller->id;
    $action = $controller->action->id;
    $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>

<?php 
    if(!function_exists ('gen_html_menu')) {
        function gen_html_menu($data, $class_menu="") {
            foreach ($data as $id=>$item){
                $menu = $item['content'];
                if(isset($menu->other['url'])){
                    $class='';
                    $class_li = $class_menu;
                    if(isset($item['last-item']) && $item['last-item'])
                        $class .= ' last-item';
                    if(isset($item['first-item']) && $item['first-item'])
                        $class .= '';
                    if(isset($item['first']) && $item['first']){
                        /*$class .= 'homepage';
                        $menu->name = '';*/
                    }
                    if(isset($item['last']) && $item['last'])
                        $class .= ' last';
                    if(isset($item['havechild']) && $item['havechild'] && $item['level'] > 1)
                        $class .=' x';
                    if(isset($item['active']) && $item['active'])
                        $class_li .= ' active';
                    if(isset($item['havechild']) && $item['havechild'] && $item['level'] == 1){
                        $class .= ' havechild';
                        echo '<li class="dropdown'.$class_li.'">';

                        // echo '<a id="'.$id.'" class="dropdown-toggle '.$class.'" href="'.$menu->url.'" target="'.$menu->target.'" data-toggle="'.$menu->url.'">'.$menu->name.'</a>';
                        echo '<a id="'.$id.'" class="dropdown-toggle '.$class.'" href="'.$menu->url.'" target="'.$menu->target.'" data-toggle="'.$menu->url.'">'.$menu->name.'<b class="caret"></b></a>';
                        echo '<ul class="dropdown-menu">';
                    }
                    elseif (isset($item['havechild']) && $item['havechilgitd'] && $item['level'] >1){
                        echo '<li class="dropdown '.$class_li.'">';

                        echo '<a id="'.$id.'" class="'.$class.'" href="'.$menu->url.'" target='.$menu->target.'>'.$menu->name.'</a>';

                        echo '<ul>';
                    }
                    else {
                        echo '<li class="dropdown'.$class_li.'">';

                        echo '<a id="'.$id.'" class="'.$class.'" href="'.$menu->url.'" target='.$menu->target.'>'.$menu->name.'</a>';

                        echo '</li>';
                    }
                    if(isset($item['level_close']) && $item['level_close']) {
                        for ($i=0;$i<$item['level_close'];$i++) {
                            echo '</ul>';
                            echo '</li>';
                        }
                    }
                }
            }
        }
    }
?>

<!-- wMenu -->
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
	<nav class="navbar navbar-default" role="navigation">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
                    
                    <div class="menu-title mobile-only">
                        
                        <p class="box-title" id="menu_box_title">
                            <?php if($controllerName == 'site'  && $action == 'index') :?>
                                Sàn gỗ Việt Phát
                            <?php endif;?>
                        </p>
                        
                        <div class="contact">
                            <div class="zalo-share">
                                <li class="btnZalo zalo-share-button" data-href="<?php echo $actual_link;?>" data-color="blue" data-oaid="1165315223958386417" data-layout="1" data-customize="false"></li>
                            </div>
                            <a href="tel:<?php echo Setting::s('PHONE','INFORMATION')?>">
                                <span class="dt-phone"></span>
                            </a>
                        </div>
                    </div>
		</div>
	
		<!-- Collect the nav links, forms, and other content for toggling -->
		<?php if(!isset($data)):?>
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="active">
					<a href="#">Link 1</a>
				</li>
				<li>
					<a href="#">Link 2</a>
				</li>
				<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">Separated link</a>
						</li>
						<li class="divider"></li>
						<li>
							<a href="#">One more separated link</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#">Link 3</a>
				</li>
				<li>
					<a href="#">Link 4</a>
				</li>
			</ul>
		</div><!-- /.navbar-collapse -->
		<?php else:?>
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <?php
                        $len = count($data);
                        $data1= array_slice($data,0, $len/2);
                        $data2 = array_slice($data, $len/2);
                        ?>
			<ul class="nav navbar-nav">
			<?php
                            gen_html_menu($data1);
			?>
			</ul>
                        <ul class="nav navbar-nav sencond-nav">
			<?php
                            gen_html_menu($data2);
			?>
			</ul>
		</div><!-- /.navbar-collapse -->
		<?php endif;?>
        <!-- wSearchBox -->
<!--        <div id="main-search-box" class="wSearchBox">
            <form id="search_form" action="<?php echo Yii::app()->createUrl('site/search');?>" method="post">
                <input id="input_keyword" name="keyword" type="text" placeholder="Search"/>
                <button id="search_btn" type="submit"><span class="glyphicon glyphicon-search"></span> </button>
            </form>
        </div>-->
        <!-- end of wSearchBox #main-search-box-->
	</nav>
</div>
<!-- end of wMenu -->
<script type="text/javascript">
    /*$(document).ready(function(){
     $('#search_btn').click(function(e){
     e.preventDefault();
     $('#search_btn').attr('disabled','disabled');
     var keyword = $('#input_keyword').val();
     if(keyword == ''){
     return false;
     }
     $.ajax({
     url:'<?php //echo Yii::app()->createUrl("site/ajaxSearch"); ?>',
     type:'GET',
     dataType:'json',
     data:{keyword:keyword},
     cache:false,
     success:function(data){
     $('#main-content').empty();
     $('#main-content').html(data.html);
     resetSearchForm();
     }
     });
     return false;
     });
     });

     function resetSearchForm(){
     $('#input_keyword').val('');
     $('#search_btn').removeAttr('disabled');
     }*/

    $(document).ready(function(){
        $('#input_keyword').bind('keypress', function(event){
            if(event.keyCode == 13)
            {
                event.preventDefault();
                $("#search_btn").click();
            }
        });

        $('#search_btn').click(function(e){
            e.preventDefault();
            var keyword = $('#input_keyword').val();
            if(keyword == ''){
                return false;
            }
            $('#search_form').submit();
            return false;
        });
    });
</script>