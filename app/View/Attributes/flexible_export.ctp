<div class="event index">
    <h2><?php echo __('Flexible Export');?></h2>

<?php
    echo $this->Form->create(false);
    echo $this->Form->input('from', [
        'label' => __('From'),
        'class' => 'datepicker',
        'placeholder' => "YYYY-MM-DD",
        'type' => 'text',
        'stayInLine' => 1,
        'required' => true
    ]);
    echo $this->Form->input('till', [
        'label' => __('Till'),
        'class' => 'datepicker',
        'placeholder' => "YYYY-MM-DD",
        'type' => 'text',
        'stayInLine' => 1
    ]);
    echo '<div class="clear"></div>';
    echo $this->Form->input('type', [
        'label' => __('Format'),
        'class' => 'input',
        'type' => 'select',
        'options' => $types,
        'stayInLine' => 1,
        'required' => true
    ]);
    echo $this->Form->input('attribute', [
        'label' => __('Attribute'),
        'class' => 'input',
        'type' => 'select',
        'multiple' => false,
        'options' => $attributes,
        'stayInLine' => 1,
    ]);
    echo '<div class="clear"></div><br/>';
    echo $this->Form->submit(__('Run query'), array('class' => 'btn btn-primary'));
    echo $this->Form->end();
?>

<?php
    if (!empty($data) && !empty($found)) {
        if ($found['scope'] == 'attributes' && $found['len'] > 0) {
            echo __('Found %s attributes', $found['len']);
        }

        echo sprintf('<div class="hidden" id="rest-response-hidden-container">%s</div>', h($data));
        if (!empty($data)) {
            echo sprintf('<div><button id="download-button" class="btn btn-inverse">%s</button></div>', __('Download'));
        }
    }
?>
</div>

<?php
    echo $this->element('/genericElements/SideMenu/side_menu',
        array('menuList' => 'event-collection', 'menuItem' => 'attributes_flexible_export'));
    echo $this->element('genericElements/assetLoader', array(
        'js' => array(
            'FileSaver',
        ),
        'css' => array()
    ));
?>

<script type="text/javascript">
    $(function() {
    <?php if (!empty($data)): ?>
        $('#download-button').bind('click', function(e) {
            e.preventDefault();
            var download_content = $('#rest-response-hidden-container').text();
            var extension = '<?php echo !empty($fileExtension) ? $fileExtension : ''; ?>';
            var export_type = '<?php echo !empty($fileFormat) ? $fileFormat : ''; ?>';
            var mime = '<?php echo !empty($fileMime) ? $fileMime : ''; ?>';
            var filename = 'flexible-export.' + export_type + '.' + extension;
            var blob = new Blob([download_content], {
                type: mime
            });
            saveAs(blob, filename);
        });
    <?php endif; ?>
        $('#attribute').chosen({
            search_contains: true
        });
    });
</script>
