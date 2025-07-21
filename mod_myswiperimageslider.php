<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_myswiperimageslider
 * @author      Nikola
 * @link        lenix.rs
 * @copyright   Copyright (C) 2025 LeNix Design Studio. All rights reserved.
 * @license     GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;
// Parametri modula
$autoplay        = (bool) $params->get('autoplay', 1);
$slidesPerView   = (int) $params->get('slides_per_view', 3);
$spaceBetween    = (int) $params->get('space_between', 30);

// Novi parametri za veličinu slika
$imageWidth      = (int) $params->get('image_width', 300);
$imageHeight     = (int) $params->get('image_height', 200);
$objectFit       = $params->get('object_fit', 'cover'); // 'cover' je default
// Parametri za prelaz
$transitionSpeed = (int) $params->get('transition_speed', 300);
$transitionEffect = $params->get('transition_effect', 'slide');
// Prikupi putanje slika iz pojedinačnih polja
$images = [];
for ($i = 1; $i <= 10; $i++) {
    $imagePath = $params->get('image' . $i);
    if (is_string($imagePath) && !empty(trim($imagePath))) {
        $images[] = $imagePath;
    }
}

// Učitavanje Swiper.js preko CDN-a
JHtml::_('script', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js', ['version' => '11.0.7']);
JHtml::_('stylesheet', 'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css', ['version' => '11.0.7']);

// Učitavanje vlastitog CSS-a modula
$document = JFactory::getDocument();
$cssPath = JUri::base(true) . '/modules/mod_myswiperimageslider/media/css/myswiperimageslider.css';
$document->addStyleSheet($cssPath);

// --- Učitavanje vlastitog JS-a modula ---
$jsPath = JUri::base(true) . '/modules/mod_myswiperimageslider/media/js/myswiperimageslider.js';
$document->addScript($jsPath);
// ---  ---

require JModuleHelper::getLayoutPath('mod_myswiperimageslider', 'default');