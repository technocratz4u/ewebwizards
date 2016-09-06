<?php
require_once "Mail.php";
require_once ("Mail/mime.php");

class EmailUtil{
	
	
	/**
	 *
	 * the constructor is set to private so
	 * so nobody can create a new instance using new
	 *
	 */
	private function __construct() {
		/*** maybe set the db name here later ***/
	}
	
	/**
	 *
	 * Like the constructor, we make __clone private
	 * so nobody can clone the instance
	 *
	 */
	private function __clone(){
	}
	
	public static function sendMail($mailData){
		$mailingStatus = false;
		try{
			
			$mime = new Mail_mime;
			//$mime->setTXTBody($text);
			$mime->setHTMLBody($mailData["message"]);
			$mimeparams = array();
				
			$mimeparams['text_charset']="UTF-8";
			$mimeparams['html_charset']="UTF-8";
			$mimeparams['head_charset']="UTF-8";
			$mimeparams["debug"] = "True";
				
			$body = $mime->get($mimeparams);
			
			$headers = array();
			$headers['From'] = __APPLICATION_NAME." <".__MY_MAIL_ID.">";
			$headers['To'] = $mailData["emailto"];
			$headers['Subject'] = $mailData["emailsubject"];
			$headers['Content-Type'] = 'text/html; charset=UTF-8';
			$headers['Content-Transfer-Encoding'] = 'quoted-printable';
			
			$headers = $mime->headers($headers);
				
			$smtpparams = array();
			$smtpparams['host'] = __MY_SMTP_HOST;
			$smtpparams['port'] = __MY_SMTP_PORT;
			$smtpparams['auth'] = __MY_SMTP_AUTH;
			$smtpparams['username'] = __MY_SMTP_USER;
			$smtpparams['password'] = __MY_SMTP_PSWD;
			
			$smtp = Mail::factory('smtp', $smtpparams);
			$mail = $smtp->send($mailData["emailto"], $headers, $body);
				
			if (PEAR::isError($mail)) {
				$mailingStatus = false;
				//echo "false mailingStatus --- ".$mailingStatus;
				//echo "_______________________";
				error_log( "false mailingStatus --- ".$mailingStatus );
				//print_r($mail);
			} else {
				$mailingStatus = true;
				//echo "true mailingStatus --- ".$mailingStatus;
				//echo "_______________________";
				//print_r($mail);
			}
			//echo "mailingStatus --- ".$mailingStatus;
			
		}catch (Exception $e){
			$mailingStatus = false;
			throw $e;
		}
		
		return $mailingStatus;
	}
	
	
} /*** end of class ***/

?>
