<div class="swiper-slide">
    <div class="advantages-card">
        <div class="icon-container">
<!--			--><?php
//			echo file_get_contents( $slide['icon'] )
//			?>
            <img src="<?php echo $slide['icon']; ?>" alt="<?php echo $slide['title']; ?>">
        </div>
        <div class="description">
            <h3><?php echo $slide['title']; ?></h3>
            <p class="open-active-slide"><?php echo $slide['description']; ?></p>
        </div>
    </div>
</div>
