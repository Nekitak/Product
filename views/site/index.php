<?php 
 
use yii\helpers\Url;

?>
 
 
<section>
    <div class="container action_list">
        <div class="col-sm-2 make_deal">
            <a href="<?= Url::to(['order/new-deal-page']); ?>"><button class="btn make_deal_button">Предложить сделку</button></a>
        </div>
        
        <div class="col-sm-2 make_deal">
            <a href="<?= Url::to(['product/index']); ?>"><button class="btn make_deal_button">Список товаров</button></a>
        </div>
    </div>
</section>
 