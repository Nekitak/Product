<?php

namespace app\controllers;

use app\models\Product;
use yii\data\Pagination;
use yii;

/**
 * Description of ProductController
 *
 * @author nekitak46
 */
class ProductController extends AppController {

    public function actionIndex() {
        $query = Product::find();

        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $query->count(),
        ]);

        $products = $query->orderBy('id')
                ->offset($pagination->offset)
                ->limit($pagination->limit)
                ->all();

        return $this->render('index.twig', [
                    'products' => $products,
                    'pagination' => $pagination,
        ]);
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
