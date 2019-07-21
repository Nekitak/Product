 <?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Buy';

?>

<div class="container">
    <div class="col-sm-3">
 
        <div class="panel panel-default">
            <div class="  panel-heading"> 
                <p class="panel-title"><?= Html::encode($this->title) ?></p>
            </div>
        </div>
        
        <?php $form = ActiveForm::begin(['action' => 'new-buy-order']); ?> 

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
        <?= $form->field($model, 'email') ?> 

        <div class="form-group">
            <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary', 'name' => 'active-order-button']) ?>
        </div>

         <?php ActiveForm::end(); ?>

    </div>
</div>