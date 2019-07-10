<?php


namespace app\controllers;

use app\models\Orders;
use  app\models\Pointofsale;

/**
 * Description of OrderController
 * 
 *  @param $orderBucket[0] - json encode product list , contains product name and count in cart
 *  @param $orderBucket[1] - totalPrice
 * 
 * @author nekitak46
 */
class OrderController extends AppController
{
     


    public function actionIndex()
    {
        return $this->render('index.twig');
    }
    
    public function actionBuy()
    {
        return $this->render('buy.twig');
    }
    
    public function actionOrder()
    {
        $order = (new Orders)->newOrder();
        return $this->redirect('index'); 
    }
    
    
}
