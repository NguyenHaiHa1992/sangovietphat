<!-- wFooterLink -->
<?php $c = 0;?>
<div id="<?php echo $id;?>" class="<?php echo $class;?>">
        <?php foreach ($data as $id=>$item) {
            $menu = $item['content'];
            $c++;
            if(isset($menu->other['url'])){
                $class = ($c == count($data) ? "last" : "");
                echo '<a id="'.$id. '" class="'. $class .'" href="'.$menu->url.'" target='.$menu->target.'>'.$menu->name.'</a>';
            }
        } 
        ?>
</div>
<!-- end of wFooterLink -->