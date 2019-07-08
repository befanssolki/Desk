<?php

namespace frontend\controllers;

use Yii;
use common\models\Profile;
use common\models\ImageUpload;
use common\models\ProfileSearch;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class ProfileController extends Controller
{
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
                        'actions' => ['logout', 'profile', 'update', 'create'],
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




    private function findModel()
    {
        return Profile::find()->where(['id_user' => Yii::$app->user->identity->getId()])->one();
    }

    public function actionCreate()
    {
        $model = new Profile();
        $images = new ImageUpload;

        if ($model->load(Yii::$app->request->post())) {
            $model->id_user = Yii::$app->user->identity->getId();
            $model->save();
            $model->datereg = date("Y-m-d H:i:s");;
            if (Yii::$app->request->isPost)
            {
                //$profile = $model;
                $file = UploadedFile::getInstance($images, 'image');

                $model->saveImage($images->uploadFile($file, $model->photo_profile));
                //return $this->redirect(['/profile/profile']);
            }

            return $this->redirect(['profile']);
        }

        else {
            return $this->render('create', [
                'model' => $model,
                'images' => $images,
            ]);
        }
    }

    /**
     * редактирование профиля
    */
    public function actionUpdate()
    {
        $model = $this->findModel();
        $images = new ImageUpload;

        if ($model->load(Yii::$app->request->post())) {
            if (Yii::$app->request->isPost)
            {
                //$profile = $model;
                $file = UploadedFile::getInstance($images, 'image');

                $model->saveImage($images->uploadFile($file, $model->photo_profile));
                    //return $this->redirect(['/profile/profile']);
            }
            return $this->redirect(['profile']);
        }

        else {
            return $this->render('update', [
                'model' => $model,
                'images' => $images,
            ]);
        }
    }

    /**
     * Рендер профиля
    */

    public function  actionProfile() {

        $model = Profile::find()->where(['id_user' => Yii::$app->user->identity->getId()])->one();
        //var_dump(Yii::$app->user->identity->getId());
        return $this->render('profile', ['model' => $model]);

    }

}
