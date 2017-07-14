<?php
$end = $type == 'news' ? 2 : 1;
?>
<!-- wListItem -->
<!--<ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">-->	
<?php if(is_array($data)):?>
    <?php if($isMobile) :?>
        <ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">
            <?php $i=0;foreach($data as $item):?>
            <li class="item item<?php echo $i;?>" <?= $type == 'news' ? 'style="width: 33.33333333333333%"' : '' ?>>
                    <?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
            </li>
            <?php $i++;endforeach;?>
        </ul>
    <?php else:?>
            <?php $i=0; foreach($data as $item): $i++;?>
                <?php
                if($i%3 == 1):
                ?>
                <ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">
                <?php
                endif;
                ?>
                <li class="item item<?php echo $i;?>" <?= $type == 'news' ? 'style="width: 33.333333333333333%"' : '' ?>>
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
<?php endif;?>
<!--</ul>-->
<!-- end of wListItem -->