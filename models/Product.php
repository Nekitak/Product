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
        Yii::$app->cart->add($id);
    }
    
    public static function del($id)
    {
        Yii::$app->cart->del($id);         
    }
    
    public static function getCart()
    {       
        return Yii::$app->cart->getCart();
    }
    
    public static function clearCart()  
    {
        (Yii::$app->session)->remove('cart');
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
                ->where(['location_id' => $_SESSION['select']])
                ->all();
        
        return ['products' => $products , 'pagination' => $pagination];
    }
    
    public function ActiveProduct()
    {
        $products = Self::find()
                    ->where(['location_id' => $_SESSION['select'] , 'count' > 0])
                    ->all();
 
        return $products;
    }
    
    
}
