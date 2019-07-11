<?php

namespace app\controllers;

use Yii;
use app\models\Product;

/**
 * Description of AdminController
 *
 * @author nekitak46
 */


class AdminController extends AppController
{
    
    public function actionIndex()
    {   
        $products  = Product::find()->all();
        
        echo '<pre>';
        print_r($products);
        
        
//    /    return $this->render('index.twig' , ['products' => $products]);
    }
}
