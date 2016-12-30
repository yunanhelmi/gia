<?php

namespace app\controllers;

use Yii;
use app\models\InstruksiKerja;
use app\models\Client;
use app\models\Record;
use app\models\Reminder;
use app\models\Login;
use app\models\InstruksiKerjaSearch;
use app\models\InstruksiKerjaIssued;
use app\models\InstruksiKerjaOutstanding;
use app\models\InstruksiKerjaIncoming;
use app\models\LoginSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\filters\AccessRule;

date_default_timezone_set("Asia/Bangkok");
/**
 * InstruksiKerjaController implements the CRUD actions for InstruksiKerja model.
 */
class InstruksiKerjaController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                //'only' => [],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['user', 'findmodeluser', 'viewuser', 'updateuser', 'deleteuser', 'index','createuser', 'viewincomingreport', 'viewoutstandingreport', 'viewissuedreport', 'printincomingreport','incomingmodalreport','incomingreport', 'printoutstandingreport','outstandingmodalreport','outstandingreport','printissuedreport','issuedmodalreport','issuedreport','incoming','outstanding','issued','viewincoming','viewoutstanding','viewissued','create','delete','updateincoming','updateoutstanding','pdf'],
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
        $adjuster = InstruksiKerjaOutstanding::find()->select('adjuster')->where("status = 'outstanding'")->distinct()->asArray()->orderBy('adjuster')->all();
        $arr1 = array();
        for($i=0;$i<sizeof($adjuster);$i++){
            $arr1[$adjuster[$i]['adjuster']] = $adjuster[$i]['adjuster'];
        }

        return $this->render('outstanding', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'adjuster' => $arr1,
        ]);
    }

    public function actionIssued()
    {
        $searchModel = new InstruksiKerjaIssued();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $adjuster = InstruksiKerjaIssued::find()->select('adjuster')->where("status = 'issued'")->distinct()->asArray()->orderBy('adjuster')->all();
        $arr1 = array();
        for($i=0;$i<sizeof($adjuster);$i++){
            $arr1[$adjuster[$i]['adjuster']] = $adjuster[$i]['adjuster'];
        }

        return $this->render('issued', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'adjuster' => $arr1,
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
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        return $this->render('view_incoming', [
            'model' => $this->findModel($id),
            'record' => $record,
        ]);
    }

    public function actionViewoutstanding($id)
    {
        $model = $this->findModel($id);
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->orderBy(['created_at' => SORT_DESC])->all();
        return $this->render('view_outstanding', [
            'model' => $this->findModel($id),
            'record' => $record,
        ]);
    }

    public function actionViewissued($id)
    {
        $model = $this->findModel($id);
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        return $this->render('view_issued', [
            'model' => $this->findModel($id),
            'record' => $record,
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
        $record = new Record();
        $reminder = new Reminder();
        if($model->loadAll(Yii::$app->request->post())){

            $nama_client = Client::find()->select('nama')->where('id = '.$model->id_client.'')->asArray()->one();
            $model->assurers = $nama_client['nama'];
            
            if($model->type_of_instruction== 'Cargo Damage'){
                $model->case_number = "MCI.".$model->case_number;
            } else if($model->type_of_instruction== "Carrier's Liability"){
                $model->case_number = "MCI.".$model->case_number;
            } else if($model->type_of_instruction== "Hull Survey"){
                $model->case_number = "MH.".$model->case_number;
            } else if($model->type_of_instruction== "Risks Survey"){
                $model->case_number = "MRI.".$model->case_number;
            }
            
            
            $model->date_entered = date("Y-m-d");
            $hasil = $model->save();
            // print_r($model->getErrors());
            // exit();

            $reminder->id_instruksi = $model->id;
            $reminder->tgl_survei = "2016-11-24";
            $reminder->tgl_aa = strtotime("+1 days", strtotime($reminder->tgl_survei));
            $reminder->tgl_pa = strtotime("+7 days", strtotime($reminder->tgl_aa));
            $reminder->tgl_csd = strtotime("+14 days", strtotime($reminder->tgl_pa));
            $reminder->tgl_dfr = strtotime("+10 days", strtotime($reminder->tgl_csd));
            $reminder->tgl_completed = strtotime("+10 days", strtotime($reminder->tgl_dfr));
            $reminder->saveAll();
            // print_r($reminder->getErrors());
            // exit();

            $record->instruksi_kerja_id = $model->id;
            $record->time = date("Y-m-d");
            $record->description = "Data Created";
            $hasil2 = $record->save();


            if ($hasil && $hasil2) {
               
                Yii::$app->session->setFlash('success','Data was successfully submitted');
                return $this->redirect(['create']);
            } else {
                Yii::$app->session->setFlash('success','Data was failed');
                return $this->redirect(['create']);
            }
        }else{
            return $this->render('create', [
                'model' => $model,
                'record' => $record,
            ]);
        }
        
        //var_dump($hasil); 
        //exit();
    }

    /**
     * Updates an existing InstruksiKerja model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdateincoming($id){
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
    
    public function dateGenerator($input, $id, $tanggal){
        $reminder = new Reminder();
        $connection = Yii::$app->db;
        $startTime = date("Y-m-d H:i");

        if($input == "Survey"){
            $reminder->id_instruksi = $id;
            $reminder->tgl_survei = date('Y-m-d H:i',strtotime('+1 minutes',strtotime($startTime)));
            $reminder->save();
        } else if($input == 'Attandance Advice (AA)'){
            $date = date('Y-m-d H:i',strtotime('+5 minutes',strtotime($startTime)));
            $command = $connection->createCommand("
            UPDATE reminder 
            SET state = 2, tgl_aa = '".$date."'
            WHERE id_instruksi = ".$id."
            ")->execute();
        } else if($input == 'Preliminary Advice (PA)'){
            $date = date('Y-m-d H:i',strtotime('+14 minutes',strtotime($startTime)));
            $command = $connection->createCommand("
            UPDATE reminder 
            SET state = 3, tgl_pa = '".$date."'
            WHERE id_instruksi = ".$id."")->execute();
        } else if($input == 'Chasing Support Documents (CSD)'){
            $date = date('Y-m-d H:i',strtotime('+14 minutes',strtotime($startTime)));
            $command = $connection->createCommand("
            UPDATE reminder 
            SET state = 4, tgl_csd = '".$date."'
            WHERE id_instruksi = ".$id."
            ")->execute();
        } else if($input == 'Draft Final Report (DFR)'){
            $date = date('Y-m-d H:i',strtotime('+10 minutes',strtotime($startTime)));
            $command = $connection->createCommand("
            UPDATE reminder 
            SET state = 5, tgl_dfr = '".$date."'
            WHERE id_instruksi = ".$id."
            ")->execute();
        } else if($input == 'Sending DFR To Insurer'){
            $date = date('Y-m-d H:i',strtotime('+0 minutes',strtotime($startTime)));
            $command = $connection->createCommand("
            UPDATE reminder 
            SET state = 6, tgl_completed = '".$date."'
            WHERE id_instruksi = ".$id."
            ")->execute();
        }
    }

    public function actionUpdateoutstanding($id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new InstruksiKerja();
        }else{
            $model = $this->findModel($id);
            $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->orderBy(['time' => SORT_ASC])->all();
        }

        

        if ($model->loadAll(Yii::$app->request->post())) {
            
            $POST_VARIABLE = Yii::$app->request->post('InstruksiKerja');
            if($POST_VARIABLE['description_record'] != null && $POST_VARIABLE['time_record'] != null){
                $new_record = new Record();
                $new_record->time = $POST_VARIABLE['time_record'];
                $new_record->user = Yii::$app->user->identity->username;
                $new_record->instruksi_kerja_id = $model->id;
                $new_record->description = $POST_VARIABLE['description_record'];
                $new_record->keterangan = $POST_VARIABLE['keterangan'];
                $this->dateGenerator($POST_VARIABLE['description_record'],$id,$POST_VARIABLE['time_record']);
                $new_record->save();
            }
            $model->save();
            return $this->redirect(['viewoutstanding', 'id' => $model->id]);
        } else {
            return $this->render('updateoutstanding', [
                'model' => $model,
                'record' => $record,
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
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        // echo '<pre>';
        // var_dump($record);
        // echo '</pre>';
        // exit();

        $content = $this->renderPartial('_pdf', [
            'model' => $model,
            'record' => $record,
        ]);

        $ourPdfHeader = [
            'L' => [
                'content'   => 'PT Global Internusa Adjusting Surabaya',
                'font-size' => 8,
                'font-style'=> 'B',
                'font-family' => 'serif',
                'color'     => '#333333'
            ],
            'C' => [
                'content'   => '',
                'font-size' => 8,
                'font-style'=> 'B',
                'font-family' => 'serif',
                'color'     => '#333333'
            ],
            'R' => [
                'content'   => 'Generated' . ': ' . date("D, d-M-Y g:i a"),
                'font-size' => 8,
                'font-style'=> 'B',
                'font-family' => 'serif',
                'color'     => '#333333'
            ],
            'line' => TRUE,
        ];

        $ourPdfFooter = [
            'L'    => [
                'content'   => '',
                'font-size' => 8,
                'font-style'=> 'B',
                'font-family' => 'serif',
                'color'     => '#333333'
            ],
            'C' => [
                'content'   => '<p>5<sup>th</sup> Fl. Gedung Kompas Gramedia, Jl. Raya Jemursari No. 64, Surabaya</p>',
                'font-size' => 8,
                'font-style'=> 'B',
                'font-family' => 'serif',
                'color'     => '#333333'
            ],
            'R'    => [
                'content'     => '[{PAGENO}]',
                'font-size'   => 8,
                'font-style'  => 'B',
                'font-family' => 'serif',
                'color'       => '#333333'
            ],
            'line' => TRUE,
        ];

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'filename' => $model->case_number.'.'.'pdf',
            'options' => ['title' => $model->case_number],
            'methods' => [
                'SetHeader' => [
                    ['odd' => $ourPdfHeader, 'even' => $ourPdfHeader]
                ],
                'SetFooter' => [
                    ['odd' => $ourPdfFooter, 'even' => $ourPdfFooter]
                ],
            ],
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

    protected function findModelRecord($id)
    {
        if (($model = Record::find($id)->where(['instruksi_kerja_id' => $id])->one()) !== null) {
            return $model;
        } else {
            return null;
        }
    }

    public function actionOutstandingmodalreport(){

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
        $tahun = InstruksiKerjaIncoming::find()->select('extract(YEAR from date_of_instruction) as year')->distinct()->asArray()->orderBy('year')->all();
        // kodingan ini menyimpan kembali array yang benar
        // array berisi key dan nilai yg sama
        $arr = array();
        for($i=0;$i<sizeof($tahun);$i++){
            $arr[$tahun[$i]['year']] = $tahun[$i]['year'];
           
        }

        $adjuster = InstruksiKerjaIncoming::find()->select('adjuster')->distinct()->asArray()->orderBy('adjuster')->all();
        $arr1 = array();
        for($i=0;$i<sizeof($adjuster);$i++){
            $arr1[$adjuster[$i]['adjuster']] = $adjuster[$i]['adjuster'];
        }
        // echo "<pre>";
        // var_dump($arr);
        // echo "</pre>";
        // exit(); 
        return $this->render('incomingreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahun' => $arr,
            'adjuster' => $arr1,
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

  

    public function actionOutstandingreport(){
        $searchModel = new InstruksiKerjaOutstanding();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        // kodingan ini menyimpan kembali array yang benar
        // array berisi key dan nilai yg sama
        $tahun = InstruksiKerjaOutstanding::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'outstanding'")->distinct()->asArray()->orderBy('year')->all();
        $arr = array();
        for($i=0;$i<sizeof($tahun);$i++){
            $arr[$tahun[$i]['year']] = $tahun[$i]['year'];
        }

        $adjuster = InstruksiKerjaOutstanding::find()->select('adjuster')->where("status = 'outstanding'")->distinct()->asArray()->orderBy('adjuster')->all();
        $arr1 = array();
        for($i=0;$i<sizeof($adjuster);$i++){
            $arr1[$adjuster[$i]['adjuster']] = $adjuster[$i]['adjuster'];
        }
        // echo "<pre>";
        // var_dump($arr1);
        // echo "</pre>";
        // exit(); 
        return $this->render('outstandingreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahun' => $arr,
            'adjuster' => $arr1,
        ]);
    }

   

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
      
        return $this->renderAjax('issuedmodalreport',[
                'year' => $year,
            ]);
    }

    public function actionIssuedreport(){
        $searchModel = new InstruksiKerjaIssued();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $tahun = InstruksiKerjaIssued::find()->select('extract(YEAR from date_of_instruction) as year')->where("status = 'issued'")->distinct()->asArray()->orderBy('year')->all();
        // kodingan ini menyimpan kembali array yang benar
        // array berisi key dan nilai yg sama
        $arr = array();
        for($i=0;$i<sizeof($tahun);$i++){
            $arr[$tahun[$i]['year']] = $tahun[$i]['year'];
           
        }

        $adjuster = InstruksiKerjaIssued::find()->select('adjuster')->where("status = 'issued'")->distinct()->asArray()->orderBy('adjuster')->all();
        $arr1 = array();
        for($i=0;$i<sizeof($adjuster);$i++){
            $arr1[$adjuster[$i]['adjuster']] = $adjuster[$i]['adjuster'];
        }

        return $this->render('issuedreport1', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tahun' => $arr,
            'adjuster' => $arr1,
        ]);
    }


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

    public function actionViewincomingreport($id)
    {
        $model = $this->findModel($id);
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        return $this->render('view_incomingreport', [
            'model' => $this->findModel($id),
            'record' => $record,
        ]);
    }

    public function actionViewoutstandingreport($id)
    {
        $model = $this->findModel($id);
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        return $this->render('view_outstandingreport', [
            'model' => $this->findModel($id),
            'record' => $record,
        ]);
    }

    public function actionViewissuedreport($id)
    {
        $model = $this->findModel($id);
        $record = Record::find()->where(['instruksi_kerja_id' => $id])->asArray()->all();
        return $this->render('view_issuedreport', [
            'model' => $this->findModel($id),
            'record' => $record,
        ]);
    }

    // fungsi di bawah ini untuk management user 
    protected function findModeluser($id)
    {
        if (($model = Login::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionUser(){
        $searchModel = new LoginSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('user_index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionViewuser($id)
    {
        $model = $this->findModeluser($id);
        return $this->render('view_user', [
            'model' => $this->findModeluser($id),
        ]);
    }

    public function actionCreateuser(){
        $model = new Login();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['user', 'id' => $model->id]);
        } else {
            return $this->render('user_create', [
                'model' => $model,
            ]);
        }
    }

    public function actionUpdateuser($id)
    {
        //$searchModel = new LoginSearch();
        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        // var_dump($id);
        // exit();
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new Login();
        }
        else{
            $model = $this->findModeluser($id);
        }



        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
                return $this->redirect(['viewuser', 'id' => $model->id]);
        } 
        else {
            return $this->render('user_update', [
                'model' => $model,
            ]);
        }
    }

    public function actionDeleteuser($id)
    {
        $this->findModeluser($id)->deleteWithRelated();

        return $this->redirect(['user']);
    }
    

}
