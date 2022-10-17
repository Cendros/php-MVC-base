<h1>Items : </h1>
<ul>
    <?php if(isset($content['data'])) { ?>
        <?php foreach($content['data'] as $item) { ?>
            <li><?php echo $item ?></li>
        <?php } ?>
    <?php } ?>
</ul>