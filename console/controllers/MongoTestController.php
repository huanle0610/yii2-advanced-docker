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

    public function actionComplexQuery()
    {

        $query = new Query();
        $query->from('inventory')
            ->andWhere(['status' => 'D'])
            ->andWhere(['<', 'size.h', 15])
            ->limit(10);
// execute the query
        $rows = $query->all();

        var_dump($rows);

        $query = new Query();
        $query->from('inventory')
            ->andWhere(['tags' => ['blank', 'red']])
            ->limit(10);
// execute the query
        $rows = $query->all();

        var_dump($rows);
    }

    public function actionInsertAll()
    {
        $data = <<<EOF
[
   { item: "journal", qty: 25, size: { h: 14, w: 21, uom: "cm" }, status: "A" },
   { item: "notebook", qty: 50, size: { h: 8.5, w: 11, uom: "in" }, status: "A" },
   { item: "paper", qty: 100, size: { h: 8.5, w: 11, uom: "in" }, status: "D" },
   { item: "planner", qty: 75, size: { h: 22.85, w: 30, uom: "cm" }, status: "D" },
   { item: "postcard", qty: 45, size: { h: 10, w: 15.25, uom: "cm" }, status: "A" }
]
EOF;
        var_dump(json_decode(trim($data)));
    }
}