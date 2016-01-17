<?php $this->pageTitle='Активация'; ?>

<?php if ($result): ?>
<div id="success">
<p>Активация успешно пройдена!</p>
<?php echo CHtml::link('Можете войти',array('login'));?>
</div>
<?php else: ?>
<div class="errorSummary"><p>Введен не верный код активации!</p></div>
<?php endif; ?>