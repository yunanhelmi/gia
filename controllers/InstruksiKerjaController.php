<?php

namespace app\controllers;

use Yii;
use app\models\InstruksiKerja;
use app\models\InstruksiKerjaSearch;
use app\models\InstruksiKerjaIssued;
use app\models\InstruksiKerjaOutstanding;
use app\models\InstruksiKerjaIncoming;
use app\models\Client;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;


/**
 * InstruksiKerjaController implements the CRUD actions for InstruksiKerja model.
 */
class InstruksiKerjaController extends Controller
{
    public function behaviors()
    {
        return [
            // 'verbs' => [
            //     'class' => VerbFilter::className(),
            //     'actions' => [
            //         'delete' => ['post'],
            //     ],
            // ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //'only' => [],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'printincomingreport','incomingmodalreport','incomingreport', 'printoutstandingreport','outstandingmodalreport','outstandingreport','printissuedreport','issuedmodalreport','issuedreport','incoming','outstanding','issued','viewincoming','viewoutstanding','viewissued','create','delete','updateincoming','updateoutstanding','pdf'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all InstruksiKerja models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new InstruksiKerjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIncoming()
    {
        $searchModel = new InstruksiKerjaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('incoming', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOutstanding()
    {
        $searchModel = new InstruksiKerjaOutstanding();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('outstanding', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIssued()
    {
        $searchModel = new InstruksiKerjaIssued();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('issued', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single InstruksiKerja model.
     * @param integer $id
     * @return mixed
     */
    public function actionViewincoming($id)
    {
        $model = $this->findModel($id);
        return $this->render('view_incoming', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewoutstanding($id)
    {
        $model = $this->findModel($id);
        return $this->render('view_outstanding', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionViewissued($id)
    {
        $model = $this->findModel($id);
        return $this->render('view_issued', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InstruksiKerja model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InstruksiKerja();
        if($model->loadAll(Yii::$app->request->post())){
             
            $nama_client = Client::find()->select('nama')->where('id = '.$model->id_client.'')->asArray()->one();
            $model->assurers = $nama_client['nama'];
            $hasil = $model->save();
            if ($hasil) {
                Yii::$app->session->setFlash('success','Data was successfully submitted');
                return $this->redirect(['create']);
            } else {
                Yii::$app->session->setFlash('success','Data was failed');
                return $this->redirect(['create']);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InstruksiKerja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateincoming($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new InstruksiKerja();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['viewincoming', 'id' => $model->id]);
        } else {
            return $this->render('updateincoming', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateoutstanding($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new InstruksiKerja();
        }else{
            $model = $this->findModel($id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['viewoutstanding', 'id' => $model->id]);
        } else {
            return $this->render('updateoutstanding', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InstruksiKerja model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export InstruksiKerja information into PDF format.
     * @param integer $id
     * @return mixed
     */
    public function actionPdf($id) {
        $model = $this->findModel($id);

        $content = $this->render('_pdf', [
            'model' => $model,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new InstruksiKerja model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param type $id
    * @return type
    */
    public function actionSaveAsNew($id) {
        $model = new InstruksiKerja();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }

    public function actionSaveAsNew2($id) {
        $model = new InstruksiKerja();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($id);
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['viewr', 'id' => $model->id]);
        } else {
            return $this->render('saveAsNew2', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the InstruksiKerja model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return InstruksiKerja the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InstruksiKerja::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionIncomingmodalreport(){

        $year = InstruksiKerjaOutstanding::find()->select('extract(YEAR from date_of_instruction) as year')->asArray()->distinct()->all();

        // var_dump($year);
        // exit();
        return $this->renderAjax('incomingmodalreport',[
                'year' => $year,
            ]);
    }

    public function actionIncomingreport(){
        $searchModel = new InstruksiKerjaIncoming();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $tahun = InstruksiKerjaIncoming::find()->select('extract(YEAR from date_of_instruction) as year')->asArray()->distinct()->all();
        // echo "<pre>";
        // var_dump($tahun[2]['year']); 
        // echo "<pre>";
        // exit();
        return $this->render('incomingreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahun' => $tahun
        ]);
    }

    // public function actionIncomingreport($year = null){
    //     if($year == null){
    //         $year = date('Y');
    //     }
    //     $tahun = InstruksiKerjaIncoming::find()->select('extract(YEAR from date_of_instruction) as year')->asArray()->distinct()->all();
        
    //     $model = InstruksiKerjaIncoming::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();
    //     return $this->render('incomingreport',[
    //             'model' => $model,
    //             'tahun' => $tahun
    //         ]);
    // }

    public function actionPrintoutincomingreport($year = NULL){
        if($year == null){
            $year = date('Y');
        }

        $model = InstruksiKerjaIncoming::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();

        $content = $this->render('_incomingpdf', [
            'model' => $model,
            'year' => $year,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_LANDSCAPE,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    public function actionOutstandingmodalreport(){
        $year = InstruksiKerjaIssued::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'outstanding'")->asArray()->distinct()->orderBy('year')->all();
        // var_dump($year);
        // exit();
        return $this->renderAjax('outstandingmodalreport',[
                'year' => $year,
        ]);
    }

    public function actionOutstandingreport(){
        $searchModel = new InstruksiKerjaOutstanding();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('outstandingreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // public function actionOutstandingreport($year = null){
    //     if($year == null){
    //         $year = date('Y');
    //     }
    //     $tahun = InstruksiKerjaOutstanding::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'outstanding'")->asArray()->distinct()->all();
        
    //     $model = InstruksiKerjaOutstanding::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();
    //     return $this->render('outstandingreport',[
    //             'model' => $model,
    //             'tahun' => $tahun
    //         ]);
    // }

    public function actionPrintoutstandingreport($year = NULL){
        if($year == null){
            $year = date('Y');
        }
        $model = InstruksiKerja::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();

        $content = $this->render('_outstandingpdf', [
            'model' => $model,
            'year' => $year,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_LANDSCAPE,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    public function actionIssuedmodalreport(){
        $year = InstruksiKerjaIssued::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'issued'")->asArray()->distinct()->orderBy('year')->all();
        // var_dump($year);
        // exit();
        return $this->renderAjax('issuedmodalreport',[
                'year' => $year,
            ]);
    }

    public function actionIssuedreport(){
        $searchModel = new InstruksiKerjaIssued();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('issuedreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    // public function actionIssuedreport($year = null){
    //     if($year == null){
    //         $year = date('Y');
    //     }
    //     $tahun = InstruksiKerjaIssued::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'issued'")->asArray()->distinct()->all();
        
    //     $model = InstruksiKerjaIssued::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();
    //     return $this->render('issuedreport',[
    //             'model' => $model,
    //             'tahun' => $tahun
    //         ]);
    // }

    public function actionPrintissuedreport($year = NULL){
        if($year == null){
            $year = date('Y');
        }
        $model = InstruksiKerja::find()->where("extract(YEAR from date_of_instruction) = ".$year."")->asArray()->all();

        $content = $this->render('_issuedpdf', [
            'model' => $model,
            'year' => $year,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_LANDSCAPE,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            //'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            //'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

}
