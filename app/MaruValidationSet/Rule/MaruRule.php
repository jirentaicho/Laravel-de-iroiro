<?php


namespace App\MaruValidationSet\Rule;

use App\MaruValidationSet\MaruResult;

/**
 * ルールの基底クラスです。
 * ルールのチェックおよび、結果の返却を行います
 * ルールの詳細は実装クラスにて定義します
 */
abstract class MaruRule{


    protected bool $result = true;

    protected array $messages = array();


    public abstract function checkRule() : void;

    public function getResult() : bool
    {
        return $this->result;
    }

    public function getMessages() : array
    {
        return $this->messages;
    }
    
    protected function setMessage(...$messages)
    {
        array_walk($messages, function(string $message){
            array_push($this->messages, $message);
        });
    }
}