<?php


namespace App\MaruValidationSet\Validation;

use App\MaruValidationSet\Logic\SampleLogic;
use App\MaruValidationSet\Rule\Example\CheckNameRule;
use App\MaruValidationSet\Rule\Example\CheckOverPointRule;
use App\MaruValidationSet\Rule\Example\CheckSampleLogicRule;
use App\MaruValidationSet\SampleModel\SampleModel;

class SampleValidation extends MaruValidation{

    private SampleModel $model;

    // コンストラクタで必要なオブジェクトを受取っておく
    public function __construct(SampleModel $model)
    {
        $this->model = $model;
        $this->init();
    }

    // ルールを設定する
    public function init()
    {
        $this->addRules(
            new CheckOverPointRule($this->model),
            new CheckNameRule($this->model),
            new CheckSampleLogicRule(),
        );
    }

}