<?php
$this->breadcrumbs=array(
	'Barrios'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Barrio','url'=>array('index')),
	array('label'=>'Create Barrio','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('barrio-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Barrios</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button btn')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->


<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'barrio-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'rowCssClassExpression' => '
        ( $row%2 ? $this->rowCssClass[1] : $this->rowCssClass[0] ) .
        ( $data->nombre ? null : " disabled" )
    ',
    'columns'=>array(
        'idbarrio',
		'nombre',
		'created_date',
		'modified_date',
		'created_by',
		'modified_by',
        array(
            'name' => 'nombre',
            'value' => '$data->nombre',
        ),
        array(
            'class'=>'CButtonColumn',
            'header' => Yii::t( 'app', 'Tools' ),
        ),
    ),
));
?>