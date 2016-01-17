<div id="modelstabs">
	<ul id = "modelslist">
	    <?php foreach($models as $id=>$model):  ?>
	    <li id="item_<?php echo $id ?>">
	        <h2><?php echo CHtml::link($model['title'],$model['url']) ?></h2>
	    </li>
	    <?php endforeach; ?>
	</ul>
	<div id="modelstabscontent"></div>
	<div class="clear"></div>
</div>
