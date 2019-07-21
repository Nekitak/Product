<?php

use yii\helpers\Url;

?>


<div class="row" >
    <div class="col-sm-8" >
        <table>  

            <tr>
                <th class="table">Статус</th>
                <th class="table">Общая цена</th>
            </tr>

               <?php foreach($orders as $order): ?>

                    <tr>   
                       <td class="table"><h4 class="block1"><?= $order->status?></h4> </td>
                       <td class="table"><p class="block1"><?= $order->total_price ?></p></td>
                       <td class="table"><a class="block1" href="<?= Url::to(['order/cancel', 'id' => $order->order_id]); ?>"><button class="btn">Отменить заказа</button></a> </td>
                    </tr>

                <?php endforeach; ?>

        </table>
    </div>
    
    <div class="col-sm-2">
        <a class="block2" href="<?= Url::to(['order/index']); ?>" ><button class="btn">Назад</button></a> 
    </div>
    
</div>