 <?php
 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Deal';

 ?>

<div class="container">
    <div class="col-sm-3">
        
        <div class="panel panel-default">
            <div class="  panel-heading"> 
                <p class="panel-title"><?= Html::encode($this->title) ?></p>
            </div>
        </div>
        
        <?php $form = ActiveForm::begin(['id' => 'form-new-deal' , 'action' => 'create-new-deal']); ?> 

        <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                
        <?= $form->field($model, 'email') ?>

        <?= $form->field($model, 'productName') ?>
        
        <?= $form->field($model, 'productPrice') ?>
        
        <?= $form->field($model, 'productCount') ?>
        
        <?= $form->field($model, 'productDescription') ?>

        <div class="form-group">
            <?= Html::submitButton('Оформить заказ', ['class' => 'btn btn-primary', 'name' => 'active_order-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>

 


    </div>
</div>