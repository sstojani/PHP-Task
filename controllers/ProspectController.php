<?php

namespace app\controllers;

use Yii;
use app\models\Prospect;
use app\models\ImportForm;
use yii\web\Controller;
use yii\web\UploadedFile;

class ProspectController extends Controller
{
    public function actionImport()
    {
        $model = new ImportForm();

        if (Yii::$app->request->isPost) {
            $model->csvFile = UploadedFile::getInstance($model, 'csvFile');
            if ($model->csvFile && $model->csvFile->tempName) {
                $filePath = $model->csvFile->tempName;
                $date = date('Y-m-d H:i:s');
                
                $data = array_map('str_getcsv', file($filePath));
                foreach ($data as $row) {
                    $model = new Prospect();
                    $model->email = $row[0];
                    $model->first_name = $row[1];
                    $model->last_name = $row[2];
                    $model->date = $date;
                    $model->address = $row[3];
                    $model->city = $row[4];
                    $model->zip_code = $row[5]; 
                    $model->phone = $row[6]; 
                    $model->fiscal_code = $row[7]; 
                    $model->save();
                }
                
                // Delete the file
                if (unlink($filePath)) {
                    Yii::$app->session->setFlash('success', 'CSV file imported successfully.');
                } else {
                    Yii::error('Failed to delete file: ' . $filePath);
                    Yii::$app->session->setFlash('error', 'Failed to delete CSV file.');
                }
                
                return $this->refresh();
            } else {
                Yii::$app->session->setFlash('error', 'Error uploading CSV file.');
            }
        }

        return $this->render('import', ['model' => $model]);
    }
}
