<div id="catalog_selected_items">
	<?php foreach ($dataSet as $i=>$row): ?>
	<div id="csi_<?php echo $row->id; ?>" class="catalog_item<?php echo($i+1)%3==0?' rowend':''; ?> ">
		<div class="catalog_picture"><?php echo CHtml::link(CHtml::image($row->getSingleImageUrl('small')),$row->fullUrl); ?></div>
	</div>
	<?php endforeach;?>
	<div class="clear"></div>
</div>
