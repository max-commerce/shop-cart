<?php

$this->title = 'Корзина товаров';
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => '/'];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Ваша корзина товаров</h1>

<div class="panel panel-default">
	<?= maxcom\cart\widgets\CartTableWidget::widget() ?>
</div>

<div class="row">
	<div class="col-md-6">
		<div style="font-size: 22px; padding: 5px 18px;">
			Итого <?= number_format(\Yii::$app->cart->total, 2, '.', ' '); ?> руб.
		</div>
	</div>
	<?php if (\Yii::$app->cart->total) : ?>
	<div class="col-md-6 text-right">
		<div style="padding: 5px 0;">
			<a class="btn btn-lg btn-success" href="/catalog">Оформить заказ &rarr;</a>
		</div>
	</div>
	<?php endif; ?>
</div>