<?php
$this->title = 'Modal';
$this->params['breadcrumbs'][] = $this->title;
use yii\helpers\url;
use yii\helpers\Html;
use yii\widgets\LinkPager;
use yii\widgets\ActiveForm;
use yii\bootstrap\Modal;
$year = 2019;
?>
<div class="row">
	<div class="form-group col-lg-12">
	    <label>Select Year: </label>
	    <select onchange="if (this.value) window.location.href=this.value" class="form-control">
	        <option default> Select </option>
	        <option value="index.php?r=instruksi-kerja/issuedreport&year=<?= $year?>">2013</option>
	        
	    </select>
	</div>
</div>