<?php
$this->breadcrumbs=array(
	'Empleados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Administrar Empleado','url'=>array('admin')),
);
?>

<h1>Crear Empleado</h1>

<?php echo $this->renderPartial('_form', array('modele'=>$modele, 'modelu'=>$modelu)); ?>