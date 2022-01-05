<?php

namespace App\MaruValidationSet\Rule\Example;

use App\MaruValidationSet\MaruResult;
use App\MaruValidationSet\Rule\MaruRule;
use App\MaruValidationSet\SampleModel\SampleModel;

class CheckOverPointRule extends MaruRule{

    private SampleModel $model;

    public function __construct(SampleModel $model)
    {
        $this->model = $model;
    }

    public function checkRule() : void
    {
        if($this->model->overPoint())
        {
            $this->result = false;
            $this->setMessage("ポイントが100以上になってはいけません。");
        }
    }
}