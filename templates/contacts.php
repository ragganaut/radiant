<?$this->include('header')?>
    <h1><?=$h1?></h1>
    <?$this->includeComponent('\Radiant\Controllers\PersonWidget::getCard', [
        'name' => 'Барсик'
    ])?>
<?$this->include('footer')?>
