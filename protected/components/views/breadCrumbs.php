<ul id="breadcrumbs">
	<?php foreach($pages as $title=>$link): ?>
		<li class="item"><?php echo CHtml::link($title, $link);?></li>
		<li class="splitter"><?php echo $splitter;?></li>
	<?php endforeach; ?>
	<li><span><?php echo $curentPageTitle; ?></span></li>
</ul>
