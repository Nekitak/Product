<?php

use yii\helpers\Url;

?>

<h1>Cart</h1>

<div class="row" >
    <?php if($items): ?>
        <div class="col-sm-6" >
            <table>  
                <tr>
                    <th class="table">Название</th>
                    <th class="table">Цена</th>
                    <th class="table">Количество</th>
                </tr>

                    <?php foreach($items as $item): ?>
                        <tr>   
                           <td class="table"> <h4 class="block1"><?= $item->name ?> </h4> </td>
                           <td class="table"> <i class="block1"><?= $item->price ?></i> </td>
                           <td class="table"> <p class="block1"><?= $count[$item->id] ?></p></td>
                           <td class="table"> <a class="block1" href="<?= Url::to(['product/del', 'id' => $item->id]); ?>"><button class="btn">Удалить</button></a> </td>
                        </tr>
                    <?php endforeach; ?>

            </table>
        </div>

        <div class="col-sm-2">
            <a class="block2" href="<?= Url::to(['order/buy']); ?>" ><button class="btn">Оформить заказ</button></a> 
        </div>
    <?php endif; ?>
</div>
   