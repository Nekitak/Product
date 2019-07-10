<?php

namespace app\models;

 use yii;
/**
 * Description of Product
 *
 * @author nekitak46
 */

use yii\data\Pagination;
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
    
    public static function getProuctList()
    {
        $query = Product::find();
        
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $query->count(),
        ]);
        
        $products = $query->orderBy('id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->where('location_id = :id', [':id' => $_SESSION['select']])
                ->all();
        
        return [$products , $pagination];
    }
}
