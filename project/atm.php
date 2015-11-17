<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<b>

ให้เขียนโปรแกรมตู้ ATM ครับ โดยกำหนดให้มีเงินอยู่ในตู้ 23,000 บาท แบ่งเป็น แบงค์พัน 10 ใบ แบงค์ 500 20 ใบ แบงค์ 100 30 ใบ

โดยให้เขียนโปรแกรมเพื่อรับจำนวนเงินที่จะถอน จากนั้นโปรแกรมจะแสดงจำนวนแบงค์ที่ออกมา ซึ่งแบงค์พันจะออกก่อน แล้วก็แบงค์ 500 100 ตามลำดับ

</b><hr>

<?

function p_mony($m_price,$p_price){

	return floor($p_price/$m_price);

}

if($action=='process'){

	$m1000=10;

	$m500=20;

	$m100=30;

	echo 'คุณต้องการถอนเงิน จำนวน'.number_format($price).' บาท.<br>';

	if($price<100 or $price>23000){

		echo 'ขออภัยค่ะ จำนวนเงินที่ระบุไม่สามารถถอนได้ค่ะ...กรุณาระบุจำนวนระหว่าง 100-23,000 บาทด้วยค่ะ';

	}else{

		if(strlen($price)==5){ //หลักหมื่น

			

				$output='แบงค์ 1000 '.p_mony('1000',$m1000*1000).' ใบ<br>';

				$price=$price-(1000*p_mony('1000',$m1000*1000));

				$m1000=0;

				

				if(strlen($price)==5){

					$output.='แบงค์ 500 '.p_mony('500',$m500*500).' ใบ<br>';

					$price=$price-(500*p_mony('500',$m500*500));

					$m500=0;

				}

		}

		

		if(strlen($price)==4){ //หลักพัน

			if($m1000!=0){

				$output.='แบงค์ 1000 '.p_mony('1000',$price).' ใบ<br>';

				$price=$price-(1000*p_mony('1000',$price));

			}else{

				if($m500!=0){

				$output.='แบงค์ 500 '.p_mony('500',$price).' ใบ<br>';

				$price=$price-(500*p_mony('500',$price));

				}

			}

		}

		

		if((strlen($price)==3)){ //หลักร้อย

			if($price<500){

				$output.='แบงค์ 100 '.p_mony('100',$price).' ใบ<br>';

			}else{

				$output.='แบงค์ 500 '.p_mony('500',$price).' ใบ<br>';

				$price=$price-(500*p_mony('500',$price));

				if($price!=0) $output.='แบงค์ 100 '.p_mony('100',$price).' ใบ<br>';

			}

		}

		

		if($m500==0 and $price!=0){

			$output.='แบงค์ 100 '.p_mony('100',$price).' ใบ<br>';

		}

		echo $output;

	}

}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>

<title>ฝึกเขียนโโปรแกรมถอนเงินจากตู้ ATM</title>

</head>




<body>

<form id="form1" name="form1" method="post" action="ATM.php?action=process">

  <input type="text" name="price" onKeyUp="if(this.value*1!=this.value) this.value='' ;" />

  <input type="submit" name="Submit" value="Submit" />

</form>

</body>

</html>