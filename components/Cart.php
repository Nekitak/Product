<?php

namespace app\components;

use app\models\Product;
use yii\base\Component;
use yii;
/**
 * Description of Cart
 *
 * @author nekitak46
 */


class Cart extends Component
{
     public  function add($id)
    {
        $id = intval($id); 
        
       if($count = $_SESSION['cart'][$id]['count']){
            $count++;
            $_SESSION['cart'][$id] = ['count' => $count];
       }else{
           $_SESSION['cart'][$id] = ['count' => 1];
       }
  
    }
    
    public  function del($id)
    {
        $id = intval($id);
        
        if($count = $_SESSION['cart'][$id]['count']){ 
            if($count == 1){
                unset($_SESSION['cart'][$id]);
            }else{ 
                $count--;
                $_SESSION['cart'][$id] = ['count' => $count];
            } 
        }
               
    }
    
    public  function getCart()
    {
       
        if($cart = (Yii::$app->session)->get('cart'))
            $cart = @array_keys($cart);
        else
            return false;  
        
        foreach($cart as $key){
             $items[] = Product::findOne($key);      
        }
        
        foreach($items as $item){
           $count[$item->id] = $_SESSION['cart'][$item->id]['count'];
        }
        
        
        return ['items' => $items , 'count' => $count ];
    }

}