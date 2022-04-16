<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ocal_lib {
	var $template_data = array();
		
	Function EncryptString($InString, $EncryptKey)
	{
 
		// Initilize i and make sure the EncryptKey is long enough
		$i = -1;
		$TempKey = '';
		$OutString = '';
		
		do{
			$TempKey = $TempKey.$EncryptKey;
		} While(strlen($TempKey) < strlen($InString));
		
		
		//Loop through the string to encrypt each character.
		Do{
			$i = $i + 1;
			$OldChar = ord(substr($InString, $i, 1));
			//echo $InString.'/'.$i.'/'.substr($InString, $i, 1);
			//echo $OldChar;
			//exit;
			
			$CryptChar = ord(substr($TempKey, $i, 1));
			// If it's an even character, add the ASCII value of the
			// appropriate character in the Key, otherwise, subract it.
			// Also, make sure the value is between 0 and 127.
			//echo $i.'/'.$i % 2;
			//exit;
			switch(($i+1) % 2){
			   Case 0:      //'Even Character
				$NewChar = $OldChar + $CryptChar;
				If($NewChar > 127)
					$NewChar = $NewChar - 127;
				break;
			   default:  //'Odd Character
				$NewChar = $OldChar - $CryptChar;
				If($NewChar < 0)
					$NewChar = $NewChar + 127;
			}
			//echo $NewChar;
			//exit;
			//' If the value is less than 35, add 40 to it (to make sure
			//' it's in the display range) and put it in an escape
			//' sequence (using ! [ASCII Value 33] as the escape char)
			If($NewChar < 35)
				$OutString = $OutString."!".chr($NewChar + 40);
			else
				$OutString = $OutString.chr($NewChar);
		}while($i <> strlen($InString)-1);

		$EncryptString = $OutString;
		return $EncryptString;
	}
}

/* End of file Template.php */
/* Location: ./system/application/libraries/Template.php */
