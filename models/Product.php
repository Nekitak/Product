<?php

namespace app\models;

 use yii;
/**
 * Description of Product
 *
 * @author nekitak46
 */


class Product extends AppModel
{
    public static function add($id)
    {
    
       if($count = $_SESSION['cart'][$id]['count']){
            $count++;
            $_SESSION['cart'][$id] = ['count' => $count];
       }else{
           $_SESSION['cart'][$id] = ['count' => 1];
       }
  
    }
    
    public static function del($id)
    {
    
        if($count = $_SESSION['cart'][$id]['count']){ 
            if($count == 1){
                unset($_SESSION['cart'][$id]);
            }else{ 
                $count--;
                $_SESSION['cart'][$id] = ['count' => $count];
            } 
        }
        
        
    }
    
    
    public static function getCart()
    {
        $session = Yii::$app->session;
        $cart = array_keys($session->get('cart'));
        $items = [];
       
        foreach($cart as $key){
             $items[] = Product::findOne($key);      
        }
        
        
        return $items;
    }
}
