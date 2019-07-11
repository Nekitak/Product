<?php


namespace app\controllers;

use app\models\Orders;
 

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
        unset($_POST);
        return $this->goHome();
    }
    
    public function actionTracking()
    {   
        $orders = (new Orders)->getTracking();
        
        // to do: view of order list and status description , for example: status 1 == on way , and so on
        
        return $this->render('tracking.twig' , ['orders' => $orders ]);
    }
    
    public function actionCancel($id)
    {
        $id = intval($id);
        Orders::cancel($id);
        $this->redirect('tracking');     
    }
   
}
