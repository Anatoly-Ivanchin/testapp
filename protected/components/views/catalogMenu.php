<ul id="menu">
<?php foreach($items as $k=>$item): ?>
<li id="menu_item_<?php echo $k;?>" 
    title="<?php echo $item['tooltip']; ?>" 
    class="<?php echo $this->isActive($item['url'])?"active":""; ?>" >
<?php if($this->isActive($item['url'])):?>
<h1><?php echo CHtml::link($item['title'],$item['url']); ?></h1>
<?php else: ?>
<h2><?php echo CHtml::link($item['title'],$item['url']); ?></h2>
<?php endif;?>
</li>
<?php endforeach; ?>
</ul>
