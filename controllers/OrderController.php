<?php


namespace app\controllers;

use app\models\Product;
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
    
    public function actionBuy()
    {
        return $this->render('buy.twig');
    }
    
    public function actionOrder()
    {
         
        $cart = Product::getCart();
       
        $orderBuccket = [];
        $orderItem = [];
        
        foreach($cart as $item){
            $orderItem['name'] = $item->name; 
             $orderItem['count'] = $_SESSION['cart'][$item->id]['count']; 
              $orderBuccket[] = $orderItem ;
              unset($orderItem);
        }
        $orderBuccket = json_encode($orderBuccket);
        echo'<pre>';
        print_r($orderBuccket);
    }
}
