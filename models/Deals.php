<?php


namespace app\models;

/**
 * Description of deals
 *
 * @author nekitak46
 */
class Deals extends appModel implements DataHandlerInterface
{
    private const INACTIVE_DEAL = 0;
    private const ACTIVE_DEAL = 1;

    
    public function ruels()
    {
         return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
        ];
    }
    
    public function prepareUserData()
    {
         if(!$this->validate())
                 return null;
            
        $userData = [
            'username' => $_POST['Orders']['username'],
            'email' => $_POST['Orders']['email'],
             
        ];

        return $userData;
    } 
    
    public function prepareProductData()
    {
        $productData = [
            'productName' => $_POST['Orders']['productName'],
            'productPrice' => $_POST['Orders']['productPrice'],
            'productDescription' => $_POST['Orders']['productCount'],
            'productCount' => $_POST['Orders']['productDescription'],
        ];
        
        return $productData;
    }
         
    
    public function newDeal()
    {
        $userData = $this->prepareUserData();
        $productData = $this->prepareProductData();
         
     
        $this->name = $userData['username'];
        $this->useremail = $userData['email'];
        
        $this->product_name = $productData['productName'];
        $this->product_price = $productData['productPrice'];
        $this->product_description = $productData['productCount'];
        $this->product_count = $productData['productDescription'];
        $this->status = self::ACTIVE_DEAL;
        
        $this->save();
    }
}
