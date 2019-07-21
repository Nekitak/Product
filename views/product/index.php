<?php

 
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

$this->title = 'Products';

?>

<div class="panel panel-default">
    <div class="  panel-heading"> 
        <h1 class="panel-title"><?= Html::encode($this->title) ?></h1>
    </div>
</div>

<?php $form = ActiveForm::begin(['action' => 'point']); ?>
    <div class="col-sm-2">
        <select class="form-control" name="select" > 
                <?php foreach($pointOfSale as $point): ?>
                    <option value="<?=$point->id?>">точка:<?=$point->name?></option>
                <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
       <input type="submit" value="Выбрать" class="btn btn-primary" />
    </div>
<?php ActiveForm::end(); ?>
 


<div class="row">
    <?php foreach($products as $product): ?>    
            <div class="col-sm-3 product_block">
                <img class="image" src="../../web/images/vRbLKMSfs5o.jpg">  
                <h4 class="block1"><a href="<?= Url::to(['product/info', 'id' => $product->id]); ?>"><?= $product->name ?></a></h4> 
                <i class="block1">цена:<?= $product->price ?></i><br/>
                <a class="block1" href="<?= Url::to(['product/add', 'id' => $product->id]); ?>"><button class="btn">В корзину</button></a>         
            </div>
    <?php endforeach; ?>     
</div>
 

 
 