<?php

namespace app\controllers;

use app\models\Product;
use app\models\Pointofsale;
 
use yii;

/**
 * Description of ProductController
 *
 * @author nekitak46
 */
class ProductController extends AppController {

    public function actionIndex() {
        
        //return all active pointOfSale
        $pointOfSale = Pointofsale::find()->all();
        
        //return productList and pagination
        $products = Product::getProuctList();
        
        
        return $this->render('index.twig', [
                    'products' => $products[0],
                    'pagination' => $products[1],
                    'pointOfSale' => $pointOfSale,
        ]);
    }
    
    public function actionPoint()
    { 
        $model = (new Product)->actionPoint();
      
        $this->redirect('index');  
    }
    public function actionAdd($id)
    {
        $id = intval($id);
        Product::add($id);
        $this->redirect('index');  
    }
    
    public function actionDel($id)
    {
        $id = intval($id);
        Product::del($id);
        $this->redirect('cart');  
    }
    
    public function actionInfo($id)
    {
        $id = intval($id);
        $product = Product::findOne($id);
        return $this->render('info.twig', ['product' => $product,]);
    }
    
    public function actionCart()
    {
        $items = Product::getCart();
        
        foreach($items as $item){
           $count[$item->id] = $_SESSION['cart'][$item->id]['count'];
        }
        
        return $this->render('cart.twig' , ['cart' => $items , 'count' => $count]);
    }

}
