<?php
$this->breadcrumbs = array (
        'Top'
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<?php $this -> renderPartial('views._helper.Form.areaSubmit') ?>