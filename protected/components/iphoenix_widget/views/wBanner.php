
<div id="<?php echo $id; ?>" class="carousel slide <?php echo $class; ?>" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php $i = 0;
        foreach ($data as $banner): ?>
            <li data-target="#slider" data-slide-to="<?php echo $i; ?>" class="<?php if ($i == 0) echo 'active'; ?>"></li>
            <?php $i++; ?>
        <?php endforeach; ?>        
    </ol>
    <!-- Wrapper for slides -->
    <div class="carousel-inner">
        <?php $i = 0;
        foreach ($data as $banner): ?>
                    <div class="item <?php if ($i == 0) echo 'active'; ?>">
                        <a href = "<?php echo $banner->url; ?>">
                            <img src="<?php echo $banner->image->getAbsoluteUrl(); ?>" alt="<?php echo $banner->url; ?>" class="img-responsive img-banner">
                        </a>
                    </div>
            <?php $i++; ?>
        <?php endforeach; ?>        
    </div>
</div>