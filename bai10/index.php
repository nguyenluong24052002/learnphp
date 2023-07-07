
<?php
	abstract class CongDan{
		abstract public function intro($name);
	}
	class SinhVien extends CongDan{
		public function intro($name="Không biết", $gender="Không rõ", $year="Trước công nguyên"){
			echo "- Họ tên: {$name}<br>";
			echo "- Giới tính: {$gender}<br>";
			echo "- Năm sinh: {$year}<hr>";
		}
	}
	$sv = new SinhVien();
	$sv->intro();
	$sv->intro("Nguyễn Thành Nhân");
	$sv->intro("Nguyễn Thành Nhân", "Nam");
	$sv->intro("Nguyễn Thành Nhân", "Nam", 1993);
?>