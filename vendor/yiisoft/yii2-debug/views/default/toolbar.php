<?php
/* @var $this \yii\web\View */
/* @var $panels \yii\debug\Panel[] */
/* @var $tag string */
/* @var $position string */

use yii\helpers\Url;

$firstPanel = reset($panels);
$url = $firstPanel->getUrl();

?>
