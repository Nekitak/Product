<?php
 
namespace app\models;

use yii\db\ActiveRecord;
use Yii;
/**
 * Description of AppModel
 *
 * @author nekitak46
 */
class AppModel extends ActiveRecord
{
    protected $username;
    protected $email;   
    
    
    public  function prepareUserData()
    {
        $this->username = $_POST['name'];
        $this->email = $_POST['email'];
        
        $userData = [ 'name' => $this->username ,
                       'email' => $this->email ,];
 
        return $userData;
    }
    
    public function actionPoint()
    { 
        $_SESSION['select'] = [$_POST['select']];
       
    }
}
