<!-- wListItem -->
<ul id="<?php echo $id;?>" class="wListItem <?php echo $class;?>">
    <?php if(is_array($data)):?>
        <?php $i=0; foreach($data as $item): $i++;?>
            <li id="li_<?php echo $item->id;?>">
                <?php echo iPhoenixTemplate::parseTemplate($item, $template);?>
            </li>
        <?php endforeach;?>
    <?php endif;?>
</ul>
<!-- end of wListItem -->