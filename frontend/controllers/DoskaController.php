<?php

namespace frontend\controllers;

use Yii;
use common\models\Doska;
use common\models\ImageUpload;
use common\models\Profile;
use common\models\DoskaSearch;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use yii\web\HttpException;
use yii\data\Pagination;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * Контроллер доски
 */
class DoskaController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'profile', 'doska', 'create', 'profiledoska', 'updatedoska'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /*public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }*/

    /**
     * Функция добавления объявления
     * */


    public function actionCreate()
    {
        $model = new Doska();
        $models = new ImageUpload;

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {

            if (Yii::$app->request->isPost)
            {
                $doska = $model;
                $file = UploadedFile::getInstance($models, 'image');

                if($doska->saveImage($models->uploadFile($file, $doska->photo))) {
                    //return $this->redirect(['/doska/profiledoska']);
                }
            }

            $model->id_profile = Yii::$app->user->identity->getId();
            $model->date_pub = 'NOW()';
            $model->status = 'Активен';
            $model->save(false);
            return $this->redirect(['../site/index']);
        }

        return $this->render('create', [
            'model' => $model,
            'models' => $models,
        ]);
    }

    /**
    Страница с объявлением
     */

    private function findModel($id)
    {
        if (($model = Doska::findOne($id)) !== null && $model->id_profile == Yii::$app->user->id) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

       /* if (($model = Doska::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');*/
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['/doska/profiledoska']);
        }

        return $this->render('/doska/updatedoska', [
            'model' => $model,

        ]);
    }

      /*  public function actionDelete($id)
        {
            $model = $this->findModel($id);
            $this->checkAccess($model);

            $model->delete();

            return $this->redirect(['index']);
        }
    }*/

    /**
    Редактирование объявления
     */

    public function actionUpdatedoska($id)
    {
        $model = Doska::find()->where(['id_doska' => $id])->one();
        $models = new ImageUpload;
        $this->checkAccess($model);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if (Yii::$app->request->isPost)
            {
                $doska = $this->findModel($id);
                $file = UploadedFile::getInstance($models, 'image');

                //var_dump(strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension)); die;

                if($doska->saveImage($models->uploadFile($file, $doska->photo))) {
                    return $this->redirect(['/doska/profiledoska']);
                }
            }
            //return $this->redirect(['/doska/profiledoska']);
        }

        return $this->render('../doska/updatedoska', ['model' => $model , 'models' => $models]);
    }

    protected function checkAccess($model)
    {
        if ($model->id_profile !== Yii::$app->user->id){
            throw new HttpException('404', 'Доступ закрыт');
        }
    }

    /*protected function findModel($id)
    {
        if (($model = Doska::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }*/

   /* public function actionUpdateImage($id)
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)
        {
            $doska = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            //var_dump(strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension)); die;

            if($doska->saveImage($model->uploadFile($file, $doska->photo))) {
                return $this->redirect(['profiledoska']);
            }
        }

        return $this->render('update-image', ['model'=>$model]);
    }*/

    /*public function actionImage()
    {
        $model = new ImageUpload;

        if (Yii::$app->request->isPost)
        {
            //$doska = $this->findModel($id);
            $file = UploadedFile::getInstance($model, 'image');

            //var_dump(strtolower(md5(uniqid($file->baseName)) . '.' . $file->extension)); die;

            $model->saveImage($model->uploadFile($file, $model->$model));
        }
        //return $this->render('image', ['model'=>$model]);
    }*/


    /**
    Страница мои объявления
     */
    public function actionProfiledoska()
    {
        $searchModel = new DoskaSearch();
        $dataProvider = $searchModel->search(\Yii::$app->request->queryParams);
        $pages = new Pagination([
            'totalCount' => $dataProvider
                ->query
                ->count(),
            'pageSize' => 8
        ]);
        /**
        Пацинация объявлений
         */
        $models = $dataProvider
            ->query
            ->offset($pages->offset)
            ->limit($pages->limit)
            ->andWhere(['id_profile' => Yii::$app->user->identity->getId()])
            ->orderBy(['date_pub' => SORT_DESC])
            ->all();

        return $this->render('../doska/profiledoska', [
            'models' => $models,
            'searchModel' => $searchModel,
            /*'dataProvider' => $dataProvider,*/
            'pages' => $pages

           // return $this->render('../doska/profiledoska', ['model' => $this->findModel()]);
        ]);
    }



   /* protected function findModel($id)
    {
        if (($model = Doska::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }*/
}
