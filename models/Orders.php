<?php

namespace app\models;

use app\models\Product; 
use  app\models\Pointofsale;
 
 
 
/**
 * Description of Orders
 *
 * @author nekitak46
 */

class Orders extends AppModel
{
    
    public static function cancel($id)
    {
        $order = self::findOne($id);
        $order->status = 0;
        $order->save();
       
    }
    
    public function ruels()
    {
         return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }
    
    
    public static function prepareOrder()
    {
        $cart = Product::getCart();
 
        $orderBucket = [];
        $orderItem = [];
        $totalPrice  = 0;
        
        $productList = Product::find()->all();
        
        
        foreach($cart as $item){
            $orderItem['name'] = $item->name; 
             $orderItem['count'] = $_SESSION['cart'][$item->id]['count']; 
              $totalPrice +=  $item->price*$orderItem['count'];
               $orderBucket[] = $orderItem ;
   
            unset($orderItem);
        }
   
        $orderBucket = json_encode($orderBucket);
             
        return [$orderBucket , $totalPrice];
    }
    
    public function  prepareDeal()
    {
        echo '<pre>';
        print_r($_POST);
    }
    
    public function newOrder()
    {
        $orderBucket = $this->prepareOrder();
        $userData = $this->prepareUserData();
        $point = Pointofsale::findOne($_SESSION['select'][0]);
  
        $this->product_list = $orderBucket[0];
        $this->total_price = $orderBucket[1];
        $this->status = 1;
        $this->order_type = 1;
        $this->from_info = $point->name;
        $this->to_info_name  = $userData['name'];
        $this->to_info_email  = $userData['email'];
        $this->save();
        
    }
    
    public function getTracking()
    {
        $userData = $this->prepareUserData();
        
        $orders = self::find()
                ->where( 'to_info_name = :name'  , [':name' => $userData['name']])
                ->select('product_list , order_id , status , total_price')
                ->all();
        
        
        foreach($orders as $order){
            if($order->status == 1)
                $ordersA[] = $order;
        }
        
        return $ordersA;
    }
    
   
}
