<?php
namespace common\components;
use yii\helpers\Html;

class ActionColumn extends \yii\grid\ActionColumn
{
  
    public $visibleCallback;

    protected function renderDataCellContent($model, $key, $index)
    {
        return preg_replace_callback('/\\{([\w\-\/]+)\\}/', function ($matches) use ($model, $key, $index) {
            $name = $matches[1];
            if (isset($this->buttons[$name]) && ($this->visibleCallback === null || call_user_func($this->visibleCallback, $name, $model, $key, $index) !== false)) {
                $url = $this->createUrl($name, $model, $key, $index);
                if ($this->buttons[$name] instanceof \Closure) {
                    return call_user_func($this->buttons[$name], $url, $model, $key);
                } else {
                    $button = $this->buttons[$name];
                    if (is_string($button)) {
                        $label = $button;
                        $button = [];
                    } else {
                        $label = isset($button['label']) ? $button['label'] : $name;
                        unset($button['label']);
                    }
                    return Html::a($label, $url, $button);
                }
            } else {
                return '';
            }
        }, $this->template);
    }
}