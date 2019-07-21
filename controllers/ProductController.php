<?php

namespace app\controllers;

use app\models\Product;
use app\models\Pointofsale;
 
  
/**
 * Description of ProductController
 *
 * @author nekitak46
 */
class ProductController extends AppController {

    public function actionIndex() {
        
        //return all active pointOfSale
        $pointOfSale = Pointofsale::getPointOfSale();
        
        //return productList and pagination
        $products = Product::getProuctList();
     
      
        return $this->render('index.php',[
                    'products' => $products['products'],
                    'pagination' => $products['pagination'],
                    'pointOfSale' => $pointOfSale,
        ]);
    }
    
     
    public function actionAdd($id)
    {      
        Product::add($id);
        $this->redirect('index');  
    }
    
    public function actionDel($id)
    {        
        Product::del($id);
        $this->redirect('cart');  
    }
    
    public function actionInfo($id)
    {  
        $product = Product::findOne(intval($id));
        return $this->render('info.php', ['product' => $product,]);
    }
    
    public function actionCart()
    {
       $cart = Product::getCart();
 
       return $this->render('cart.php' ,[
                            'items' => $cart['items'],
                            'count' => $cart['count']]);
    }
    
    public function actionPoint()
    {
       $model = (new Product)->actionPoint();
      
       $this->redirect('index');  
       
    }

}
