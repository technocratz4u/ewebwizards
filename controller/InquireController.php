<?php

include __SITE_PATH . '/service/utils/SqlInjectionFilter.php' ;
include __SITE_PATH . '/php_plugins/PHPMailer-master/class.phpmailer.php' ;
include __SITE_PATH . '/php_plugins/PHPMailer-master/class.smtp.php' ;
include __SITE_PATH . '/php_plugins/PHPMailer-master/class.pop3.php' ;
include __SITE_PATH . '/php_plugins/PHPMailer-master/class.phpmaileroauth.php' ;
include __SITE_PATH . '/php_plugins/PHPMailer-master/class.phpmaileroauthgoogle.php' ;

class InquireController extends BaseController {
	
	public function index() {
		
		$this->registry->template->model = array();
		$this->registry->template->show('inquire');
	}
	
	public function submit(){
		$retArr = array();
	
		try{
				
			if (isset($_POST["inquiryDetail"]) &&
					isset($_POST["inquiryEmail"]) && isset($_POST["inquiryMobile"])) {
						
					$sanitizedEmail = filter_var($_POST["inquiryEmail"], FILTER_SANITIZE_EMAIL);
					
					if (filter_var($sanitizedEmail, FILTER_VALIDATE_EMAIL)) {

							$mailArgs = array();
							$mailArgs["mailTo"] = filter_var(__MY_MAIL_ID, FILTER_SANITIZE_EMAIL);
							$mailArgs["detail"] = SqlInjectionFilter::filter($_POST["inquiryDetail"]);
							$mailArgs["itemsSelected"] = SqlInjectionFilter::filter($_POST["itemsSelected"]);
							$mailArgs["email"] = SqlInjectionFilter::filter($sanitizedEmail);
							$mailArgs["mobile"] = SqlInjectionFilter::filter($_POST["inquiryMobile"]);
							$mailStatus = $this->mailInquiryToAdmin($mailArgs);
							
							//if($mailStatus){
								$userMailArgs = array();
								$userMailArgs["mailTo"] = $sanitizedEmail;
								$mailStatus = $this->mailInquiryConfirmationToUser($userMailArgs);
								$retArr["STATUS"]="SUCCESS";
							//}
							
							//// mail to Velvet-Fitings
						
						
					}else{
						$retArr["STATUS"] = "INVALID_EMAIL";
					}
						
			}else{
				$retArr["STATUS"] = "ERROR";
			}
	
		}catch (Exception $e) {
			$retArr["STATUS"] = "ERROR";
			trigger_error("Error occured during sending inquiry", E_USER_ERROR);
		}

		$this->registry->template->model = $retArr;
		$this->registry->template->show('inquiresubmit');
		
	}
	
