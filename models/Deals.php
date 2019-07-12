<?php


namespace app\models;

/**
 * Description of deals
 *
 * @author nekitak46
 */
class Deals extends appModel
{
    public function newDeal()
    {
        $userData = $this->prepareUserData();
       
        $this->name = $userData['name'];
        $this->email = $userData['email'];
        
        $this->product_name = $_POST['product_name'];
        $this->product_price = $_POST['product_price'];
        $this->product_description = $_POST['product_description'];
        $this->product_count = $_POST['product_count'];
        $this->status = 1;
        
        $this->save();
    }
}
