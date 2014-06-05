<?php

/**
 * This is the model class for table "propiedad".
 *
 * The followings are the available columns in table 'propiedad':
 * @property integer $idpropiedad
 * @property integer $canthab
 * @property integer $cantbano
 * @property integer $terreno
 * @property integer $construido
 * @property double $precio
 * @property string $descripcion
 * @property string $ingreso
 * @property string $egreso
 * @property integer $clienteid
 * @property integer $empleadoid
 *
 * The followings are the available model relations:
 * @property Destacado[] $destacados
 * @property Imagen[] $imagens
 * @property Empleado $empleado
 * @property Cliente $cliente
 * @property Visitas[] $visitases
 */
class Propiedad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'propiedad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('canthab, cantbano, precio, descripcion, ingreso, clienteid, empleadoid', 'required'),
			array('canthab, cantbano, terreno, construido, clienteid, empleadoid', 'numerical', 'integerOnly'=>true),
			array('precio', 'numerical'),
			array('descripcion', 'length', 'max'=>150),
			array('egreso', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idpropiedad, canthab, cantbano, terreno, construido, precio, descripcion, ingreso, egreso, clienteid, empleadoid', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'destacados' => array(self::HAS_MANY, 'Destacado', 'idpropiedad'),
			'imagens' => array(self::HAS_MANY, 'Imagen', 'propiedadid'),
			'empleado' => array(self::BELONGS_TO, 'Empleado', 'empleadoid'),
			'cliente' => array(self::BELONGS_TO, 'Cliente', 'clienteid'),
			'visitases' => array(self::HAS_MANY, 'Visitas', 'idpropiedad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpropiedad' => 'Idpropiedad',
			'canthab' => 'Canthab',
			'cantbano' => 'Cantbano',
			'terreno' => 'Terreno',
			'construido' => 'Construido',
			'precio' => 'Precio',
			'descripcion' => 'Descripcion',
			'ingreso' => 'Ingreso',
			'egreso' => 'Egreso',
			'clienteid' => 'Clienteid',
			'empleadoid' => 'Empleadoid',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idpropiedad',$this->idpropiedad);
		$criteria->compare('canthab',$this->canthab);
		$criteria->compare('cantbano',$this->cantbano);
		$criteria->compare('terreno',$this->terreno);
		$criteria->compare('construido',$this->construido);
		$criteria->compare('precio',$this->precio);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('ingreso',$this->ingreso,true);
		$criteria->compare('egreso',$this->egreso,true);
		$criteria->compare('clienteid',$this->clienteid);
		$criteria->compare('empleadoid',$this->empleadoid);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Propiedad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}