	private function mailInquiryConfirmationToUser($sendmailArgs){
		$mailingStatus = false;
		try{
	
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							    <head>
							        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							        <title>'.__APPLICATION_NAME.' inquiry acknowledgement</title>
							        <style>
										.emailContainerTbl{
											background-color:#D9E5ED;
										}
	
										.emailHeaderTbl{
											background-color:#ba7c2e;
											color:#FFFFFF;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailBodyTbl{
											color: #333333;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailFooterTbl{
											background-color:#ba7c2e;
											color:#FFFFFF;
											font:10px Arial,Helvetica sans-serif;
										}
	
										.credentialsTbl{
											font:15px Arial,Helvetica sans-serif;
											padding-top:10px;
										}
	
										.credentialsTblCol{
											style="padding:0px 5px;"
										}
	
										.loginbutton{
											background-color: #ba7c2e;
											border: 1px solid #ba7c2e;
											color: #FFFFFF;
											cursor: pointer;
											display: inline-block;
											font: bold 14px tahoma,verdana,arial,sans-serif;
											margin: 20px 0px 0px 0px;
											padding: 0.3em 0.6em 0.375em; position: relative;
											text-align: center; text-decoration: none;
											white-space: nowrap;
											z-index: 1;
										}
	
										.footerLink{
											color:#FFFFFF;
										}
	
									</style>
							    </head>
							    <body>
									<table cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
									    <tr>
									        <td align="center" valign="top">
									            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer"
													class="emailContainerTbl" style="background-color:#F5F5F5;">
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailHeader"
																class="emailHeaderTbl" style="background-color:#ba7c2e;color:#FFFFFF;font:15px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    Thanks for contacting '.__APPLICATION_NAME.'
									                                </td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody"
									                            class="emailBodyTbl" style="font:15px Arial,Helvetica sans-serif;color: #333333;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    Dear user, <br/><br/>
																		Thanks for showing interest in the services of '.__APPLICATION_NAME.'.<br/>
																		Your request is under process.<br/>
																		'.__APPLICATION_NAME.' will get back to you soon.
									                                </td>
									                            </tr>
																
																<tr>
									                                <td align="center" valign="top">
																		<a target="_blank" href="'.__APPLICATION_URL.'" class="loginbutton"
																			style="background-color: #ba7c2e; border: 1px solid #ba7c2e;
																				color: #FFFFFF; cursor: pointer; display: inline-block; font: bold 14px tahoma,verdana,arial,sans-serif; margin: 20px 0px 0px 0px;
																				padding: 0.3em 0.6em 0.375em; position: relative; text-align: center; text-decoration: none; white-space: nowrap;
																				z-index: 1;">'.__APPLICATION_NAME.'</a>
																	</td>
																</tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailFooter"
																class="emailFooterTbl" style="background-color:#ba7c2e;color:#FFFFFF;font:10px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="left" valign="top" style="width:50%;">
									                                    This is an auto-mailer. Please do not reply to this mail.<br/>
																		Website : <a class="footerLink" style="color:#FFFFFF;" target="_blank" href="'.__APPLICATION_URL.'">'.__APPLICATION_URL.'</a> <br/>
																			Mail : <a class="footerLink" style="color:#FFFFFF;" href="mailto:'.__MY_MAIL_ID.'">'.__MY_MAIL_ID.'</a>
	
									                                </td>
																	<td align="right" valign="top" style="width:50%;">
																		&copy; 2016 '.__APPLICATION_NAME.' All Rights Reserved
																	</td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									            </table>
									        </td>
									    </tr>
									</table>
								</body>
							</html>';
	
			$mail = new PHPMailer;
			
			$mail->SMTPDebug = 0;                               	// Enable verbose debug output
			$mail->Debugoutput = "html";
			$mail->isSMTP();                                    	// Set mailer to use SMTP
			$mail->Host = __MY_SMTP_HOST;  							// Specify main and backup SMTP servers
			$mail->SMTPAuth = __MY_SMTP_AUTH;                   	// Enable SMTP authentication
			$mail->Username = __MY_SMTP_USER;                 		// SMTP username
			$mail->Password = __MY_SMTP_PSWD;                   	// SMTP password
			$mail->SMTPSecure = __MY_SMTP_PROTOCOL;             	// Enable TLS encryption, `ssl` also accepted
			$mail->Port = __MY_SMTP_PORT;                       	// TCP port to connect to
			
			$mail->setFrom(__MY_MAIL_ID, __APPLICATION_NAME);
			$mail->addAddress($sendmailArgs["mailTo"]);     		// Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo(__MY_MAIL_ID, __APPLICATION_NAME);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');
			
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  	// Set email format to HTML
			
			$mail->Subject = "Thanks for contacting ".__APPLICATION_NAME;
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
			
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				error_log( "Error occured while sending confirmation mail. email : ".$sendmailArgs["mailTo"].", Error - ".$mail->ErrorInfo );
				$mailingStatus = false;
				
			} else {
				//echo 'Message has been sent';
				$mailingStatus = true;
			}
			
		}catch (Exception $e) {
			$mailingStatus = false;
		}
	
