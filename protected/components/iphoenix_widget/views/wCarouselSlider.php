<!-- wCarouselSlider -->

<div id="<?php echo $id;?>" class="carousel <?php echo $class;?>" data-ride="carousel">
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <div class="item active">
            <?php $i=0;foreach($data as $model):?>
                <?php if($i<=3):?>
                    <?php
                        $this->widget('wItem', array(
                            'data'=>$model,
                            'template'=>'
                            <a href="{category_url}"><img src="[getIntroimage_thumb(120,90)]" width="120px" height="90px" alt="{title_text}" title="{title_text}" class="img-responsive"><span class="title">{title_text}</span> </a>
                        ',
                        ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
        <div class="item">
            <?php $i=0;foreach($data as $model):?>
                <?php if($i>3 && $i<=7):?>
                    <?php
                    $this->widget('wItem', array(
                        'data'=>$model,
                        'template'=>'
                            <a href="{category_url}"><img src="[getIntroimage_thumb(120,90)]" width="120px" height="90px" alt="{title_text}" title="{title_text}" class="img-responsive"><span class="title">{title_text}</span> </a>
                        ',
                    ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
        <div class="item">
            <?php $i=0;foreach($data as $model):?>
                <?php if($i>7):?>
                    <?php
                    $this->widget('wItem', array(
                        'data'=>$model,
                        'template'=>'
                            <a href="{category_url}"><img src="[getIntroimage_thumb(120,90)]" width="120px" height="90px" alt="{title_text}" title="{title_text}" class="img-responsive"><span class="title">{title_text}</span> </a>
                        ',
                    ));
                    ?>
                <?php endif; $i++;?>
            <?php endforeach;?>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#<?php echo $id;?>" role="button" data-slide="prev">
        <span class="left"></span>
    </a>
    <a class="right carousel-control" href="#<?php echo $id;?>" role="button" data-slide="next">
        <span class="right"></span>
    </a>
</div>
<!-- end of wCarouselSlider -->