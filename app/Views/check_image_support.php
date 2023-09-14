<?php
// 检查GD库支持
if (extension_loaded('gd') && function_exists('gd_info')) {
    echo 'GD库已启用';
} else {
    echo 'GD库未启用';
}

// 检查ImageMagick支持
if (extension_loaded('imagick')) {
    echo 'ImageMagick已启用';
} else {
    echo 'ImageMagick未启用';
}
?>
