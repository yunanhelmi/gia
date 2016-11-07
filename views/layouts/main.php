<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\bootstrap\Modal;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\widgets\ActiveForm;

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
    <link rel="shortcut icon" href="/web/img/gia.jpg">
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'PT. Global Internusa Adjusting Surabaya',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-default navbar-fixed-top',
        ],
    ]);
    // $session = Yii::$app->user->identity;
    //     echo "<pre>";
    //     var_dump($session);
    //     echo "<pre>"; 
    //     exit();
    if(Yii::$app->user->identity == null){
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'activateParents' => true,
            'items' => [
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
    } else {
        if(Yii::$app->user->identity->role == 'admin'){
            echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'activateParents' => true,
            'items' => [
                
                    ['label' => 'Client', 'url' => ['/client/viewclient']],
                    ['label' => 'Incoming', 'url' => ['/instruksi-kerja/create']],
                    ['label' => 'Outstanding', 'url' => ['/instruksi-kerja/outstanding']],
                    ['label' => 'Issued', 'url' => ['/instruksi-kerja/issued']],
                
                    [
                        'label' => 'Report',
                        'items' => [
                            '<li>'. Html::a('Incoming','index.php?r=instruksi-kerja/incomingreport') .'</li>',
                            '<li>'. Html::a('Outstanding','index.php?r=instruksi-kerja/outstandingreport') .'</li>',
                            '<li>'. Html::a('Issued','index.php?r=instruksi-kerja/issuedreport') .'</li>',
                            // '<li>'. Html::a('Incoming','#',['value' => Url::to('index.php?r=instruksi-kerja/incomingmodalreport'), 'id' => 'modalButtonIncoming']) .'</li>',
                            // '<li>'. Html::a('Outstanding','#',['value' => Url::to('index.php?r=instruksi-kerja/outstandingmodalreport'), 'id' => 'modalButtonOutstanding']) .'</li>',
                            // '<li>'. Html::a('Issued','#',['value' => Url::to('index.php?r=instruksi-kerja/issuedmodalreport'), 'id' => 'modalButtonIssued']) .'</li>',
                        ],
                    ],
                    ['label' => 'User', 'url' => ['/instruksi-kerja/user']],
                
                Yii::$app->user->isGuest ? (
                    ['label' => 'Login', 'url' => ['/site/login']]
                ) : (
                    '<li>'
                    . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link']
                    )
                    . Html::endForm()
                    . '</li>'
                )
            ],
        ]);
        } else if(Yii::$app->user->identity->role == 'sekretaris'){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'activateParents' => true,
                'items' => [
                        ['label' => 'Incoming', 'url' => ['/instruksi-kerja/create']],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
        } else if(Yii::$app->user->identity->role == 'adjuster'){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'activateParents' => true,
                'items' => [
                    ['label' => 'Outstanding', 'url' => ['/instruksi-kerja/outstanding']],
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
        } else if(Yii::$app->user->identity->role == 'applicant'){
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'activateParents' => true,
                'items' => [
                    ['label' => 'Outstanding', 'url' => ['/instruksi-kerja/outstanding']],
                    ['label' => 'Issued', 'url' => ['/instruksi-kerja/issued']],
                
                    [
                        'label' => 'Report',
                        'items' => [
                            '<li>'. Html::a('Incoming','index.php?r=instruksi-kerja/incomingreport') .'</li>',
                            '<li>'. Html::a('Outstanding','index.php?r=instruksi-kerja/outstandingreport') .'</li>',
                            '<li>'. Html::a('Issued','index.php?r=instruksi-kerja/issuedreport') .'</li>',
                            // '<li>'. Html::a('Incoming','#',['value' => Url::to('index.php?r=instruksi-kerja/incomingmodalreport'), 'id' => 'modalButtonIncoming']) .'</li>',
                            // '<li>'. Html::a('Outstanding','#',['value' => Url::to('index.php?r=instruksi-kerja/outstandingmodalreport'), 'id' => 'modalButtonOutstanding']) .'</li>',
                            // '<li>'. Html::a('Issued','#',['value' => Url::to('index.php?r=instruksi-kerja/issuedmodalreport'), 'id' => 'modalButtonIssued']) .'</li>',
                        ],
                    ], 
                    Yii::$app->user->isGuest ? (
                        ['label' => 'Login', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                        . Html::submitButton(
                            'Logout (' . Yii::$app->user->identity->username . ')',
                            ['class' => 'btn btn-link']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
        }
    }
    
    
    NavBar::end();

    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
        <?php
            Modal::begin([
                'header' => '<h4>Incoming Report</h4>',
                'id' => 'modalIncoming',
                'size' => 'modal-sm',
                ]);
            echo "<div id='modalContentIncoming'></div>";
            Modal::end();

            Modal::begin([
                'header' => '<h4>Outstanding Report</h4>',
                'id' => 'modalOutstanding',
                'size' => 'modal-sm',
                ]);
            echo "<div id='modalContentOutstanding'></div>";
            Modal::end();

            Modal::begin([
                'header' => '<h4>Issued Report</h4>',
                'id' => 'modalIssued',
                'size' => 'modal-sm',
                ]);
            echo "<div id='modalContentIssued'></div>";
            Modal::end();
        ?>
    </div>
</div>

<footer class="footer">
    <div class="container" style="text-align: center">
        <p>Copyright &copy; PT. Global Internusa Adjusting Surabaya <?= date('Y') ?></p>
        <p>5<sup>th</sup> Fl. Gedung Kompas Gramedia</p>
        <p>Jl. Raya Jemursari No. 64</p>
        <p>Surabaya, 60237, Indonesia</p>
        <p>No. Telepon : +6231 847 8750 / +6231 847 8751</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
