<?php


namespace app\controllers;

/**
 * Description of OrderController
 *
 * @author nekitak46
 */
class OrderController extends AppController
{
    public function actionIndex()
    {
           return $this->render('index.twig');
    }
}
