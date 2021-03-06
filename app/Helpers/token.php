<?php
namespace App;

class Token {

    /**
     * @var
     */
    public $prefix;

    /**
     * @var
     */
    public $entropy;

    /**
     * @param string $prefix
     * @param bool $entropy
     */

    // $code = new Token;
    // return $code; // Will return something like 53ef6b2ae4da1

    // $code = new Token('secret_');
    // return $code; // Will return something like secret_53ef6b2ae4da1

    // $code = new Token; 
    // return $code->limit(6); // Will return something like 53ef6b
    
    public function __construct($length = 15, $entropy = false)
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        $this->uuid = $randomString;
    }

    /**
     * Limit the UUID by a number of characters
     * 
     * @param $length
     * @param int $start
     * @return $this
     */
    public function limit($length, $start = 0)
    {
        $this->uuid = substr($this->uuid, $start, $length);

        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
        return $this->uuid;
    }
} 
