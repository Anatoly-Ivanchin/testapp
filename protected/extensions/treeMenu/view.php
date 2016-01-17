<?php $nextLevel=$level+1;
      $style='z-index:'.(100+$level).';';
?>
<?php if($level==1): ?>
<div id="tree_menu">
<?php endif;?>

<ul class="level_<?php echo $level; ?>" style="<?php echo $style ?>">
<?php foreach($items as $key=>$item): 
      $itemId='menu_item_l'.$level.'_k'.$key?>
<li id="<?php echo $itemId;?>" onmousemove="showSubMenu('<?php echo $itemId;?>','<?php echo $level; ?>');" >
<?php echo CHtml::link($item['label'],$item['url'],
	$item['active'] ? array('class'=>'active') : array()); ?>
	<?php if(count($item['children'])>0) $this->render('application.extensions.treeMenu.view',array('items'=>$item['children'],'level'=>$nextLevel)); ?>
</li>
<?php endforeach; ?>
</ul>

<?php if($level==1): ?>
<div class="clear"></div>
</div>
<?php endif;?>
