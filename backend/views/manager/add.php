<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */
use yii\helpers\Html;  
use yii\bootstrap\ActiveForm; 
//$this->title = '添加管理员';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="title"><a href="/manager/index">账号管理</a>->添加管理员</div>
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
       <div class="form-group"><label class="col-lg-1 control-label">父级代理</label><div class="col-lg-3"><?= $userinfo['username']?></div></div>
        <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder' => '用户名长度至少3位']) ?>
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => '密码长度至少3位']) ?>
        <?= $form->field($model, 'tuiguanghao')->textInput() ?>
        <?= $form->field($model,'discount')->textInput() ?>
        <?= $form->field($model,'wechat')->textInput() ?>
        <?= $form->field($model,'cardnumber')->textInput() ?>
        <?= $form->field($model,'realname')->textInput() ?>
        <?= $form->field($model,'cardinfo')->textarea(['rows'=>3]) ?>
        <?= $form->field($model,'phone')->textInput() ?>
        <?= $form->field($model,'remark')->textarea(['rows'=>3]) ?>
        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('添加', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>