<?php

namespace App\MaruValidationSet\Rule\Example;

use App\MaruValidationSet\Logic\MaruLogic;
use App\MaruValidationSet\MaruResult;
use App\MaruValidationSet\Rule\MaruRule;
use App\MaruValidationSet\SampleModel\SampleModel;

class CheckSampleLogicRule extends MaruRule{

    public function __construct()
    {
    }

    public function checkRule() : void
    {

        $logic = app()->make('SampleLogic');

        if($logic->checkLogic())
        {
            $this->result = false;
            $this->setMessage("ブラックリストに登録されているため操作できません。");
        }
    }
}