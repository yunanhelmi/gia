<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InstruksiKerja */

$this->title = 'Create Instruksi Kerja';
$this->params['breadcrumbs'][] = $this->title;
?>
<?php if(Yii::$app->session->hasFlash('success')):?>
    <div class="alert alert-success" role="alert">
        <?php echo Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>
<div class="instruksi-kerja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formincoming', [
        'model' => $model,
        'record' => $record,
    ]) ?>

</div>
