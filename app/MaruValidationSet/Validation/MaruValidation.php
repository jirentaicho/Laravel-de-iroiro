<?php

namespace App\MaruValidationSet\Validation;


use App\MaruValidationSet\MaruResult;
use App\MaruValidationSet\Rule\MaruRule;

/**
 * バリデーションは登録されたルールを実行して
 * 結果オブジェクトを返却します。
 */
abstract class MaruValidation {

    private array $rules = array();

    /**
     * 初期化処理でルールを設定するようにする
     */
    protected abstract function init();

    /**
     * 設定されたルールを全て実施して
     * Resultオブジェクトを返却します。
     */
    public function vaild() : MaruResult
    {

        if($this->rules === null)
        {
            return new MaruResult();
        }

        $maruResult = new MaruResult();

        array_walk($this->rules, function(MaruRule $rule) use($maruResult){

            $rule->checkRule();
            if(!$rule->getResult()){
                $maruResult->setResult($rule->getResult());
                $maruResult->setMessage($rule->getMessages());
            }
        });

        return $maruResult;
    }

    public function addRule(MaruRule $rule)
    {
        if($this->rules === null){
            $this->rules = array();
        }
        array_push($this->rules,$rule);
    }

    public function addRules(MaruRule ...$rules)
    {
        foreach($rules as $rule){
            array_push($this->rules, $rule);
        }
    }

    public function setRules(array $rules)
    {
        // convert rule class
        $this->rules = array_map(function(MaruRule $rule){
            return $rule;
        },$rules);

    }
    
}