<?php
use Ajaxray\PHPWatermark\Watermark;

include 'vendor/autoload.php';

$watermark = new Watermark(__DIR__ . 'sample.pdf');

// Watermark with text
$watermark->setFont('Arial');
$watermark->setFontSize(18);
$watermark->setRotate(345);
$watermark->setOffset(20, 60);
$watermark->setPosition(Watermark::POSITION_BOTTOM_RIGHT);

$text = "ajaxray.com";
$watermark->withText($text, __DIR__ . '/result_text.pdf');

// Watermarking with image
$watermark->setPosition(Watermark::POSITION_TOP_RIGHT);
$watermark->setOffset(50, 50);
$watermark->setOpacity(.2);
$watermark->setTiled();
$watermark->withImage(__DIR__ . '/img/php.png', __DIR__ . '/result_img.pdf');
