ActionColumn Integration Yii2-admin
===================================
Hak Akeses For ActionColumn by rule from yii2-admin

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
php composer.phar require ilhammalik/yii2-action-filter "*"
```

or add

```
"ilhammalik/yii2-action-filter": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

create defendensi injection \common\config\bootsrap.php

Add This under set alias
```
Yii::$container->set('yii\grid\ActionColumn', [
   'class' => 'common\components\ActionColumn',
   'visibleCallback' => function($name) {
       return \Yii::$app->user->can($name);
   },
]);
```

or spesifik user by id

```
Yii::$container->set('yii\grid\ActionColumn', [
   'class' => 'common\components\ActionColumn',
   'visibleCallback' => function($name) {
       return \Yii::$app->user->can(\Yii::$app->controller->id . '/' . $name);
   },
]);
```
