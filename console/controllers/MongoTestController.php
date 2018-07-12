<?php
/**
 * Copyright (c) 2018. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
 * Morbi non lorem porttitor neque feugiat blandit. Ut vitae ipsum eget quam lacinia accumsan.
 * Etiam sed turpis ac ipsum condimentum fringilla. Maecenas magna.
 * Proin dapibus sapien vel ante. Aliquam erat volutpat. Pellentesque sagittis ligula eget metus.
 * Vestibulum commodo. Ut rhoncus gravida arcu.
 */

namespace console\controllers;

use yii\console\Controller;
use yii\mongodb\Query;


class MongoTestController extends Controller
{
    public function actionQuery()
    {
        $query = new Query();
// compose the query
        $query->select(['name'])
            ->from('books')
            ->limit(10);
// execute the query
        $rows = $query->all();

        var_dump($rows);


        $query = new Query();
// compose the query
        $query->from('products')
            ->limit(10);
// execute the query
        $rows = $query->all();

        var_dump($rows);
    }
}