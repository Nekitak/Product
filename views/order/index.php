<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Check active orders';

?>

<div class="container">
    <div class="col-sm-3">
        
        <div class="panel panel-default">
            <div class="  panel-heading"> 
                <p class="panel-title"><?= Html::encode($this->title) ?></p>
            </div>
        </div>
        
        <?php $form = ActiveForm::begin(['action' => 'tracking']); ?> 

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
        <?= $form->field($model, 'email')->textInput(['type' => 'email']) ?>

        <div class="form-group">
            <?= Html::submitButton('Активные заказы', ['class' => 'btn btn-primary', 'name' => 'active_order-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>  