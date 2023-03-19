<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>
<?php
class customer
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    
    public function insert_csr($data){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $country = mysqli_real_escape_string($this->db->link, $data['country']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        
        if ($name == "" || $city == "" || $zipcode == "" || $email == "" || $address == "" || $phone == "" || $password == "") {
            $alert = "<span class='erorr'>Các ô không để trống!</span>";
            return $alert;
        } else {
            $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' limit 1";
            $result_check = $this->db->select($check_email);
            if ($result_check) {
                $alert = "<span class='erorr'>Email đã được sử dụng</span>";
                return $alert;
            } else {
                    $query = "INSERT INTO tbl_customer(name, city, zipcode, email, address, country, phone, password) VALUES('$name', '$city','$zipcode','$email','$address','$country','$phone','$password')";
                    $result = $this->db->insert($query);
                    if ($result) {
                        $alert = "<span class='success'>Tạo tài khoản thành công</span>";
                        return $alert;
                    } else {
                        $alert = "<span class='erorr'>Tạo tài khoản không thành công</span>";
                        return $alert;
                    }
            }
                
        }
           
    }
    public function login_cs($data){
        $email = mysqli_real_escape_string($this->db->link, $data['email']);
        $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
        if ($email == "" || $password == "") {
            $alert = "<span class='erorr'>Email và Password không được để trống!</span>";
            return $alert;
        } else {
            $check_login = "SELECT * FROM tbl_customer WHERE email = '$email' and password = '$password'";
            $result_check = $this->db->select($check_login);
            if ($result_check != false) {
                $value = $result_check->fetch_assoc();
                Session::set('customer_login', true);
                Session::set('customer_id', $value['id']);
                Session::set('customer_name', $value['name']);
                echo "<script> window.location.href='index.php';</script>";
            } else {
                $alert = "<span class='erorr'>Email hoặc Mật Khẩu không trùng khớp</span>";
                return $alert;
                }   
            }
    }
    public function show_cs($id){
        $query = "SELECT * FROM tbl_customer WHERE id='$id'";
        $result = $this->db->insert($query);
        return $result;
    }
    public function update_cs($data, $id){
        $name = mysqli_real_escape_string($this->db->link, $data['name']);
        $city = mysqli_real_escape_string($this->db->link, $data['city']);
        $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
        $email= mysqli_real_escape_string($this->db->link, $data['email']);
        $address = mysqli_real_escape_string($this->db->link, $data['address']);
        $phone = mysqli_real_escape_string($this->db->link, $data['phone']);        
        if ($name == ""|| $city=="" || $zipcode == "" || $email == "" || $address == "" || $phone == "") {
            $alert = "<span class='erorr'>Fiels must be not empty</span>";
            return $alert;
        } else {
            $query = "UPDATE tbl_customer SET name='$name', city='$city', zipcode='$zipcode', email='$email', address='$address', phone='$phone' WHERE id ='$id'";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Customer Update Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='erorr'>Customer Update not Success</span>";
                return $alert;
            }       
        }   
    }
}
?>