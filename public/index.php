<?php

use App\Model\Model;

include "../vendor/autoload.php";

$model = new Model();

$res = $model->checkUser('Yarick', '4455');
print_r($res);