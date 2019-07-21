<?php

namespace app\models;

use app\models\Product; 
use app\models\Pointofsale;
 
 
 
/**
 * Description of Orders
 *
 * @author nekitak46
 */

class Orders extends AppModel implements DataHandlerInterface
{
    /* consts for order status */
    private const INACTIVE_ORDER = 0;
    private const ACTIVE_ORDER = 1;
    
    /*const for order types*/
    private const ON_WAY = 1;
    private const RETUNED = 2;
    
    public $productName;
    public $productPrice;
    public $productCount;
    public $productDescription;
  
    
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
    
    public function prepareUserData()
    {
         if(!$this->validate())
                 return null;
            
        $userData = [
            'username' => $_POST['Orders']['username'],
            'email' => $_POST['Orders']['email'],
             
        ];

        return $userData;
    }
    
    public static function cancel($id)
    {
        $order = self::findOne($id);
        $order->status = self::INACTIVE_ORDER;
        $order->save();
       
    }
    
 
    public static function prepareOrder()
    {
        $cart = Product::getCart();
 
        $productList = Product::find()->all();
   
        foreach($cart as $item){
            $orderItem['name'] = $item->name; 
             $orderItem['count'] = $_SESSION['cart'][$item->id]['count']; 
              $totalPrice +=  $item->price*$orderItem['count'];
               $orderBucket[] = $orderItem ;
   
            unset($orderItem);
        }
   
        $orderBucket = json_encode($orderBucket);
             
        return ['productList' => $orderBucket , 'totalPrice' => $totalPrice];
    }
    
    public function  prepareDeal()
    {
        return false;
    }
    
    public function newOrder()
    {
        $orderBucket = $this->prepareOrder();
        $userData = $this->prepareUserData();
        $point = Pointofsale::findOne($_SESSION['select'][0]);
         
        $this->product_list = $orderBucket['productList'];
        $this->total_price = $orderBucket['totalPrice'];
        $this->status = self::ACTIVE_ORDER;
        $this->order_type = self::ON_WAY;
        $this->from_info = $point->name;
        $this->to_info_name  = $userData['username'];
        $this->to_info_email  = $userData['email'];
        $this->save();
        
        Product::clearCart();
    }
    
    public function getTracking()
    {
        $userData = $this->prepareUserData();
        
        $orders = self::find()
                ->where(['to_info_name' => $userData['username'], 
                         'to_info_email' => $userData['email'], 
                         'status' => self::ACTIVE_ORDER])
                ->select('product_list , order_id , status , total_price')
                ->all();
    
        return $orders;
    }
    
   
}
