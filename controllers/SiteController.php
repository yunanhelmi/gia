<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Reminder;

class SiteController extends Controller
{
    
    /**
     * @inheritdoc
     * 
     * 
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'denyCallback' => function ($rule, $action) {
                    throw new \Exception('You are not allowed to access this page');
                },
                'only' => ['login', 'logout', 'signup'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['login', 'signup'],
                        'roles' => ['?'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['logout'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
    
    public function actionSend($id){
        Yii::$app->mailer->compose()
        ->setFrom('admin@giadj-sby.com')
        ->setTo('alajiseno@gmail.com')
        //->setCc('yunanhelmimahendra@gmail.com')
        ->setSubject('Email Reminder System. PT. Global Internusa Adjusting')
        //->setTextBody('Bro iki email e wes isok ngirim email. aku ngirim tekan localhost.')
        ->setHtmlBody("
                Selamat Pagi,
                <br><br><br>
                
                Mohon cek instruksi kerja berikut: 
                <br>
                
                <br>
                <br>
                <br>
                Terima kasih, <br>
                Email ini tidak perlu dibalas.
                
                
                <p>*email ini dikirim secara otomatis oleh Email Reminder System - PT. Global Internusa Adjusting</p>
                <a target='_blank' href='http://www.thinkerstudio.info'>Thinker Studio</a>
                ")
        ->send();
    }
    
    public function actionCheck(){
        $connection = Yii::$app->db;
        $reminder = Reminder::find()->where("state <> 6")->asArray()->all();
        
        //var_dump($reminder);
        for($i=0;$i<sizeof($reminder);$i++){
            if($reminder[$i]['state'] == '1'){
                if(date("Y-m-d", strtotime($reminder[$i]['tgl_survei']) == date("Y-m-d"))){
                    $this->actionSend($reminder[$i]['id_instruksi']);
                    $command = $connection->createCommand("
                    UPDATE reminder 
                    SET tgl_survei = '".date('Y-m-d',strtotime('+1 days',strtotime($reminder[$i]['tgl_survei'])))."'
                    WHERE id_instruksi = ".$reminder[$i]['id_instruksi']."
                    ")->execute();
                }
            } else if ($reminder[$i]['state'] == '2'){
                if(date("Y-m-d", strtotime($reminder[$i]['tgl_aa']) == date("Y-m-d"))){
                    $this->actionSend($reminder[$i]['id_instruksi']);
                     $command = $connection->createCommand("
                     UPDATE reminder 
                     SET tgl_aa = '".date('Y-m-d',strtotime('+1 days',strtotime($reminder[$i]['tgl_aa'])))."'
                     WHERE id_instruksi = ".$reminder[$i]['id_instruksi']."
                     ")->execute();
                }
            } else if ($reminder[$i]['state'] == '3'){
                if(date("Y-m-d", strtotime($reminder[$i]['tgl_pa']) == date("Y-m-d"))){
                    $this->actionSend($reminder[$i]['id_instruksi']);
                     $command = $connection->createCommand("
                     UPDATE reminder 
                     SET tgl_pa = '".date('Y-m-d',strtotime('+1 days',strtotime($reminder[$i]['tgl_pa'])))."'
                     WHERE id_instruksi = ".$reminder[$i]['id_instruksi']."
                     ")->execute();
                }
            } else if ($reminder[$i]['state'] == '4'){
                if(date("Y-m-d", strtotime($reminder[$i]['tgl_csd']) == date("Y-m-d"))){
                    $this->actionSend($reminder[$i]['id_instruksi']);
                     $command = $connection->createCommand("
                     UPDATE reminder 
                     SET tgl_csd = '".date('Y-m-d',strtotime('+1 days',strtotime($reminder[$i]['tgl_csd'])))."'
                     WHERE id_instruksi = ".$reminder[$i]['id_instruksi']."
                     ")->execute();
                }
            } else if ($reminder[$i]['state'] == '5'){
                if(date("Y-m-d", strtotime($reminder[$i]['tgl_dfr']) == date("Y-m-d"))){
                    $this->actionSend($reminder[$i]['id_instruksi']);
                     $command = $connection->createCommand("
                     UPDATE reminder 
                     SET tgl_dfr = '".date('Y-m-d',strtotime('+1 days',strtotime($reminder[$i]['tgl_dfr'])))."'
                     WHERE id_instruksi = ".$reminder[$i]['id_instruksi']."
                    ")->execute();
                }
            }
        }
        //if(date("Y-m-d H:i:s") == )
    }
}
