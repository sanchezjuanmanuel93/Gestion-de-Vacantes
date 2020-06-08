<?php

namespace App;

class FAQ 
{    
    public $question;

    public $answer;

    /**
     * Create a new FAQ instance.
     *
     * @return void
     */
    public function __construct($question, $answer)
    {
        $this->question = $question;
        $this->answer = $answer;
    }
}
