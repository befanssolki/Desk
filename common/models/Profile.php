<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property int $id_profile
 * @property string $name_profile
 * @property string $familia_profile
 * @property string $otchestvo_profile
 * @property string $photo_profile
 * @property int $tel
 * @property string $datereg
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_profile', 'familia_profile', 'otchestvo_profile', 'tel', 'photo_profile'], 'required'],
            [['tel', 'id_user'], 'default', 'value' => null],
            [['tel', 'id_user'], 'integer'],
            [['datereg'], 'safe'],
            [['name_profile', 'familia_profile', 'otchestvo_profile', 'photo_profile', 'city', 'about_profile'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_profile' => 'Id Profile',
            'id_user' => 'Id user',
            'photo_profile' => 'Photo Profile',
            'name_profile' => 'Name Profile',
            'familia_profile' => 'Familia Profile',
            'otchestvo_profile' => 'Otchestvo Profile',
            'tel' => 'Tel',
            'datereg' => 'Datereg',
            'city' => 'City',
            'about_profile' => 'About Profile',
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'id_profile']);
    }

    public function saveImage($filename) {

        $this->photo_profile = $filename;
        return $this->save(false);
    }

    public function getImage() {
        return ($this->photo_profile) ? '/uploads/' . $this->photo_profile : '/no-image.png';
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteCurrentImage($this->photo_profile);
    }

    public function beforeDelete()
    {
        $this->deleteImage();
        return parent::beforeDelete();
    }
}
