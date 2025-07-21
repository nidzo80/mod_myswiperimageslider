<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_myswiperimageslider
 *
 * @copyright   Copyright (C) 2025 Your Name. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

if (empty($images)) {
    return; // Ne prikazuj ako nijedna slika nije izabrana
}
?>

<div class="swiper mySwiperImageSlider"
     id="mySwiperImageSlider-<?php echo $module->id; ?>"
     data-slides-per-view="<?php echo $slidesPerView; ?>"
     data-space-between="<?php echo $spaceBetween; ?>"
     data-autoplay="<?php echo $autoplay ? 'true' : 'false'; ?>"
     data-image-width="<?php echo $imageWidth; ?>"
     data-image-height="<?php echo $imageHeight; ?>"
     data-object-fit="<?php echo htmlspecialchars($objectFit); ?>"
     data-transition-speed="<?php echo $transitionSpeed; ?>"
     data-transition-effect="<?php echo htmlspecialchars($transitionEffect); ?>">
    <div class="swiper-wrapper">
        <?php foreach ($images as $imagePath) : ?>
            <div class="swiper-slide">
                <img src="<?php echo JUri::root() . htmlspecialchars($imagePath); ?>" alt="Slika">
            </div>
        <?php endforeach; ?>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
</div>
