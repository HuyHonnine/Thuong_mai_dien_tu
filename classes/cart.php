<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>


<?php
class cart
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }
    public function add_to_cart($quantity,$id){
        $quantity = $this->fm->validation($quantity);
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $id = mysqli_real_escape_string($this->db->link, $id);
        $sId = session_id();

        $query="SELECT * from tbl_product where productId = '$id'";
        $result = $this->db->select($query)->fetch_assoc();
        
        $image = $result["image"];
        $price = $result["price"];
        $productName = $result["productName"];
        
        $check_cart = "SELECT * FROM tbl_cart WHERE productId = '$id' and sId = '$sId'";
        $result_check = $this->db->select($check_cart);
        if($result_check){
            $msg = "<span class='erorr'>Product Alread Added</span>";
            return $msg;
        } 
        else {
            $query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName) VALUES('$id', '$quantity','$sId','$image','$price','$productName')";
            $insert_cart = $this->db->insert($query_insert);
            if ($insert_cart ) {
                echo "<script> window.location.href='cart.php';</script>";

            } else {
                echo "<script> window.location.href='404.php';</script>";
            }
        }
    }
    public function get_cart(){
        $sId = session_id();
        $query = "SELECT * from tbl_cart where sId = '$sId'"; 
        $result = $this->db->select($query);
        return $result;
    }
    public function update_quantity_cart($quantity, $cartId){
        $quantity = mysqli_real_escape_string($this->db->link, $quantity);
        $cartId = mysqli_real_escape_string($this->db->link, $cartId);
        $query = "UPDATE tbl_cart SET quantity= '$quantity' WHERE cartId = '$cartId'";
        $result = $this->db->update($query);
        if($result){
            echo "<script> window.location.href='cart.php';</script>";
        }
        else{            
            $msg = "<span class='erorr'>Product Quantity Update Successfully</span>";
            return $msg;
        }
    }
    public function del_product_cart($cartid){
    $cartid = mysqli_real_escape_string($this->db->link, $cartid);
    $query = "DELETE FROM tbl_cart WHERE cartId = '$cartid'"; 
    $result = $this->db->delete($query);
    if($result){
        echo "<script> window.location.href='cart.php';</script>";
    }
    else{
        $msg = "<span class='erorr'>Xóa sản phẩm không thành công</span>";
        return $msg;
    }
}
public function check_cart(){
    $sId = session_id();
    $query = "SELECT * from tbl_cart where sId = '$sId'"; 
    $result = $this->db->select($query);
    return $result; 
}

public function dell_data_cart(){
    $sId = session_id();
    $query = "DELETE from tbl_cart where sId = '$sId'"; 
    $result = $this->db->delete($query);
    return $result; 
}
public function insert_order($customer_id){
    $sId = session_id();
    $query = "SELECT * from tbl_cart where sId = '$sId'"; 
    $get_product = $this->db->select($query);
    if($get_product){
        while ($result = $get_product->fetch_assoc()){
            $productId = $result['productId'];
            $productName = $result['productName'];
            $quantity = $result['quantity'];
            $price = $result['price']*$quantity;
            $image = $result['image'];
            $customer_id = $customer_id;
            
            $query_order = "INSERT INTO tbl_orderr(productId, productName, quantity, price, image, customer_id) VALUES('$productId', '$productName', '$quantity', '$price', '$image', '$customer_id')";
            $insert_order = $this->db->insert($query_order);
        }
        
    }
}
public function get_amout($customer_id){
    $query = "SELECT price FROM tbl_orderr WHERE customer_id = '$customer_id'"; 
    $get_price = $this->db->select($query);
    return $get_price; 
}
public function get_cart_order($customer_id){
    $query = "SELECT * FROM tbl_orderr WHERE customer_id = '$customer_id'"; 
    $get_cart_order = $this->db->select($query);
    return $get_cart_order; 
}

public function get_inbox_cart(){
    $query = "SELECT * FROM tbl_orderr ORDER BY date_order"; 
    $get_inbox_cart = $this->db->select($query);
    return $get_inbox_cart; 
}

public function shifted($id, $time, $price){
    $time = mysqli_real_escape_string($this->db->link, $time);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "UPDATE tbl_orderr SET status = '1' WHERE id = '$id' AND price = '$price' AND date_order = '$time'";
    $result = $this->db->update($query);
    if($result){
        $msg = "<span class='success'>Cập nhật đơn hàng thành công</span>";
        return $msg;    
    }
    else {
        $msg = "<span class='erorr'>Cập nhật đơn hàng không thành công</span>";
        return $msg;  
    }
}

public function del_shifted($id, $time, $price){
    $time = mysqli_real_escape_string($this->db->link, $time);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "DELETE FROM tbl_orderr WHERE id = '$id' AND price = '$price' AND date_order = '$time'";
    $result = $this->db->update($query);
    if($result){
        $msg = "<span class='success'>Xóa đơn hàng thành công</span>";
        return $msg;    
    }
    else {
        $msg = "<span class='erorr'>Xóa đơn hàng không thành công</span>";
        return $msg;  
    }
}

public function shifted_confirm($id, $time, $price){
    $time = mysqli_real_escape_string($this->db->link, $time);
    $id = mysqli_real_escape_string($this->db->link, $id);
    $price = mysqli_real_escape_string($this->db->link, $price);
    $query = "UPDATE tbl_orderr SET status = '2' WHERE customer_id = '$id' AND price = '$price' AND date_order = '$time'";
    $result = $this->db->update($query);
    return $result;
}
}
?>