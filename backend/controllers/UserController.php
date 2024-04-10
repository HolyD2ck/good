<?php
namespace backend\controllers;

use Yii;
use yii\rest\ActiveController;
use common\models\User;
use Yii\web\Response;

class UserController extends ActiveController
{
  public $modelClass = 'common\models\User';



}