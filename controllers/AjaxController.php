<?php


namespace app\controllers;
use Yii;
use app\models\Requisites;
use yii\web\Controller;
use app\models\Customers;
use app\models\Locations;

class AjaxController extends Controller
{
    public function actionSearchUser($term)
    {
        if (Yii::$app->request->isAjax) {

            $results = [];

            if (is_numeric($term)) {
                /** @var Tag $model */
                $model = Locations::findOne(['id' => $term]);

                if ($model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['zip_code'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            } else {

                $q = addslashes($term);

                foreach(Locations::find()->where("(`zip_code` like '%{$q}%')")->all() as $model) {
                    $results[] = [
                        'id' => $model['id'],
                        'label' => $model['zip_code'] . ' (model id: ' . $model['id'] . ')',
                    ];
                }
            }

            echo Json::encode($results);
        }
    }
}
?>