<?php
$filepath = realpath(dirname(__FILE__));
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>


<?php
class product
{
    private $db;
    private $fm;

    public function __construct()
    {
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function insert_product($data, $files)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $typee = mysqli_real_escape_string($this->db->link, $data['typee']);
        // kiem tra hinh anh va lay hinh anh cho vao folder updload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $price == "" || $typee == "" || $product_desc == "" || $file_name == "") {
            $alert = "<span class='error'>Fiels must be not empty</span>";
            return $alert;
        } else {
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_product(productName, catId, brandId, product_desc, price, typee, image) VALUES('$productName', '$category','$brand','$product_desc','$price','$typee','$unique_image')";
            $result = $this->db->insert($query);
            if ($result) {
                $alert = "<span class='success'>Insert Product Successfully</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Insert Product not Success</span>";
                return $alert;
            }
        }
    }

    public function show_product()
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
                FROM tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId 
                                inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId 
                order by tbl_product.productId desc";
        // $query = "SELECT * FROM tbl_product order by productId desc";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproductbyId($id)
    {
        $query = "SELECT * FROM tbl_product where productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function update_product($data, $files, $id)
    {
        $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
        $category = mysqli_real_escape_string($this->db->link, $data['category']);
        $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
        $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
        $price = mysqli_real_escape_string($this->db->link, $data['price']);
        $typee = mysqli_real_escape_string($this->db->link, $data['typee']);
        // kiem tra hinh anh va lay hinh anh cho vao folder updload
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "uploads/" . $unique_image;

        if ($productName == "" || $brand == "" || $category == "" || $price == "" || $typee == "" || $product_desc == "") {
            $alert = "<span class='error'>Không được để trống</span>";
            return $alert;
        } else {
            if (!empty($file_ext)) {
                // nếu chọn ảnh
                if ($file_size > 20480) {
                    $alert = "<span class='success'>Hình ảnh không lớn hơn 20MB!</span>";
                    return $alert;
                } elseif (in_array($file_ext, $permited) == false) {
                    // echo "<span class='error'>You can upload only:-" . implode(',', $permited) . "</span>";
                    $alert = "<span class='success'>You can upload only:-" . implode(',', $permited) . "</span>";
                    return $alert;
                }
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand',
                catId = '$category', 
                typee = '$typee', 
                price = '$price', 
                image = '$unique_image', 
                product_desc = '$product_desc ' 
                WHERE productId = '$id' ";
            } else {
                // nếu không chọn ảnh
                $query = "UPDATE tbl_product SET 
                productName = '$productName',
                brandId = '$brand', 
                catId = '$category', 
                typee = '$typee', 
                price = '$price', 
                product_desc = '$product_desc ' 
                WHERE productId = '$id' ";
            }
            $result = $this->db->update($query);
            if ($result) {
                $alert = "<span class='success'>Cập nhật sản phẩm thành công</span>";
                return $alert;
            } else {
                $alert = "<span class='error'>Cập nhật sản phẩm không thành công</span>";
                return $alert;
            }
        }
    }

    public function del_product($id)
    {
        $query = "DELETE FROM tbl_product where productId = '$id'";
        $result = $this->db->delete($query);

        if ($result) {
            $alert = "<span class='success'>Xóa sản phẩm thành công</span>";
            return $alert;
        } else {
            $alert = "<span class='error'>Xóa sản phẩm không thành công</span>";
            return $alert;
        }
    }

    //END BACKEND
    public function getproduct_fearthered()
    {
        $query = "SELECT * FROM tbl_product where typee = '1'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getproduct_new()
    {
        $query = "SELECT * FROM tbl_product order by productId desc Limit 5";
        $result = $this->db->select($query);
        return $result;
    }

    public function get_details($id)
    {
        $query = "SELECT tbl_product.*, tbl_category.catName, tbl_brand.brandName 
        FROM tbl_product inner join tbl_category on tbl_product.catId = tbl_category.catId 
        inner join tbl_brand on tbl_product.brandId = tbl_brand.brandId where tbl_product.productId = '$id'";
        $result = $this->db->select($query);
        return $result;
    }

    public function getLastestAp(){
        $query = "SELECT * FROM tbl_product where brandId = '7' order by productId desc Limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestSs(){
        $query = "SELECT * FROM tbl_product where brandId = '10' order by productId desc Limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestAcer(){
        $query = "SELECT * FROM tbl_product where brandId = '9' order by productId desc Limit 1";
        $result = $this->db->select($query);
        return $result;
    }
    public function getLastestCanon(){
        $query = "SELECT * FROM tbl_product where brandId = '8' order by productId desc Limit 1";
        $result = $this->db->select($query);
        return $result;
    }
}
?>