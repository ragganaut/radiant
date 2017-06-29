<?php
$this->add('#^/page-([0-9]+)/$#', '\Radiant\Controllers\PageController::page');
$this->add('/contacts/', '\Radiant\Controllers\PageController::contacts');
