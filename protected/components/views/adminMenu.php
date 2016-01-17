<div id="admin_menu">
<ul id="module_list">
    <?php foreach($modules as $id=>$module):  ?>
    <li id="module_<?php echo $id ?>" class="<?php echo $id==$activeModuleId?'active':''; ?>">
        <span class="slider"><?php echo $module['title'] ?></span>
        <ul id="<?php echo $id ?>_links" style="display: none;">
            <?php foreach($module['links'] as $label=>$url): ?>
            <li><?php echo CHtml::link($label,$url) ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>
</div>