<?php

namespace App\MaruValidationSet\Rule\Example;

use App\MaruValidationSet\MaruResult;
use App\MaruValidationSet\Rule\MaruRule;
use App\MaruValidationSet\SampleModel\SampleModel;

class CheckNameRule extends MaruRule{

    private SampleModel $model;

    public function __construct(SampleModel $model)
    {
        $this->model = $model;
    }

    public function checkRule() : void
    {
        if($this->model->isMisaka())
        {
            $this->result = false;
            $this->setMessage("その名前は利用できません。");
        }
    }
}