<?php

namespace Common\Model;

use Think\Model;

class PretreeModel extends Model
{
    /**
     * 添加一个节点
     * @param $pid
     * @param array $node
     * @return bool
     */
    public function addNode($pid, $node = [])
    {
        //查找节点的信息
        $parent = $this->where(['uid' => $pid])->find();

        $node['l_leaf'] = $parent['r_leaf'];
        $node['r_leaf'] = $parent['r_leaf'] + 1;
        $node['level'] = $parent['level'] + 1;
        $node['pid'] = $pid;

        if ($this->where(['l_leaf' => ['egt', $parent['r_leaf']]])->setInc('l_leaf', 2) === false) return false;
        if ($this->where(['r_leaf' => ['egt', $parent['r_leaf']]])->setInc('r_leaf', 2) === false) return false;

        if (!$this->add($node)) return false;

        return true;
    }
}