		return $mailingStatus;
	}
	
	private function mailInquiryToAdmin($sendmailArgs){
		$mailingStatus = false;
		try{
	
			$message = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
							<html xmlns="http://www.w3.org/1999/xhtml">
							    <head>
							        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
							        <title>'.__APPLICATION_NAME.' website - user inquiry</title>
							        <style>
										.emailContainerTbl{
											background-color:#D9E5ED;
										}
	
										.emailHeaderTbl{
											background-color:#ba7c2e;
											color:#FFFFFF;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailBodyTbl{
											color: #333333;
											font:15px Arial,Helvetica sans-serif;
										}
	
										.emailFooterTbl{
											background-color:#ba7c2e;
											color:#FFFFFF;
											font:10px Arial,Helvetica sans-serif;
										}
	
										.credentialsTbl{
											font:15px Arial,Helvetica sans-serif;
											padding-top:10px;
										}
	
										.credentialsTblCol{
											style="padding:0px 5px;"
										}
	
										.loginbutton{
											background-color: #ba7c2e;
											border: 1px solid #ba7c2e;
											color: #FFFFFF;
											cursor: pointer;
											display: inline-block;
											font: bold 14px tahoma,verdana,arial,sans-serif;
											margin: 20px 0px 0px 0px;
											padding: 0.3em 0.6em 0.375em; position: relative;
											text-align: center; text-decoration: none;
											white-space: nowrap;
											z-index: 1;
										}
	
										.footerLink{
											color:#FFFFFF;
										}
	
									</style>
							    </head>
							    <body>
									<table cellpadding="0" cellspacing="0" height="100%" width="100%" id="bodyTable">
									    <tr>
									        <td align="center" valign="top">
									            <table border="0" cellpadding="20" cellspacing="0" width="600" id="emailContainer"
													class="emailContainerTbl" style="background-color:#fbfbfb;">
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailHeader"
																class="emailHeaderTbl" style="background-color:#ba7c2e;color:#FFFFFF;font:15px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="center" valign="top">
									                                    '.__APPLICATION_NAME.' website - Request for Quote
									                                </td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="0" cellspacing="0" width="100%" id="emailBody"
									                            class="emailBodyTbl" style="font:15px Arial,Helvetica sans-serif;color: #333333;">
									                            <tr>
									                                <td align="left" valign="top">
									                                    Hi '.__APPLICATION_NAME.' Admin, <br/><br/>
																		A '.__APPLICATION_NAME.' website user has shown interest in your services.<br/>
																		Please find below the details.<br/><br/>';
			
																		$message .= '<b>Brief Description :</b><br/>
																		'.$sendmailArgs["detail"].' <br/><br/>
																		<b>Contact Details :</b><br/>
																		Email : <a href="mailto:'.$sendmailArgs["email"].'">'.$sendmailArgs["email"].'</a><br/>
																		Mobile No. : <a href="tel:'.$sendmailArgs["mobile"].'">'.$sendmailArgs["mobile"].'</a><br/>
									                                </td>
									                            </tr>
	
																<tr>
									                                <td align="left" valign="top">
																		<a target="_blank" href="'.__APPLICATION_URL.'" class="loginbutton"
																			style="background-color: #ba7c2e; border: 1px solid #ba7c2e;
																				color: #FFFFFF; cursor: pointer; display: inline-block; font: bold 14px tahoma,verdana,arial,sans-serif; margin: 20px 0px 0px 0px;
																				padding: 0.3em 0.6em 0.375em; position: relative; text-align: center; text-decoration: none; white-space: nowrap;
																				z-index: 1;">'.__APPLICATION_NAME.'</a>
																	</td>
																</tr>
									                        </table>
									                    </td>
									                </tr>
									                <tr>
									                    <td align="center" valign="top">
									                        <table border="0" cellpadding="5" cellspacing="0" width="100%" id="emailFooter"
																class="emailFooterTbl" style="background-color:#ba7c2e;color:#FFFFFF;font:10px Arial,Helvetica sans-serif;">
									                            <tr>
									                                <td align="left" valign="top" style="width:50%;">
									                                    This is an auto-mailer. Please do not reply to this mail.<br/>
																		Website : <a class="footerLink" style="color:#FFFFFF;" target="_blank" href="'.__APPLICATION_URL.'">'.__APPLICATION_URL.'</a> <br/>
																			Mail : <a class="footerLink" style="color:#FFFFFF;" href="mailto:'.__MY_MAIL_ID.'">'.__MY_MAIL_ID.'</a>
	
									                                </td>
																	<td align="right" valign="top" style="width:50%;">
																		&copy; 2016 '.__APPLICATION_NAME.' All Rights Reserved
																	</td>
									                            </tr>
									                        </table>
									                    </td>
									                </tr>
									            </table>
									        </td>
									    </tr>
									</table>
								</body>
							</html>';
	
			
			$mail = new PHPMailer;
				
			$mail->SMTPDebug = 0;                               	// Enable verbose debug output
			$mail->Debugoutput = "html";
			$mail->isSMTP();                                    	// Set mailer to use SMTP
			$mail->Host = __MY_SMTP_HOST;  							// Specify main and backup SMTP servers
			$mail->SMTPAuth = __MY_SMTP_AUTH;                   	// Enable SMTP authentication
			$mail->Username = __MY_SMTP_USER;                 		// SMTP username
			$mail->Password = __MY_SMTP_PSWD;                   	// SMTP password
			$mail->SMTPSecure = __MY_SMTP_PROTOCOL;             	// Enable TLS encryption, `ssl` also accepted
			$mail->Port = __MY_SMTP_PORT;                       	// TCP port to connect to
				
			$mail->setFrom(__MY_MAIL_ID, __APPLICATION_NAME);
			$mail->addAddress($sendmailArgs["mailTo"]);     		// Add a recipient
			//$mail->addAddress('ellen@example.com');               // Name is optional
			$mail->addReplyTo(__MY_MAIL_ID, __APPLICATION_NAME);
			//$mail->addCC('cc@example.com');
			//$mail->addBCC('bcc@example.com');
				
			//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
			//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
			$mail->isHTML(true);                                  	// Set email format to HTML
				
			$mail->Subject = __APPLICATION_NAME." website - Inquiry from user";
			$mail->Body    = $message;
			//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
				
			if(!$mail->send()) {
				//echo 'Message could not be sent.';
				//echo 'Mailer Error: ' . $mail->ErrorInfo;
				error_log( "Error occured while mailing. email : ".$sendmailArgs["email"].", mobile : ".$sendmailArgs["mobile"].", Error - ".$mail->ErrorInfo );
				$mailingStatus = false;
			} else {
				//echo 'Message has been sent';
				$mailingStatus = true;
			}															
	
		}catch (Exception $e) {
			$mailingStatus = false;
		}
	
		return $mailingStatus;
	}
	
		
}

?>
