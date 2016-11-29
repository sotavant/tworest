<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Districts */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Districts'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="districts-view">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'city',
                'value' => Html::a($model->city->name, Url::toRoute(['admin/cities/view', 'id' => $model->city_id])),
                'format' => 'html'
            ],
            [
                'attribute' => 'image',
                'format' => 'image',
                'value' => \Yii::getAlias('@upload/' . $model->image), ['class' => 'img-thumbnail', 'alt' => $model->name],
                'format' => ['image']
            ],
            'city_id',
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ])?>
</div>
