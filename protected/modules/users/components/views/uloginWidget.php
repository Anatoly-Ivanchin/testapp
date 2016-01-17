<?php if (Yii::app()->user->isGuest || $this->showButtunsAlways): ?>

<div id="uLogin_<?php echo $this->getId();?>" class="uLogin" 
x-ulogin-params="display=<?php echo $this->display ?>;fields=<?php echo implode(',', $this->fields); ?>;optional=<?php echo implode(',', $this->optional);?>;providers=<?php echo implode(',', $this->providers); ?>;hidden=<?php echo implode(',', $this->hidden); ?>;redirect_uri<?php if(!$this->callback) echo '='.urlencode($redirect);else echo ";callback=".$this->callback; ?>;"></div>

<?php else: ?>
    <?
    $anchor = 'Выйти ('.Yii::app()->user->getName().')';
    echo CHtml::link($anchor, array($this->actionLogout));
    ?>
<?php endif ?>