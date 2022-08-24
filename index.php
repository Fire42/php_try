<?php
	$a = 101;
	$b = 14.5;
	$c = 't';
	$d = 'Привет мир!';
	$e = array('петя','ваня',"света","дима","джон");
	$f = array('name' => 'john', 'sex' => 'male', 'age' => 46, 'job' => array ('driver', 'hitman'));
	echo $a.'<br>';
	echo $b; echo '<br>';
	echo $a+$b; echo '<br>';
	echo $c; echo '<br>';
	echo $d; echo '<br>';
	echo $f['job'][1];echo '<br>';
	echo $f['name']." ".$f['job'][0].' ' .$f['age'].'<br>';
	for ($i = 0; $i < 5; $i++) {
		echo $e[$i]; echo ' ';
	}
	if ($a == 100) {
	echo "a = 100";
	}
	else 
		echo "a != 100";echo '<br>';
	define ("j", 140);
	echo j."<br>";
	echo rand (0,10)."<br>";
	$a1=array(array(1,21,45,"petrov"),array(2,10,"ivanov"),array(3,"john"));
	for ($i=0; $i<count($a1);$i++){
		for ($j=0; $j<count($a1[$i]);$j++){
			echo $a1[$i][$j]." ";
		}
		echo "<br>";
	}
	function SayHello($lf){
		echo "слово это:".$lf."<br>";
	}
		
		$str=" here is jonny!";
		SayHello($str);
		
		function normalizeUrl($str){      /*принимает адрес сайта и возвращает его с https:// в начале*/
			if (strpos($str, 'http://')===0)
				return substr_replace($str,'https://',0,7);
			elseif(strpos($str, 'https://')===0)
				return $str;
			elseif(strpos($str, 'http')===false)
				return 'https://'.$str;
			}
			print_r(normalizeUrl('google'));
			
		function isArgumentsForSubstrCorrect($str, $i, $l){ 	/* функция проверка на корректность передаваемых данных 
																(Отрицательная длина извлекаемой подстроки
																Отрицательный заданный индекс
																Заданный индекс выходит за границу всей строки
																Длина подстроки в сумме с заданным индексом выходит за границу всей строки)*/
			if(($l<0)||($i<0)||($i>=strlen($str))||(($i+$l)>strlen($str)))
				return false;
			else
				return true;
		}
		
		function invertCase($text){ //ф-я инвертирует размер букв (рус.яз)
   
		$a='';
		for ($i=0;$i<mb_strlen($text); $i++){
			if(mb_substr($text,$i,1)==mb_strtolower(mb_substr($text,$i,1)))
				$a=$a.mb_strtoupper(mb_substr($text,$i,1));
			else
				$a=$a.mb_strtolower(mb_substr($text,$i,1));
		}
		return $a;
		}
		
	function isPalindrome($text){ //проверка слова на полиндром
		$a='';
		for ($i=0; $i<ceil(strlen($text)/2); $i++){
			if ($text[$i]===$text[strlen($text)-1-$i])
				$a=$a.'1';
			else
				$a=$a.'0';
		}
		if (stripos($a,'0')===false)
			return true;
		else
			return false;
	}
    
	function reverse(int $num): int { //ф-я переворачивает цифры в числе

    $reverse = (int) strrev((string) abs($num));
    return $num >= 0 ? $reverse : -$reverse;
	}
		
		$connection=mysqli_connect('127.0.0.1', 'root', '', 'testdb');
		if ($connection==false){
			echo "Не удалось подключиться к БД<br>";
			echo mysqli_connect_error();
			exit();
		}
		$result = mysqli_query ($connection, "SELECT * FROM `department`");
		echo "записей всего: ". mysqli_num_rows ($result)."<br>";
		
		/*while (($r1 = mysqli_fetch_assoc($result))){
		print_r ($r1['description']);
		echo '<br>';
		}*/
		echo '<hr>';
?>
<ul>
	<?php
		while (($cat=mysqli_fetch_assoc($result))){
			$users_count = mysqli_query($connection, "SELECT COUNT(`id`) as `count`  FROM `user_position` WHERE `department_id`=" . $cat['id']);
			$users_count_res = mysqli_fetch_assoc($users_count);
			echo '<li>'.$cat['name'].' ('. $users_count_res['count'].')'. '</li>';
		}
	?>
</ul>		
<?php		
		mysqli_close($connection);
?>
<hr>
<form method="POST" action="handle.php">
	<input type= "text" placeholder="Ваш логин" name="login"> 
	<input type= "text" placeholder="Ваш пароль" name="pass"> 
	<input type= "submit" value="Отправить">
</form>