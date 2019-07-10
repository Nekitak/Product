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
    protected $uesrname;
    protected $email;
    protected $mobail_phone;
    
    
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
    
    public  function prepareUserData()
    {
        $this->uesrname = $_POST['name'];
        $this->email = $_POST['email'];
        $this->mobail_phone = $_POST['mobail_phone'];
        
        $userData = [$this->uesrname ,  $this->email , $this->mobail_phone];
        $userData = json_encode($userData);
        
        return $userData;
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
        $this->to_info  = $userData;
        $this->save();
    }
    
    
}
