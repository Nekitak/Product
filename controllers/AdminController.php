<?php

namespace app\controllers;

 
use app\models\Product;
use app\models\PointOfSale;

/**
 * Description of AdminController
 *
 * @author nekitak46
 */


class AdminController extends AppController
{
    
    public function actionPoint()
    {   
         $model = (new Product)->actionPoint();
         
         $this->redirect('audit');
    }
    
    public function actionAudit()
    {
         
        $products = (new Product)->ActiveProduct();
        $pointOfSale = Pointofsale::find()->all();
         
        return $this->render('audit.twig' , [
                    'products' => $products,
                    'pointOfSale' => $pointOfSale,
        ]);
    }
}
