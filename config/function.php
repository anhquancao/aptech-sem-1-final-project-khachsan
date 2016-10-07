<?php function the_excerpt($string){
	 		
	 		if (strlen($string)>90)	
	 		{
				$cutstring=substr($string, 0, 90);	
				$word=substr($string, 0, strrpos($cutstring, ' '));
				$word.="..."; 	
				return $word;
	 		} 
	 		else 
	 		{
	 			$string.="...";
				return $string;			
	 		}
	 			
	 }
	 
	 function limitPhongNghi($string){
	 		
	 		if (strlen($string)>300)	
	 		{
				$cutstring=substr($string, 0, 300);	
				$word=substr($string, 0, strrpos($cutstring, ' '));
				$word.="..."; 	
				return $word;
	 		} 
	 		else 
	 		{
	 			$string.="...";
				return $string;			
	 		}
	 			
	 }
	 
	 function redirect_to($page = 'index.php') {
        $url = $page;
        header("Location: $url");
        exit();
    }
    function captcha() {
        $qna = array(
                1 => array('question' => '1+1', 'answer' => 2),
                2 => array('question' => '3-2', 'answer' => 1),
                3 => array('question' => '3*5', 'answer' => 15),
                4 => array('question' => '5-2', 'answer' => 3),
                5 => array('question' => '14/2', 'answer' => 7),
                6 => array('question' => '8*5', 'answer' => 40),
                7 => array('question' => '6-5', 'answer' => 1),
                8 => array('question' => '8-5', 'answer' => 3)
                );
        $rand_key = array_rand($qna); // Lay ngau nhien mot trong cac array 1, 2, 4
        $_SESSION['q'] = $qna[$rand_key];
        return $question = $qna[$rand_key]['question'];
    }
	 ?>
	 
	 