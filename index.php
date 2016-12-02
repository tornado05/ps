<!-- echo example -->
<?php echo 'hi';?>
<!-- short echo -->
<?=hi?>

<?php
	// variable a = 5;
	$a = 5;
	echo $a;

	// <=5.3	
	$arrOld = array(1, 'a');
	// >5.3	
	$arrNew = [2, 'a'];

	print_r($arrOld);

	echo '<pre>';print_r($arrOld); echo '</pre>';

	//Strings
	$strFast = 'just str $a';
	$strSlow = "cool str $a";

	echo $strFast . '<br />';
	echo $strSlow . '<br />';

	$strFast = 'just "str" $a';
	$strSlow = "cool 'str' $a";

	echo $strFast . '<br />';
	echo $strSlow . '<br />';

	$strFast = 'just \'str\' $a';
	echo $strFast . '<br />';

	echo "A is: {$a}" . '<br />';

	$intVar = 5;    
	echo $intVar . '<br />';
	echo (bool)$intVar . '<br />';
	echo (float)$intVar . '<br />';
	$floatVar = 5.9;
	echo $floatVar . '<br />';
	echo (int)$floatVar . '<br />';
	$floatVar = null;
	echo $floatVar . '<br />';

	function concat($a, $b) {
	    return $a + $b;		
	}

	echo concat($intVar, 7) . '<br />';

	$concat = function ($a, $b) {
	    return $a + $b;		
	};	

	echo call_user_func($concat, 12, 3) . '<br />';
	echo $concat(12, 12) . '<br />';

	function reduce($a, $b) {
		$val = 1;
         return $b - $a - $val;
	}
     
    $number = 5; 

    function reduceN($a, $b) {
         return $b - $a - $number;
	}

	echo reduce(3, 13) . '<br />';	
	echo $val . '<br />';
	echo reduceN(3, 13) . '<br />';

	echo reduceD(3, 13) . '<br />';

	function reduceD($a, $b, $number = 5) {
         return $b - $a - $number;
	}	

	function reduceB($a, $b, $number = 5) {
		 function badReduce ($a, $b, $number) {
		 		return $a + $b + $number;
		 }
         return badReduce($a, $b, $number);
	}

	function reduceBB($a, $b, $number = 5) {
		 function badReduceB ($z, $x, $xNumber) {
		 		return $z + $x+ $xNumber;
		 }
         return badReduceB($a, $b, $number);
	}

	echo reduceB(3, 13) . '<br />';
	echo reduceBB(3, 13) . '<br />';
	echo badReduce(3, 13, 5) . '<br />';

	$letters = array('a', 'b', 'c');
	function printLetters($letters) {
		$res = '';
	   for ($i = 0; $i < count($letters); ++$i) {
       		$res .= $letters[$i] . ' ';
	   }
	   return $res;		
	}

	function printLettersWhile($letters) {
		$res = '';
		$count = count($letters);
		$i = 0;
	    while($count > $i) {
       		$res .= $letters[$i] . ' ';
       		++$i;	    
	   }
	   return $res;		
	}

	function printLettersDoWhile($letters) {
		$res = '';
		$count = count($letters);
		$i = 0;
	    do {
       		$res .= $letters[$i] . ' ';
       		++$i;	    
	    } while($count > $i);
	    return $res;	
	}

	function printLettersFoeach($letters) {
		$res = '';
	   foreach ($letters as $letter) {
       		$res .= $letter . ' ';
	   }
	   return $res;		
	}

	function concatArrays($arrA, $arrB) {
       $result = array();
       foreach ($arrA as $value) {
        $result[] = $value;	
       }
       foreach ($arrB as $value) {
        $result[] = $value;	
       }
       return $result;
	}

	echo printLetters($letters) . '<br />';
	echo printLettersWhile($letters) . '<br />';
	echo printLettersDoWhile($letters) . '<br />';
	echo printLettersFoeach($letters) . '<br />';
	echo '<pre>'; print_r(concatArrays($letters, array(2, 5))); '</pre>';
	// Python:)
	// def _bool(a):
    //     return True if a else False 

	function createBadArray() {
		$result = array();
		for ($i = 0; $i < 7; $i++) { 
			if ($i % 2 == 0) {
                $result[$i] = rand(2, 7);
			}
		}	
		echo '<pre>'; print_r($result); '</pre>';
		return $result;
	}

    echo printLettersFoeach(createBadArray()) . '<br />';
    echo printLetters(createBadArray()) . '<br />';
?>
<!-- single opened php tag -->
<?
echo 'hi';