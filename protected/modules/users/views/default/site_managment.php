<?php $this->pageTitle='Управление сайтом'; ?>

<ul id = "modulelist">
    <?php foreach($modules as $id=>$module):  ?>
    <li id="item_<?php echo $id ?>">
        <h2><?php echo $module['title'] ?></h2>
        <ul id="<?php echo $id ?>_links">
            <?php foreach($module['links'] as $label=>$url): ?>
            <li><?php echo CHtml::link($label,$url) ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
    <?php endforeach; ?>
</ul>