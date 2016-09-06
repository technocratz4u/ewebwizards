<?php

class LogisticsService{
	
	
	private function __fetchProductCatalog($url, $fields = array()/* , $auth = false */){
   
		$retArr = array();
		try{
			
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
			
			if($fields){
				$fields_string = http_build_query($fields);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
			}
			
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			$headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			$header_rows = array_filter($header_rows, trim);
			foreach((array)$header_rows as $hr){
				$colonpos = strpos($hr, ':');
				$key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
				$headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			}
			foreach((array)$headers as $key => $val){
				$vals = explode(';', $val);
				if(count($vals) >= 2){
					unset($headers[$key]);
					foreach($vals as $vk => $vv){
						$equalpos = strpos($vv, '=');
						$vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
						$headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
					}
				}
			}*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
				
			}
		}
	    
	    return $retArr;
	}
	
	private  function __fetchProductStock($url, $fields = array()/* , $auth = false */){
		 
		$retArr = array();
		try{
				
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
				
			if($fields){
				$fields_string = http_build_query($fields);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
			}
				
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
				$headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
				$header_rows = array_filter($header_rows, trim);
				foreach((array)$header_rows as $hr){
				$colonpos = strpos($hr, ':');
				$key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
				$headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
				}
				foreach((array)$headers as $key => $val){
				$vals = explode(';', $val);
				if(count($vals) >= 2){
				unset($headers[$key]);
				foreach($vals as $vk => $vv){
				$equalpos = strpos($vv, '=');
				$vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
				$headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
				}
				}
				}*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
		 
		return $retArr;
	}
	
	private  function __fetchTitleList($url/* , $auth = false */){
			
		$retArr = array();
		try{
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
	
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			 $headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			 $header_rows = array_filter($header_rows, trim);
			 foreach((array)$header_rows as $hr){
			 $colonpos = strpos($hr, ':');
			 $key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
			 $headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			 }
			 foreach((array)$headers as $key => $val){
			 $vals = explode(';', $val);
			 if(count($vals) >= 2){
			 unset($headers[$key]);
			 foreach($vals as $vk => $vv){
			 $equalpos = strpos($vv, '=');
			 $vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
			 $headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
			 }
			 }
			 }*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
			
		return $retArr;
	}
	
	private  function __fetchPaymentTypeList($url/* , $auth = false */){
			
		$retArr = array();
		try{
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
	
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			 $headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			 $header_rows = array_filter($header_rows, trim);
			 foreach((array)$header_rows as $hr){
			 $colonpos = strpos($hr, ':');
			 $key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
			 $headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			 }
			 foreach((array)$headers as $key => $val){
			 $vals = explode(';', $val);
			 if(count($vals) >= 2){
			 unset($headers[$key]);
			 foreach($vals as $vk => $vv){
			 $equalpos = strpos($vv, '=');
			 $vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
			 $headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
			 }
			 }
			 }*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
			
		return $retArr;
	}
	
	private  function __fetchShippingCountryList($url/* , $auth = false */){
			
		$retArr = array();
		try{
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
	
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			 $headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			 $header_rows = array_filter($header_rows, trim);
			 foreach((array)$header_rows as $hr){
			 $colonpos = strpos($hr, ':');
			 $key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
			 $headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			 }
			 foreach((array)$headers as $key => $val){
			 $vals = explode(';', $val);
			 if(count($vals) >= 2){
			 unset($headers[$key]);
			 foreach($vals as $vk => $vv){
			 $equalpos = strpos($vv, '=');
			 $vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
			 $headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
			 }
			 }
			 }*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
			
		return $retArr;
	}
	
	private  function __fetchBillingCountryList($url/* , $auth = false */){
			
		$retArr = array();
		try{
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
	
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			 $headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			 $header_rows = array_filter($header_rows, trim);
			 foreach((array)$header_rows as $hr){
			 $colonpos = strpos($hr, ':');
			 $key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
			 $headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			 }
			 foreach((array)$headers as $key => $val){
			 $vals = explode(';', $val);
			 if(count($vals) >= 2){
			 unset($headers[$key]);
			 foreach($vals as $vk => $vv){
			 $equalpos = strpos($vv, '=');
			 $vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
			 $headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
			 }
			 }
			 }*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
			
		return $retArr;
	}
	
	private  function __fetchServiceStatus($url, $fields = array()/* , $auth = false */){
		 
		$retArr = array();
		try{
				
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
				
			if($fields){
				$fields_string = http_build_query($fields);
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
			}
				
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
				$headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
				$header_rows = array_filter($header_rows, trim);
				foreach((array)$header_rows as $hr){
				$colonpos = strpos($hr, ':');
				$key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
				$headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
				}
				foreach((array)$headers as $key => $val){
				$vals = explode(';', $val);
				if(count($vals) >= 2){
				unset($headers[$key]);
				foreach($vals as $vk => $vv){
				$equalpos = strpos($vv, '=');
				$vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
				$headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
				}
				}
				}*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
		 
		return $retArr;
	}
	
	private  function __addDesign($url, $fields = array()/* , $auth = false */){
			
		$retArr = array();
		try{
	
			$curl = curl_init($url);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
			curl_setopt($curl, CURLOPT_VERBOSE, false);
			curl_setopt($curl, CURLOPT_HEADER, false);
			/* if($auth){
			 curl_setopt($curl, CURLOPT_USERPWD, "$auth");
			 curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
			} */
	
			if($fields){
				$fields_string = http_build_query($fields);
				$retArr["fields_string"] = $fields_string;
				curl_setopt($curl, CURLOPT_POST, true);
				curl_setopt($curl, CURLOPT_BINARYTRANSFER, true);
				curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
			}
	
			$response = curl_exec($curl);
			/*$headerSize = curl_getinfo($curl, CURLINFO_HEADER_SIZE);
			 $headerString = substr($response, 0, $headerSize);
			$body = substr($response, $headerSize);*/
			$body = $response;
			$retArr["httpCode"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
			if($retArr["httpCode"]==200){
				$retArr["respXMLObj"] = simplexml_load_string($body);
			}else{
				$retArr["respStr"] = $body;
			}
			/*$header_rows = explode(PHP_EOL, $header_string);
			 $header_rows = array_filter($header_rows, trim);
			 foreach((array)$header_rows as $hr){
			 $colonpos = strpos($hr, ':');
			 $key = $colonpos !== false ? substr($hr, 0, $colonpos) : (int)$i++;
			 $headers[$key] = $colonpos !== false ? trim(substr($hr, $colonpos+1)) : $hr;
			 }
			 foreach((array)$headers as $key => $val){
			 $vals = explode(';', $val);
			 if(count($vals) >= 2){
			 unset($headers[$key]);
			 foreach($vals as $vk => $vv){
			 $equalpos = strpos($vv, '=');
			 $vkey = $equalpos !== false ? trim(substr($vv, 0, $equalpos)) : (int)$j++;
			 $headers[$key][$vkey] = $equalpos !== false ? trim(substr($vv, $equalpos+1)) : $vv;
			 }
			 }
			 }*/
		}catch (Exception $e){
			$retArr["exception"]=$e->getMessage();
		}finally {
			try {
				curl_close($curl);
			}catch (Exception $e){
	
			}
		}
			
		return $retArr;
	}
	
	
	public function fetchProductCatalog(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$args = array();
		$args["api_key"]=__RETRIEVAL_API_KEY;
		$retArr = self::__fetchProductCatalog(__PRODUCT_CATALOG_API_URL, $args);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
			
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
			
			if($retArr["httpCode"]==200){
				$productCatalogObj = $retArr["respXMLObj"];
				foreach ($productCatalogObj->section as $sectionIndex => $sectionElem) {
					$_log_info_ = $_log_info_."\n\n"."--------".$sectionElem->section_name."--------"."\n";
					foreach ($sectionElem->style as $styleIndex => $styleElem) {
						$_log_info_ = $_log_info_."----------------".$styleElem->style_code." **** ".$styleElem->style_name."----------------"."\n";
					}
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------\n";
			}
		}
		
		$file = 'FETCH_PRODUCTCATALOG.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
		
		//return $retArr;
	}
	
	public  function fetchProductStock(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$args = array();
		$args["api_key"]=__RETRIEVAL_API_KEY;
		$retArr = self::__fetchProductStock(__PRODUCT_STOCK_API_URL, $args);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
				
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
				
			if($retArr["httpCode"]==200){
				$stockObj = $retArr["respXMLObj"];
				foreach ($stockObj->style as $styleIndex => $styleElem) {
					$_log_info_ = $_log_info_."\n\n"."--------".$styleElem->style_id."--------"."\n";
					foreach ($styleElem->style_color as $styleColorIndex => $styleColorElem) {
						$_log_info_ = $_log_info_."\n\n"."----------------".$styleColorElem->style_color_name."----------------"."\n";
						foreach ($styleColorElem->style_size as $sizeIndex => $sizeElem) {
							$_log_info_ = $_log_info_."------------------------".$sizeElem->size_name." **** ".$sizeElem->size_stock."------------------------"."\n";
						}
					}
					$_log_info_ = $_log_info_."\n------------------------------------------------------------------------------------------\n";
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_PRODUCTSTOCK.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function fetchTitleList(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$retArr = self::__fetchTitleList(__TITLE_LIST_API_URL);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
	
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$optionsObj = $retArr["respXMLObj"];
				foreach ($optionsObj->option as $optionIndex => $optionElem) {
					$_log_info_ = $_log_info_."\n"."--------".(string)$optionElem."--------";
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_TITLELIST.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function fetchPaymentTypeList(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$retArr = self::__fetchPaymentTypeList(__PAYMENT_TYPE_LIST_API_URL);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
	
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$optionsObj = $retArr["respXMLObj"];
				foreach ($optionsObj->option as $optionIndex => $optionElem) {
					$_log_info_ = $_log_info_."\n"."--------".(string)$optionElem."--------";
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_PAYMENTTYPELIST.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function fetchShippingCountryList(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$retArr = self::__fetchShippingCountryList(__SHIPPING_COUNTRY_LIST_API_URL);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
	
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$optionsObj = $retArr["respXMLObj"];
				foreach ($optionsObj->option as $optionIndex => $optionElem) {
					$_log_info_ = $_log_info_."\n"."--------".(string)$optionElem."--------";
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_SHIPPINGCOUNTRYLIST.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function fetchBillingCountryList(){
		$_log_info_ = "\n\n";
		$retArr = array();
		$retArr = self::__fetchBillingCountryList(__BILLING_COUNTRY_LIST_API_URL);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
	
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$optionsObj = $retArr["respXMLObj"];
				foreach ($optionsObj->option as $optionIndex => $optionElem) {
					$_log_info_ = $_log_info_."\n"."--------".(string)$optionElem."--------";
				}
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_BILLINGCOUNTRYLIST.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function fetchServiceStatus($country, $pincode, $paymentType){
		$_log_info_ = "\n\n";
		$retArr = array();
		$args = array();
		$args["api_key"]=__RETRIEVAL_API_KEY;
		$args["country_name"]=$country;
		$args["pincode"]=$pincode;
		$args["paymode"]=$paymentType;
		$retArr = self::__fetchServiceStatus(__SERVICE_STATUS_API_URL, $args);
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){

			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$resultObj = $retArr["respXMLObj"];
				$_log_info_ = $_log_info_."\n"."--------".
								$resultObj->request_status." **** ".
								$resultObj->country." **** ".
								$resultObj->pincode." **** ".
								$resultObj->paymode." **** ".
								$resultObj->service_available." **** ".
								$resultObj->response_msg.
								"--------";
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'FETCH_SERVICESTATUS.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	public  function createDesign($createDesignData){
		$_log_info_ = "\n\n";
		$retArr = array();
		$args = array();
		$args["api_key"]=__UPDATION_API_KEY;
		
		$designData = "";
		$designData = $designData.
		"<design>".
		"<merchant_product_design_name>".$createDesignData["merchantProductDesignName"]."</merchant_product_design_name>".
		"<merchant_design_code>".$createDesignData["merchantDesignCode"]."</merchant_design_code>".
		"<product_stylecode>".$createDesignData["productStyleCode"]."</product_stylecode>".
		"<design_view>";
		
		if(strlen($createDesignData["merchantDesignFileLink_Front"])>0){
			$designData = $designData.
			"<design_view_detail>".
			"<merchant_design_view_type>".$createDesignData["merchantDesignViewType_Front"]."</merchant_design_view_type>".
			"<merchant_design_file_link>".$createDesignData["merchantDesignFileLink_Front"]."</merchant_design_file_link>".
			"<merchant_design_image_link>".$createDesignData["merchantDesignImageLink_Front"]."</merchant_design_image_link>".
			"<merchant_design_print_width>".$createDesignData["merchantDesignPrintWidth_Front"]."</merchant_design_print_width>".
			"<merchant_design_print_height>".$createDesignData["merchantDesignPrintHeight_Front"]."</merchant_design_print_height>".
			"<merchant_design_print_top>".$createDesignData["merchantDesignPrintTop_Front"]."</merchant_design_print_top>".
			"</design_view_detail>";
		}
		
		if(strlen($createDesignData["merchantDesignFileLink_Back"])>0){
			$designData = $designData.
			"<design_view_detail>".
			"<merchant_design_view_type>".$createDesignData["merchantDesignViewType_Back"]."</merchant_design_view_type>".
			"<merchant_design_file_link>".$createDesignData["merchantDesignFileLink_Back"]."</merchant_design_file_link>".
			"<merchant_design_image_link>".$createDesignData["merchantDesignImageLink_Back"]."</merchant_design_image_link>".
			"<merchant_design_print_width>".$createDesignData["merchantDesignPrintWidth_Back"]."</merchant_design_print_width>".
			"<merchant_design_print_height>".$createDesignData["merchantDesignPrintHeight_Back"]."</merchant_design_print_height>".
			"<merchant_design_print_top>".$createDesignData["merchantDesignPrintTop_Back"]."</merchant_design_print_top>".
			"</design_view_detail>";
		}
		
		if(strlen($createDesignData["merchantDesignFileLink_Left"])>0){
			$designData = $designData.
			"<design_view_detail>".
			"<merchant_design_view_type>".$createDesignData["merchantDesignViewType_Left"]."</merchant_design_view_type>".
			"<merchant_design_file_link>".$createDesignData["merchantDesignFileLink_Left"]."</merchant_design_file_link>".
			"<merchant_design_image_link>".$createDesignData["merchantDesignImageLink_Left"]."</merchant_design_image_link>".
			"<merchant_design_print_width>".$createDesignData["merchantDesignPrintWidth_Left"]."</merchant_design_print_width>".
			"<merchant_design_print_height>".$createDesignData["merchantDesignPrintHeight_Left"]."</merchant_design_print_height>".
			"<merchant_design_print_top>".$createDesignData["merchantDesignPrintTop_Left"]."</merchant_design_print_top>".
			"</design_view_detail>";
		}
		
		if(strlen($createDesignData["merchantDesignFileLink_Right"])>0){
			$designData = $designData.
			"<design_view_detail>".
			"<merchant_design_view_type>".$createDesignData["merchantDesignViewType_Right"]."</merchant_design_view_type>".
			"<merchant_design_file_link>".$createDesignData["merchantDesignFileLink_Right"]."</merchant_design_file_link>".
			"<merchant_design_image_link>".$createDesignData["merchantDesignImageLink_Right"]."</merchant_design_image_link>".
			"<merchant_design_print_width>".$createDesignData["merchantDesignPrintWidth_Right"]."</merchant_design_print_width>".
			"<merchant_design_print_height>".$createDesignData["merchantDesignPrintHeight_Right"]."</merchant_design_print_height>".
			"<merchant_design_print_top>".$createDesignData["merchantDesignPrintTop_Right"]."</merchant_design_print_top>".
			"</design_view_detail>";
		}
		$designData = $designData.
		"</design_view>".
		"</design>";
						
		$args["design_data"]=$designData;
		$retArr = self::__addDesign(__DESIGN_CREATION_API_URL, $args);
		
		$_log_info_ = $_log_info_."\n"."-------- fields_string :".$retArr["fields_string"].": --------\n\n";
		
		if(isset($retArr["exception"])){
			$_log_info_ = $_log_info_."Exception Message : ".$retArr["exception"]."\n\n";
		}else if(isset($retArr["httpCode"])){
	
			$_log_info_ = $_log_info_."httpCode : ".$retArr["httpCode"]."\n\n";
	
			if($retArr["httpCode"]==200){
				$resultObj = $retArr["respXMLObj"];
				$_log_info_ = $_log_info_."\n"."--------".
						$resultObj->request_status." **** ".
						$resultObj->response_msg." **** ".
						"--------";
			}else{
				$_log_info_ = $_log_info_."\n"."-------- respStr :".$retArr["respStr"].": --------";
			}
		}
	
		$file = 'CREATE_DESIGN.txt';
		// Write the contents to the file,
		// using the FILE_APPEND flag to append the content to the end of the file
		// and the LOCK_EX flag to prevent anyone else writing to the file at the same time
		file_put_contents($file, $_log_info_, FILE_APPEND);
	
		//return $retArr;
	}
	
	
} /*** end of class ***/

?>
