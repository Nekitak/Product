<?php
 
namespace app\models;

use yii\db\ActiveRecord;
 
/**
 * Description of AppModel
 *
 * @author nekitak46
 */
class AppModel extends ActiveRecord 
{
    public $username;
    public $email;   
    public $Phone;
    
    
    public function actionPoint()
    { 
        $_SESSION['select'] = [$_POST['select']]; 
    }
}
