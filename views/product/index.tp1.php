<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use app\models\Product;
?>
<h1>Products</h1>

<div class="row">
    <?php foreach($products as $product):?>
        <div class="col-sm-3 product_block">
            <?= Html::img('../../web/images/vRbLKMSfs5o.jpg', ['alt' => 'Наш логотип' , 'style' => 'width:100%;']) ?>
            <?=Html::tag('h4',Html::encode("{$product->name}") , ['class' => 'block1']);?> 
            <i class="block1">цена:<?= Html::encode("{$product->price}")?></i><br/>
            <?= Html::beginForm(['product/add', 'id' => $product['id']], 'post', ['enctype' => 'multipart/form-data']); ?>
                <?= Html::input('hidden', 'id', $product['id'] , ['class' => 'btn btn-info block1']) ?>
                <?= Html::input('submit', 'submit','купить', ['class' => 'btn btn-info block1']) ?>
            <?= Html::endForm() ?>
                          
        </div>
    <?php endforeach; ?>
</div>
 

<?= LinkPager::widget(['pagination' => $pagination]) ?>
 