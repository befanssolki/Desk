<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model {

    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,png,jpeg']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage) {

        $this->image = $file;

        if($this->validate())
        {
            $this->deleteCurrentImage($currentImage);
            return $this->saveImage();
        }
    }
    //Загрузка в папку uploads
    private function getFolder() {
       return Yii::getAlias('@frontend') . '/web/uploads/';
    }
    //генирация уникального имени для файла
    private function generateFilename() {
       return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }
    //Замена.удаление изображения
    public function deleteCurrentImage($currentImage) {

        if ($this->fileExists($currentImage))
        {
            unlink($this->getFolder() . $currentImage);
        }
    }
    //Проверка на существование файла
    public function fileExists($currentImage) {

        if(!empty($currentImage) && $currentImage != null)
        {
        return file_exists($this->getFolder() . $currentImage);
        }
    }
    //Сохранение изображения
    public function saveImage() {

        $filename = $this->generateFilename();

        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }
}