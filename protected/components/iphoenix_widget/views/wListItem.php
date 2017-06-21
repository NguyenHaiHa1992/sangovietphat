<!-- wListItem -->
<!--<ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">-->	
<?php if(is_array($data)):?>
<?php $i=0; foreach($data as $item): $i++;?>
    <?php
    if($i%3 == 1):
    ?>
    <ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">
    <?php
    endif;
    ?>
    <li class="item item<?php echo $i;?>">
        <?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
    </li>
    <?php
    if($i%3 == 0 || $i == count($data)):
    ?>
    </ul>
    <?php
    endif;
    ?>
<?php endforeach;?>
<?php endif;?>
<!--</ul>-->
<!-- end of wListItem -->