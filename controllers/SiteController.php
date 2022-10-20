<?php

namespace pay\controllers;

use pay\form\PayForm;
use pay\services\PaymentTypeSelector;
use yii\helpers\VarDumper;
use yii\web\Controller;

class SiteController extends Controller
{
    /**
     * @return void
     */
    public function actionIndex(): void
    {
        $form = new PayForm();
        $params[(new \ReflectionClass($form))->getShortName()] = \Yii::$app->request->get();
        if ($form->load($params) && $form->validate()) {
            $this->dump(
                (
                    new PaymentTypeSelector(
                        $form->productType,
                        $form->amount,
                        $form->lang,
                        $form->countryCode,
                        $form->os
                    )
                )->getButtons()
            );
        } else {
            $this->dump($form->errors ?? \Yii::t('app', 'Unknown error'));
        }
    }

    /**
     * @param $data
     * @return void
     */
    private function dump($data): void
    {
        echo '<pre>';
        VarDumper::dump($data);
        echo '</pre>';
    }
}
