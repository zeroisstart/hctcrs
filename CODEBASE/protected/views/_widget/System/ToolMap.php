<div class="search_bar">
    <form method="POST" class="search_bar_form">
        <input class="search_input" type="text" name="keyword" value="" />
        <input class="search_submit_button" type="submit" value="Search!"/>
    </form>
</div>
<?php foreach ($controllerRoutes as $cName => $routes): ?>
<div class="tool_map">
    <p class="map_title"><?php echo $cName; ?><p>
    <?php
    foreach ( $routes as $route ) {
        echo Html::link ( $route, Yii::app ()->createUrl ( $route ) ,array('target'=>'_blank'));
    }
    ?>
</div>
<?php endforeach;?>