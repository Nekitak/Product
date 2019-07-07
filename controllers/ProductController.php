<?php

 
namespace app\controllers;
 
use app\models\Product;
use yii\data\Pagination;


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
        
        return $this->render('index', [
            'products' => $products,
            'pagination' => $pagination,
            'session' , $session,
            
           
        ]);
    }
    
    public function actionAdd($id)
    {
        
        return $this->redirect(['index']);
             
    }
}
