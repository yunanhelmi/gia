<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\web\IdentityInterface;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    
</head>
<body>
<div id="wrapper">
    <div style="display:none;">
    <?php NavBar::begin();NavBar::end(); ?>
    </div>

    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">EZERP 2015</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="index.php?r=master"><i class="glyphicon glyphicon-th-list"></i> Master</a></li>
                <li><a href="index.php?r=am"><i class="glyphicon glyphicon-refresh"></i> AM</a></li>
                <li><a href="index.php?r=ap"><i class="glyphicon glyphicon-home"></i> AP</a></li>
                <li><a href="index.php?r=ar"><i class="glyphicon glyphicon-usd"></i> AR</a></li>
                <li><a href="index.php?r=iwm"><i class="glyphicon glyphicon-equalizer"></i> IWM</a></li>
                <li><a href="index.php?r=acc"><i class="glyphicon glyphicon-book"></i> GL</a></li>
                <li><a href="index.php?r=fi"><i class="glyphicon glyphicon-usd"></i> FI</a></li>
                <li><a href="index.php?r=pur"><i class="glyphicon glyphicon-edit"></i> PUR</a></li>
                <li><a href="index.php?r=sd"><i class="glyphicon glyphicon-tag"></i> SD</a></li>
                <li><a href="index.php?r=production/pp-production-order"><i class="glyphicon glyphicon-gift"></i> PP</a></li>
                <li><a href="index.php?r=hrm"><i class="glyphicon glyphicon-user"></i> HRM</a></li>
                    <li><a href="#"><i class="glyphicon glyphicon-briefcase"></i> Tenant</a></li>
                    <li class="active"><a href="index.php?r=admin/user"><i class="glyphicon glyphicon-cog"></i> Admin</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right" style="margin-right: 30px">
                <?php if(Yii::$app->user->isGuest == true)
                    echo '<li>'.Html::a('Login', ['/site/login']).'</li>';
                ?>
                <?php if(Yii::$app->user->isGuest == false): ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicon glyphicon-user"></span>
                            <strong><?php echo Yii::$app->user->identity->username; ?></strong>
                            <span class="glyphicon glyphicon-chevron-down"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <div class="navbar-login">
                                    <div class="row">
                                        <div class="col-lg-12" style="margin-left: 10px;">
                                            <p class="text-left"><strong><?php echo Yii::$app->user->identity->username.' - ' ?></strong></p>
                                           
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="divider navbar-login-session-bg"></li>
                            <li><?= Html::a('Change Password <span class="glyphicon glyphicon-lock pull-right"></span>', ['/site/changepassword']) ?></li>
                            <li class="divider"></li>
                            <li>
                                <div class="navbar-login navbar-login-session">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p>
                                                <?= Html::a('Logout', ['/site/logout'], ['class' => 'btn btn-danger btn-block', 'data-method' => 'post']) ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper-admin">
        <div class="top-limit">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
        </div>
        <?= $content ?>
        <div class="bot-limit">
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Enterprise Resource Planning 2015</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
