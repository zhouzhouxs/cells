<?php

namespace Wechat\Controller;

class SiteController extends CellsController
{

    public function index()
    {
        $M = D('Pretree');
        $node = [
            'uid' => 1
        ];
        var_dump($M->addNode(0, $node));
        $node['uid'] = 2;
        var_dump($M->addNode(0, $node));
        $node['uid'] = 3;
        var_dump($M->addNode(1, $node));

    }

    public function test()
    {
        echo 'b';
    }

}