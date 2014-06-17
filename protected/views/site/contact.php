<?php
$this->pageTitle=Yii::app()->name . ' - Свяжитесь с нами';
$this->breadcrumbs=array(
	'Контакты',
);
?>
<style>
td {text-decoration:none; color: #981422; font-weight:bold;}
td:hover {color: #912669}
</style>

<h1>Свяжитесь с нами</h1>
<table>
<tr><td>Руководитель проекта Женжуров Евгений Анатольевич<td><td>тел. 8-951-459-98-27, 24-95-59<td></tr>
<tr><td>Ведущий инженер проекта Кунакбаев Вадим Раилевич, кандидат технических наук, специалист в области СПО и Ubuntu Linux<td>
<td>тел. 8-906-871-53-18-----<td></tr>
</table>

<?php if(Yii::app()->user->hasFlash('contact')): ?>

<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('contact'); ?>
</div>

<?php else: ?>

<p><br>
Если у Вас есть вопросы по работе в Ubuntu или другом СПО, пожалуйста, заполните форму для связи с нами. Спасибо.
</p>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'contact-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note">Поля со <span class="required">*</span> обязательны для заполнения</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'Имя <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Тема сообщения <span class="required">*</span>'); ?>
		<?php echo $form->textField($model,'subject',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'subject'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Вопрос <span class="required">*</span>'); ?>
		<?php echo $form->textArea($model,'body',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'body'); ?>
	</div>

	<?php if(CCaptcha::checkRequirements()): ?>
	<div class="row">
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		<div>
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textField($model,'verifyCode'); ?>
		</div>
		<div class="hint">Пожалуйста, введите символы как они отображены на картинке выше.
		<br/>Символы можно вводить в любом регистре.</div>
		<?php echo $form->error($model,'verifyCode'); ?>
	</div>
	<?php endif; ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Отправить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>
