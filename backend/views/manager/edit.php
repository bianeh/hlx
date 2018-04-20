<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
//$this->title = '编辑代销商信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title"><a href="/manager/index">账号管理</a>>>编辑代销商信息</div>
<div class="site-login">
    
    <h1><?= Html::encode($this->title) ?></h1>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
      ]); 
    ?>
        <?= $form->field($model, 'username')->textInput(['value'=>$managerinfo['username']]) ?>
        <?= $form->field($model, 'password')->passwordInput(['value'=>$managerinfo['password']]) ?>
        <?= $form->field($model, 'tuiguanghao')->textInput(['value'=>$managerinfo['tuiguanghao']]) ?>
        <?= $form->field($model,'discount')->textInput(['value'=>$managerinfo['discount']]) ?>
        <?= $form->field($model,'wechat')->textInput(['value'=>$managerinfo['discount']]) ?>
        <?= $form->field($model,'cardnumber')->textInput(['value'=>$managerinfo['cardnumber']]) ?>
        <?= $form->field($model,'realname')->textInput(['value'=>$managerinfo['realname']]) ?>
        <?= $form->field($model,'cardinfo')->textInput(['value'=>$managerinfo['cardinfo']]) ?>
        <?= $form->field($model,'phone')->textInput(['value'=>$managerinfo['phone']]) ?>
        <?= $form->field($model,'remark')->textInput(['value'=>$managerinfo['remark']]) ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('编辑', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
