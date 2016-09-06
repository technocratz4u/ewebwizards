<?php
/**
 * Business exception class
 */
class BusinessException extends Exception
{
    
	private $__uid;
	private $__args;
	
	private function generateUid(){
		$sessId = isset($this->__args["sessionId"]) ? $this->__args["sessionId"] : "";
		$uid = time()."_".$sessId;
		
		return $uid;
	}
	
    // Redefine the exception so message isn't optional
    public function __construct($args, $message, $code = 0, Exception $previous = null) {
        // some code
    
    	// make sure everything is assigned properly
    	parent::__construct($message, $code, $previous);
    	
    	$this->__args = $args;
    	$this->__uid = $this->generateUid();
    	
    }

    // custom string representation of object
    public function __toString() {
        return "_To be implenented_";
    }

}
?>
