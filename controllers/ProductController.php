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
 

class ProductController extends AppController
{
    public function actionIndex()
    {
        $query = Product::find();
        
         
        
        $pagination = new Pagination([
            'defaultPageSize' => 8,
            'totalCount' => $query->count(),
        ]);
        
        $products = $query->orderBy('id')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();
        
        return $this->render('index.twig',  [
            'products' => $products,
            'pagination' => $pagination,  
        ]);
    }
    
    public function actionAdd($id)
    {   
          
        
       
         $_SESSION['test'];

         $_SESSION['test'] = 2;
         echo $_SESSION['test'];
//        
//           $cart = $session->get($id);
//       
//       
//        echo '<pre>';
//        print_r($cart);
//        echo '</pre>';
       // $this->redirect('index');  
    }
}
