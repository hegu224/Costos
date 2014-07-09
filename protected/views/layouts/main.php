<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />

    
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <?php Yii::app()->bootstrap->register(); ?>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/styles.css" />
</head>

<body>

        <!-- Esto es el navBar -->
  <?php $this->widget('bootstrap.widgets.TbNavbar', array(
    'htmlOptions' => array('class' => 'navbar-default'),
    'brand'=>'InmuebleWeb',
    'brandUrl'=>'#',
    'fluid' => true,
    'brandOptions' => array('class' => 'navbar-brand'),
    'collapse'=>true, // requires bootstrap-responsive.css    
    'items'=>array(

    '<form class="navbar-form navbar-left">
      <input type="text" id="buscador" class="form-control" placeholder="Buscar Propiedades">
      <input type="submit" class="btn btn-default" id="btnBuscar" onclick="busqueda()" value="Buscar">
     </form>',
    array(
          'class'=>'bootstrap.widgets.TbMenu',
          'htmlOptions'=>array('class'=>'nav navbar-nav navbar-right'),
          'items'=>array(
              array('label'=>'Login', 'url'=>array('/site/login'),'visible'=>Yii::app()->user->isGuest),
                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)),
            
        ),
    ),

)); ?>

    

    <div class="container" id="contLayout">
        <div class="row">
            <div class="col-md-2">
                <?php $this->widget('bootstrap.widgets.TbMenu', array(
                    'type'=>'list', // '', 'tabs', 'pills' (or 'list')
                    'stacked'=>false, // whether this is a stacked menu
                    'items'=>array(
                        array('label'=>'Home', 'url'=>array('/site/index')),
                        array('label'=>'Destacado', 'url'=>array('/destacado/admin'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Propiedad', 'url'=>array('/propiedad/admin'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Empleado', 'url'=>array('/empleado/admin'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Cliente', 'url'=>array('/cliente/admin'), 'visible'=>!Yii::app()->user->isGuest),
                        array('label'=>'Visitas', 'url'=>array('/visitas/admin'), 'visible'=>!Yii::app()->authmanager->checkAccess('administrativo',Yii::app()->user->id)),
                        array('label'=>'Contact', 'url'=>array('/site/contact')),

                        // array('label'=>'Manage', 'url'=>array('/propiedad/admin')),
                    ),
                )); ?>
            </div>
            <div class="col-md-10">
                <div class="mainCont">
                    <?php echo $content; ?>
                </div><!-- carousel -->
            </div><!-- col-md-6 -->
        </div><!-- row -->

    </div><!-- container -->
        
    <div class="navbar navbar-default navbar-fixed-bottom"><!--Esto es el footer-->
        <center> <p style="margin-top: 8px;">CopyRight &copy; 2013 <a style="color: white" href="#">inmuebleweb.com</p> </center>
    </div>

    <script type="text/javascript">
        var x = $(document);
        x.ready(function(){
            
        });
    </script>
</body>
</html>