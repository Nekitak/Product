<?php


namespace app\controllers;

use app\models\Orders;
use app\models\Deals;
use yii;

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
        $model = new Orders();
         
//        if ($model->load(Yii::$app->request->post())) {
//             print_r(Yii::$app->request->post());
//        }
        
        return $this->render('index.php',
                            ['model' => $model]);
    }
    
    public function actionBuy()
    {
        $model = new Orders();
        return $this->render('buy.php' , 
                             ['model' => $model]);
    }
    
    public function actionNewBuyOrder()
    {
        $order = (new Orders)->newOrder();
        
        return $this->goHome();
    }
    
    public function actionTracking()
    {   
        $orders = (new Orders)->getTracking();
        
        // to do: view of order list and status description , for example: status 1 == on way , and so on
        
        return $this->render('tracking.php' , ['orders' => $orders ]);
    }
    
    public function actionCancel($id)
    {
        $id = intval($id);
        Orders::cancel($id);
        $this->redirect('tracking');     
    }
   
    public  function actionNewDealPage()
    {  
        $model = new Orders();
        return $this->render('deal.php',
                             ['model' => $model]);
    }
    
     public  function actionCreateNewDeal()
     {
        $order = (new Deals())->newDeal();
        return $this->goHome();
     }
}
