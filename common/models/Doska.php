<?php

namespace common\models;

use Yii;
use yii\web\HttpException;

/**
 * This is the model class for table "doska".
 *
 * @property int $id_doska
 * @property int $id_profile
 * @property string $header
 * @property string $category
 * @property string $price
 * @property string $photo
 * @property string $date_pub
 * @property string $about
 */
class Doska extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'doska';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_profile', 'photo'], 'default', 'value' => null],
            [['id_profile'], 'integer'],
            [['header', 'category', 'price', 'photo', 'about'], 'required'],
            [['date_pub'], 'safe'],
            [['header', 'category', 'price', 'photo', 'about', 'status'], 'string', 'max' => 255],
        ];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_doska' => 'Id Doska',
            'id_profile' => 'Id Profile',
            'status' => 'Status',
            'header' => 'Header',
            'category' => 'Category',
            'price' => 'Price',
            'photo' => 'Photo',
            'date_pub' => 'Date Pub',
            'about' => 'About',
        ];
    }

    public function saveImage($filename) {

        $this->photo = $filename;
        return $this->save(false);
    }

    public function getImage() {
        return ($this->photo) ? '/uploads/' . $this->photo : '/no-image.png';
    }

    public function getProfile(){

        return $this->hasOne(Profile::className(), ['id_user' => 'id_profile']);
    }

    /*public function beforeSave($insert)
    {
        $this->checkAccess();
        return parent::beforeSave($insert);
    }

    protected function checkAccess()
    {
        if ($this->id_profile !== Yii::$app->user->id){
            throw new HttpException('404', 'Недоступно');
        }
    }*/

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->photo);
    }

    public function beforeDelete()
    {   
        $this->deleteImage();
        return parent::beforeDelete();
    }
}
