<?php

namespace app\modules\admin\controllers;

use Yii;
use app\modules\admin\models\User;
use app\modules\admin\models\AuthItem;
use app\modules\admin\models\AuthAssignment;
use app\modules\admin\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\ForbiddenHttpException;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    //menentukan id user ke daftar izin akses
    public function actionAuthAssignment(){
        $auth = Yii::$app->authManager;

        $admin = $auth->createRole('admin');
        
        $auth->assign($admin, 1);
    }

    //membuat daftar pengguna bawaan yang dapat mengakses dari daftar izin akses
    public function actionItemChild(){
        $auth = Yii::$app->authManager;

        //admin dapat mengakses semua daftar izin akses
        $am_manager = $auth->createPermission('am-manager');
        $am_staff = $auth->createPermission('am-staff');
        $ap_manager = $auth->createPermission('ap-manager');
        $ap_staff = $auth->createPermission('ap-staff');
        $ar_manager = $auth->createPermission('ar-manager');
        $ar_staff = $auth->createPermission('ar-staff');
        $fi_manager = $auth->createPermission('fi-manager');
        $fi_staff = $auth->createPermission('fi-staff');
        $gl_manager = $auth->createPermission('gl-manager');
        $gl_staff = $auth->createPermission('gl-staff');
        $hrm_manager = $auth->createPermission('hrm-manager');
        $hrm_staff = $auth->createPermission('hrm-staff');
        $iwm_manager = $auth->createPermission('iwm-manager');
        $iwm_staff = $auth->createPermission('iwm-staff');
        $pp_manager = $auth->createPermission('pp-manager');
        $pp_staff = $auth->createPermission('pp-staff');
        $pur_manager = $auth->createPermission('pur-manager');
        $pur_staff = $auth->createPermission('pur-staff');
        $sd_manager = $auth->createPermission('sd-manager');
        $sd_staff = $auth->createPermission('sd-staff');
        
        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $am_manager);
        $auth->addChild($admin, $am_staff);
        $auth->addChild($admin, $ap_manager);
        $auth->addChild($admin, $ap_staff);
        $auth->addChild($admin, $ar_manager);
        $auth->addChild($admin, $ar_staff);
        $auth->addChild($admin, $fi_manager);
        $auth->addChild($admin, $fi_staff);
        $auth->addChild($admin, $gl_manager);
        $auth->addChild($admin, $gl_staff);
        $auth->addChild($admin, $hrm_manager);
        $auth->addChild($admin, $hrm_staff);
        $auth->addChild($admin, $iwm_manager);
        $auth->addChild($admin, $iwm_staff);
        $auth->addChild($admin, $pp_manager);
        $auth->addChild($admin, $pp_staff);
        $auth->addChild($admin, $pur_manager);
        $auth->addChild($admin, $pur_staff);
        $auth->addChild($admin, $sd_manager);
        $auth->addChild($admin, $sd_staff);
    }

    //membuat daftar izin akses
    public function actionAuthItem()
    {
        $auth = Yii::$app->authManager;

        // menambahkan akses sebagai admin ke tabel auth_item
        $admin = $auth->createPermission('admin');
        $admin->description = 'Allow user to access all page';
        $auth->add($admin);

        // menambahkan akses sebagai asset management manajer ke tabel auth_item
        $am_manager = $auth->createPermission('am-manager');
        $am_manager->description = 'Allow user as Asset Management Manager';
        $auth->add($am_manager);

        // menambahkan akses sebagai asset management staff ke tabel auth_item
        $am_staff = $auth->createPermission('am-staff');
        $am_staff->description = 'Allow user as Asset Management Staff';
        $auth->add($am_staff);

        // menambahkan akses sebagai account payable manajer ke tabel auth_item
        $ap_manager = $auth->createPermission('ap-manager');
        $ap_manager->description = 'Allow user as Account Payable Manager';
        $auth->add($ap_manager);

        // menambahkan akses sebagai account payable staff ke tabel auth_item
        $ap_staff = $auth->createPermission('ap-staff');
        $ap_staff->description = 'Allow user as Account Payable Staff';
        $auth->add($ap_staff);

        // menambahkan akses sebagai account receivable manajer ke tabel auth_item
        $ar_manager = $auth->createPermission('ar-manager');
        $ar_manager->description = 'Allow user as Account Receivable Manager';
        $auth->add($ar_manager);

        // menambahkan akses sebagai account receivable staff ke tabel auth_item
        $ar_staff = $auth->createPermission('ar-staff');
        $ar_staff->description = 'Allow user as Account Receivable Staff';
        $auth->add($ar_staff);

        // menambahkan akses sebagai finance manajer ke tabel auth_item
        $fi_manager = $auth->createPermission('fi-manager');
        $fi_manager->description = 'Allow user as Finance Manager';
        $auth->add($fi_manager);

        // menambahkan akses sebagai finance staff ke tabel auth_item
        $fi_staff = $auth->createPermission('fi-staff');
        $fi_staff->description = 'Allow user as Finance Staff';
        $auth->add($fi_staff);

        // menambahkan akses sebagai accounting/general ledger manajer ke tabel auth_item
        $gl_manager = $auth->createPermission('gl-manager');
        $gl_manager->description = 'Allow user as General Ledger Manager';
        $auth->add($gl_manager);

        // menambahkan akses sebagai accounting/general ledger staff ke tabel auth_item
        $gl_staff = $auth->createPermission('gl-staff');
        $gl_staff->description = 'Allow user as General Ledger Staff';
        $auth->add($gl_staff);

        // menambahkan akses sebagai human resource management manajer ke tabel auth_item
        $hrm_manager = $auth->createPermission('hrm-manager');
        $hrm_manager->description = 'Allow user as Human and Resource Manager';
        $auth->add($hrm_manager);

        // menambahkan akses sebagai human resource management staff ke tabel auth_item
        $hrm_staff = $auth->createPermission('hrm-staff');
        $hrm_staff->description = 'Allow user as Human and Resource Staff';
        $auth->add($hrm_staff);

        // menambahkan akses sebagai inventory and warehouse management manajer ke tabel auth_item
        $iwm_manager = $auth->createPermission('iwm-manager');
        $iwm_manager->description = 'Allow user as Inventory and Warehouse Management Manager';
        $auth->add($iwm_manager);

        // menambahkan akses sebagai inventory and warehouse management staff ke tabel auth_item
        $iwm_staff = $auth->createPermission('iwm-staff');
        $iwm_staff->description = 'Allow user as Inventory and Warehouse Management Staff';
        $auth->add($iwm_staff);

        // menambahkan akses sebagai production planning manajer ke tabel auth_item
        $pp_manager = $auth->createPermission('pp-manager');
        $pp_manager->description = 'Allow user as Producton Planning Manager';
        $auth->add($pp_manager);

        // menambahkan akses sebagai production planning staff ke tabel auth_item
        $pp_staff = $auth->createPermission('pp-staff');
        $pp_staff->description = 'Allow user as Producton Planning Staff';
        $auth->add($pp_staff);

        // menambahkan akses sebagai purchasing manajer ke tabel auth_item
        $pur_manager = $auth->createPermission('pur-manager');
        $pur_manager->description = 'Allow user as Purchasing Manager';
        $auth->add($pur_manager);

        // menambahkan akses sebagai purchasing staff ke tabel auth_item
        $pur_staff = $auth->createPermission('pur-staff');
        $pur_staff->description = 'Allow user as Purchasing Staff';
        $auth->add($pur_staff);

        // menambahkan akses sebagai sales and distribution manajer ke tabel auth_item
        $sd_manager = $auth->createPermission('sd-manager');
        $sd_manager->description = 'Allow user as Sales and Distribution Manager';
        $auth->add($sd_manager);

        // menambahkan akses sebagai sales and distribution staff ke tabel auth_item
        $sd_staff = $auth->createPermission('sd-staff');
        $sd_staff->description = 'Allow user as Sales and Distribution Staff';
        $auth->add($sd_staff);
    }

    /**
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        if(Yii::$app->user->can('admin')){
            $searchModel = new UserSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel' => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }
        else {
            throw new ForbiddenHttpException("Sorry, you don't have access to this page");
        }
    }

    /**
     * Displays a single User model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $model = $this->findModel($id);
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
	$model->scenario = 'update';

        $model->permission = explode(',',  $model->permission);
        

        if ($model->loadAll(Yii::$app->request->post())) {

            $auth = AuthAssignment::findAll(['user_id' => $id]);

            if(isset($model->permission)){

                //add user permission
                if(count($model->permission) >= count($auth)) {
                    $list = array();
                    foreach ($auth as $key => $value) {
                        array_push($list, $value['item_name']);
                    }
                    
                    $diff = array_diff($model->permission, $list);

                    foreach ($diff as $key => $value) {
                        $new_permission = new AuthAssignment;
                        $new_permission->item_name = $value;
                        $new_permission->user_id = $model['id'];
                        $new_permission->save();
                    }
                }

                //delete user permission
                else if(count($model->permission) < count($auth)){
                    $list = array();
                    foreach ($auth as $key => $value) {
                        array_push($list, $value['item_name']);
                    }

                    $diff = array_diff($list, $model->permission);
                    foreach ($diff as $key => $value) {
                        $auth_delete = AuthAssignment::find()->where('item_name = "'.$value.'" AND user_id='.$id)->one();
                        $auth_delete->delete();
                    }
                }

                $model->permission = implode(',',  $model->permission);


                $model->saveAll();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->deleteWithRelated();
        $auth_list = AuthAssignment::findAll(['user_id' => $id]);
        foreach ($auth_list as $key => $value) {
            $value->delete();    
        }
        return $this->redirect(['index']);
    }
    
    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
