<?php
$itemFiles = $item->Files;
$images = array();
$nonImages = array();
foreach ($itemFiles as $itemFile) {
    $mimeType = $itemFile->mime_type;
    if (strpos($mimeType, 'image') !== false) {
        $images[] = $itemFile;
    } else {
        $nonImages[] = $itemFile;
    }
}
$hasImages = (count($images) > 0);
if ($hasImages) {
    queue_css_file('chocolat');
    queue_js_file('modernizr', 'javascripts/vendor');
    queue_js_file('jquery.chocolat.min', 'js');
    queue_js_file('items-show', 'js');
}
echo head(array('title' => metadata('item', array('Dublin Core', 'Title')), 'bodyclass' => 'items show'));
?>



<!-- The following returns all of the files associated with an item. -->
<?php if ($hasImages): ?>
<div id="itemfiles" style="width: 100%; height: 50vh; background: #E0E0E0; margin:auto;"></div>
<div id="itemfiles-nav">
    <?php foreach ($images as $image): ?>
        <a href="<?php echo $image->getWebPath('original'); ?>" class="chocolat-image">
            <?php echo file_image('square_thumbnail', array(), $image); ?>
        </a>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<?php if ((count($nonImages) > 0) && get_theme_option('other_media') == 0): ?>
    <?php foreach ($nonImages as $nonImage): ?>
        <?php echo file_markup($nonImage); ?>
    <?php endforeach; ?>
<?php endif; ?>

<!-- Custom Metadata Order -->
<div class="model"><?php echo metadata($item, array('Item Type Metadata', 'Model')); ?></div>

<div class="metadata">
<div class="element-title"><?php echo __('Description:  '); ?> </div>
<div class="element-text"><?php echo metadata($item, array('Dublin Core', 'Description')); ?></div> 
<div class="metadatatitle"><?php echo __('Digitization Method: '); ?></div>
<div class="metadatatext">	<?php echo metadata($item, array('Item Type Metadata', 'Digitization Method')); ?></div>
<div class="metadatatitle"><?php echo __('Digitizer: '); ?></div>
<div class="metadatatext">	<?php echo metadata($item, array('Item Type Metadata', 'Digitizer')); ?></div>
<div class="metadatatitle"><?php echo __('DOI: '); ?></div>
<div class="metadatatext">	<?php echo metadata($item, array('Item Type Metadata', 'DOI')); ?></div>
<div class="metadatatitle"><?php echo __('View High Resolution Model:  '); ?> </div>
<div class="metadatatext">	<?php echo metadata($item, array('Item Type Metadata', 'View High Resolution Model')); ?></div>
	</div>

<!-- If the item belongs to a collection, the following creates a link to that collection. -->
<?php if (metadata('item', 'Collection Name')): ?>
<div id="collection" class="element">
    <h3><?php echo __('Collection'); ?></h3>
    <div class="element-text"><p><?php echo link_to_collection_for_item(); ?></p></div>
</div>
<?php endif; ?>



<?php if ((count($nonImages) > 0) && get_theme_option('other_media') == 1): ?>
<div id="other-media" class="element">
    <h3>Other Media</h3>
    <?php foreach ($nonImages as $nonImage): ?>
    <div class="element-text"><a href="<?php echo file_display_url($nonImage, 'original'); ?>"><?php echo metadata($nonImage, 'display_title'); ?> - <?php echo $nonImage->mime_type; ?></a></div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<!-- The following prints a citation for this item. 
<div id="item-citation" class="element">
    <h3><?php echo __('Citation'); ?></h3>
    <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
</div>-->


<?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>

<nav>
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>

<?php echo foot(); ?>
