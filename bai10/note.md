## OOP 
    - Dùng để lập trình hướng đối tượng

## Class
    - Class: là một bản thiết kế hoặc mô hình để tạo ra các đối tượng 
      nó định ra các thuộc tính Properties và phuong thức method của một đối tượng cụ thể 
    - Ví dụ:
    
        class Fullname {
            public $firstName;
            public $lastName;

            public function displayInfo() {
                echo "Nguyễn văn " . $this->firstName . "<br>";
                echo "Đặng thị " . $this->lastName . "<br>";
            }
        }

        + Tạo đối tượng từ lớp Fullname
        $fullname = new Fullname();

        // Gán giá trị cho các thuộc tính
        $fullname->firstName = "Lượng";
        $fullname->lastName = "Ngọc";

        + Gọi phương thức để hiển thị thông tin họ và tên đầy đủ
        $fullname->displayInfo();

## Object
    - Object hay còn gọi là đối tượng , trong PHP nó là một tập hợp các
     thuộc tính cụ thể nào đó cho một đối tượng cụ thể.

## property
    -Property là thành phần chứa dữ liệu của opject, khi xây dựng class, property được thể hiện
    như khai báo biến thông thường trong php.
    - Ví dụ:
    <?php
        class Employee
        {
        private $fullname;
        private $email;
        private $address;
        
        public function __construct($fullname, $email, $address)
        {
            $this->fullname = $fullname;
            $this->email = $email;
            $this->address = $address;
            }
            public function getFirstName()
            {
                return $this->fullname;
            }

            public function getLastName()
            {
                return $this->email;
            }

            public function getaddress()
            {
                return $this->address;
            }

        }
    ?>

## method
    - Là một hành động hoặc hàm được định nghĩa trong một lớp. Phương thức thực hiện các công việc cụ thể và có thể truy cập và làm việc với các thuộc tính và các phương thức khác trong cùng lớp.
    - Ví dụ:
    <?php

        class FullName {
            private $firstName;
            private $lastName;

            public function __construct($firstName, $lastName) {
                $this->firstName = $firstName;
                $this->lastName = $lastName;
            }

            public function getFullName() {
                return $this->firstName . " " . $this->lastName;
            }
        }

        // Tạo đối tượng từ lớp FullName
        $name = new FullName("Nguyễn", "Lượng");

        // Gọi phương thức để lấy đầy đủ tên
        $fullName = $name->getFullName();

        echo "Họ Và Tên: " . $fullName; 
    ?>

## public:
    - Thuộc tính và phương thức có thể được truy cập ở bất cứ đâu.
    
## protected:
    - Thuộc tính và phương thức chỉ có thể được truy cập bên trong lớp
     hoặc bên trong các lớp được kế thừa từ lớp này

## private:
    - Thuộc tính và phương thức chỉ có thể được truy cập bên trong lớp.
   
    * Ví Dụ:
        <?php
            class fullname{
                public $name;
                protected $email;
                private $address;
            }
            $asus = new fullname();
            $asus->name = "Nguyễn Lượng"; //có thể truy cập 
            echo $user->name;
            $asus->email = "aaaa@gamil.com"; //không truy cập được
            echo $user->email;
            $asus->address = "vĩnh phúc"; //không truy cập được
            echo $user->address;
        ?>

## static:
    - Khai báo các thuộc tính và phương thức của lớp lad static sẽ giúp ta có thể truy cập các thành phần mà ko cần tạo thể hiện của lớp tương ứng , một thuộc tính được khia báo là static thì không thể truy câpj thông qua thể hiện của đối tượng của lớp tuowg ứng phương thức static thì có thể.
    - ví dụ:
    <?php
        class heloWord{
            public static function welcome(){
                echo "Chào cả nhà";
            }
        }
        heloWord::welcome();
   ?>

## extends, parent:
    - Dùng để kế thừa nó sẽ thừa hưởng tất cả các thuộc tính và phương thức thuộc loại public và protected của lớp cha, ngoài ra thì lớp con có thể sở hữu các thuộc tính & phương thức của riêng nó.
    - ví dụ:
    <?php
	class student{
		public $name;
		public $email;
        public $address;    
		public function __construct($input_name, $input_email, $input_address)
        {
			$this->name = $input_name;
			$this->email = $input_email;
			$this->address = $input_address;
		}

		public function intro()

        {
			echo "Tôi tên là: {$this->name}</br> sinh năm: {$this->email}</br> Địa chỉ: {$this->address}";
		}
	}
    
	class users extends student
    {

		public function message()
        {
			echo "xin chào!<br>";
		}

	}

	$user = new users("Nguyễn Văn Lượng",1997,"Vĩnh phúc");
	$user->message();
	$user->intro();
?>

## clone (object)
    - Được sử dụng để tạo ra 1 bản sao độc lập của 1 đối tượng hiện có khi ta clone 1 bản sao mới sẽ được tạo ra và bao gồm các thuộc tính và phương thức của đối tượng gốc, và khi ta thay đổi nó sẽ ko ảnh hưởng đến nhau.
    - ví dụ:
    $student2 = clone $student1; thay đổi phương thức thuộc tính của $student2 sẽ không ảnh hưởng đên $student1

## trait (liên quan đến đa kế thừa)
    - Nó khai báo cũng giống như class nhưng giúp chúng ta tái sử dụng code đơn giản hơn là kế thừa, để sử dụng một trait trong lớp thì ta dùng từ khóa use.
    -ví dụ:
    <?php
        trait student{
            public $name;
            public $year;
            function __construct($input_name, $input_year){
                $this->name = $input_name;
                $this->year = $input_year;
            }
        }
        class User{
            use student;
            function intro(){
                echo "Tôi tên {$this->name}, sinh năm {$this->year} !";
            }
        }
        $Information = new User("Lượng", 1997);
        $Information->intro();
    ?>

## final (Chống override, không cho phép kế thừa)
    - giúp ta ngăn cản không cho lớp con ghi đè phương thức bằng cách đặt trước định nghĩa phương thức đó bằng từ khóa (final) nếu bản thân lớp được định nghĩa là final thì nó không cho phép kế thừa.
    - ví dụ:
    <?php
        class ParentClass 
        {
            public final function goodbye() //thêm từ khóa final sẽ ngăn cản ko cho phép ghi đè
            {
                echo "xin chào bbb";
            }
        }

        class ChildClass extends ParentClass 
        {
            public function goodbye() 
            {
                echo "Hello from ChildClass!\n";
            }
        }

        $content = new ParentClass;
        $content->goodbye();
    ?>

## abstract: Lớp trừu tượng, phương thức trừu tượng
    - Các phương thức trừu tượng trong lớp cha phải được khai báo lại bên trong lớp con
    - Phạm vi truy cập của các phương thức trừu tượng được khai báo lại bên trong lớp con phải từ bằng hoặc ít hạn chế hơn
    -Số lượng đối số bắt buộc phải giống nhau tuy nhiên lớp con có thể có thêm các đối số tùy chọn

    - phần này e đang tìm hiểu thêm 