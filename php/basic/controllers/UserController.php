<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Country;
use app\models\User;

class UserController extends Controller
{
    public function actionIndex()
    {



        $query = User::find()
                ->where(['id'=>1])
                // ->asArray()
                ->one();

        // $user_count = $query->count();
        echo  '<pre>';
        // $res = $query;

        print_r($query);
        // print_r($query->name);
        die;


        // $pagination = new Pagination([
        //     'defaultPageSize' => 5,
        //     'totalCount' => $query->count(),
        // ]);

        // $countries = $query->orderBy('name')
        //     ->offset($pagination->offset)
        //     ->limit($pagination->limit)
        //     ->all();

        // return $this->render('index', [
        //     'countries' => $countries,
        //     'pagination' => $pagination,
        // ]);
    }

    public function actionCreate()
    {
        $user = new User();
        $user->name = 'yii';
        $user->email = 'yii@163.com'; 
        $user->save();
    }


    public function actionUpdate($id=1,$name = 'stark')
    {
        $user = User::findOne($id);
        $user->name = $name;
        $user->email = 'yii@163.com'; 
        $user->save();
    }

}