<?php

$this->title = 'Корзина товаров';
$this->params['breadcrumbs'][] = ['label' => 'Главная', 'url' => '/'];
$this->params['breadcrumbs'][] = $this->title;

?>

<h1>Ваша корзина товаров</h1>

<?= maxcom\cart\widgets\CartTableWidget::widget() ?>