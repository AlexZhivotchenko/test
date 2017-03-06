<?php foreach ($items as $item): ?>
    <h1><?php echo $item->name; ?></h1>
    <div><?php echo $item->text; ?></div>
<?php endforeach; ?>