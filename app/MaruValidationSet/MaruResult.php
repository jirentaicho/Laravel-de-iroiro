<?php



namespace App\MaruValidationSet;

/**
 * 検証結果オブジェクトです
 * 検証結果とそれに付随するメッセージを保持します
 */
class MaruResult{
    
    private bool $result;

    private array $messages;

    public function __construct()
    {
        $this->result = true;
        $this->messages = array();
    }

    public function setResult(bool $result) : void
    {
        $this->result = $result;
    }

    public function getResult() : bool
    {
        return $this->result;
    }

    public function getMessages() :array
    {
        return $this->messages;
    }

    public function setMessage(array $message) : void
    {
        array_push($this->messages, $message);
    }


    public function getErrors()
    {
        
    }

}