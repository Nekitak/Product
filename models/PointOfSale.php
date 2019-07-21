<?php

namespace app\models;

 

/**
 * Description of PointOfSale
 * 
 *  this table have 2 fields: 
 *   1)id (primary key)
 *   2)name (text)
 * 
 * @author nekitak46
 */


class PointOfSale extends AppModel
{
    //take all point of sale from DB and return array 
    public static function getPointOfSale()
    {
        $pointOfSale = self::find()->all();
        
        return $pointOfSale;
    }
    
}
