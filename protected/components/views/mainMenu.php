<ul id="menu">
<?php foreach($items as $k=>$item): 
		if(!Yii::app()->user->checkAccess($item['access']))  continue; 
?>
<li id="menu_item_<?php echo $k;?>" 
    title="<?php echo $item['tooltip']; ?>" 
    class="<?php echo $this->isActive($item['url'])?"active":""; ?>" 
    <?php if($item['icon']):?>
        style="background-image: url('/images/menu/<? echo $item['icon']; ?>');"
    <? endif; ?>
>
<?php echo CHtml::link($item['title'],$item['url']); ?>
</li>
<?php endforeach; ?>
</ul>
