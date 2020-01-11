<?php

namespace backend\controllers;

use Yii;
use common\models\OrganizationMember;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * OrganizationMemberController implements the CRUD actions for OrganizationMember model.
 */
class OrganizationMemberController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all OrganizationMember models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => OrganizationMember::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single OrganizationMember model.
     * @param integer $OrganizationID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($OrganizationID, $UserID)
    {
        return $this->render('view', [
            'model' => $this->findModel($OrganizationID, $UserID),
        ]);
    }

    /**
     * Creates a new OrganizationMember model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new OrganizationMember();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'OrganizationID' => $model->OrganizationID, 'UserID' => $model->UserID]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing OrganizationMember model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $OrganizationID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($OrganizationID, $UserID)
    {
        $model = $this->findModel($OrganizationID, $UserID);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'OrganizationID' => $model->OrganizationID, 'UserID' => $model->UserID]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing OrganizationMember model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $OrganizationID
     * @param integer $UserID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($OrganizationID, $UserID)
    {
        $this->findModel($OrganizationID, $UserID)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the OrganizationMember model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $OrganizationID
     * @param integer $UserID
     * @return OrganizationMember the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($OrganizationID, $UserID)
    {
        if (($model = OrganizationMember::findOne(['OrganizationID' => $OrganizationID, 'UserID' => $UserID])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
