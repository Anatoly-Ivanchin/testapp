<?php
return array(
    'guest' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Гость',
    ),
    'user' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Пользователь',
        'children' => array(
            'guest', 
        ),
    ),
    'personal' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Сотрудник',
        'children' => array(
            'user',         
        ),
    ),
	'manager' => array(
			'type' => CAuthItem::TYPE_ROLE,
			'description' => 'Управляющий',
			'children' => array(
					'personal',
			),
	),
    'admin' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Администратор',
        'children' => array(
            'manager',
        ),
    ),
    'owner' => array(
        'type' => CAuthItem::TYPE_ROLE,
        'description' => 'Владелец',
        'bizRule'=>'return Yii::app()->user->id===$params["userId"];',
        'children' => array(
            'user',
        ),
    ),
);