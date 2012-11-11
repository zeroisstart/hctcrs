<?php
$this->breadcrumbs = array (
        'Top'
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>
<p>
    <?php
    $string = 'this is test';
    $int = 100;
    $sary = array (
            'a',
            'b',
            'c'
    );
    $saryr = array (
            'c',
            'b',
            'a'
    );
    $iary = array (
            1,
            2,
            3
    );
    $iaryr = array (
            3,
            2,
            1
    );
    eval($code)
    ?>
</p>

<?php $this -> renderPartial('views._helper.Form.areaSubmit',array('text'=>$code)) ?>