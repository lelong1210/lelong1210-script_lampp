<?php
class homeModel extends connectDB{
    // Data
    function selectAllStudents(){   
        $conn = $this->GetConn();
        $sql = "SELECT * FROM nhanvien";
        $query = $conn->prepare($sql);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }
    }
    function addStudents($tennhanvien,$ngaysinh,$quequan,$luong){
        $conn = $this->GetConn();
        $sql = "INSERT INTO nhanvien(tennhanvien, ngaysinh, quequan, luong) VALUES (:tennhanvien, :ngaysinh, :quequan, :luong)";
        $query = $conn->prepare($sql);
        $query->bindParam(":tennhanvien",$tennhanvien);
        $query->bindParam(":ngaysinh",$ngaysinh);
        $query->bindParam(":quequan",$quequan);
        $query->bindParam(":luong",$luong);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false ;
        }
    }
    function deleteStudent($manhanvien){
        $conn = $this->GetConn();
        $sql = "DELETE FROM nhanvien WHERE manhanvien = :manhanvien";
        $query = $conn->prepare($sql);
        $query->bindParam(":manhanvien",$manhanvien);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false ;
        }
    }
    function selectOneStudents($manhanvien){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM nhanvien WHERE manhanvien=:manhanvien";
        $query = $conn->prepare($sql);
        $query->bindParam(":manhanvien",$manhanvien);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else{
            return false;
        }
    }
    function updateStudents($manhanvien,$tennhanvien,$ngaysinh,$quequan,$luong){
        $conn = $this->GetConn();
        $sql = "UPDATE nhanvien SET tennhanvien = :tennhanvien, ngaysinh = :ngaysinh, quequan = :quequan, luong = :luong WHERE manhanvien = :manhanvien";
        $query = $conn->prepare($sql);
        $query->bindParam(":manhanvien",$manhanvien);
        $query->bindParam(":tennhanvien",$tennhanvien);
        $query->bindParam(":ngaysinh",$ngaysinh);
        $query->bindParam(":quequan",$quequan);
        $query->bindParam(":luong",$luong);
        $query->execute();
        if($query->rowCount() > 0){
            return true ;
        }else{
            return false;
        }
    }
    function selectOneStudentsWhereluong($luong){
        $conn = $this->GetConn();
        $sql = "SELECT * FROM nhanvien WHERE luong >= :luong";
        $query = $conn->prepare($sql);
        $query->bindParam(":luong",$luong);
        $query->execute();
        if($query->rowCount() > 0){
            $result = $query->fetchAll(PDO::FETCH_ASSOC);
            return json_encode($result);
        }else{
            return false;
        }
    }





    // View 
    function showAllStudent(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $count = count($arr);
        $countTitle = count($arrTitle);
        echo "<table class='table'>";
            echo "<tr>";
                for ($i=0; $i < $countTitle; $i++) { 
                    echo "<th>$arrTitle[$i]</th>";
                }
            echo "</tr>";
            for ($i=0; $i < $count; $i++) { 
                echo "<tr>";
                    $arrChild = array_values((array)$arr[$i]);
                    for ($j=0; $j < $countTitle; $j++) { 
                        echo "<td>$arrChild[$j]</td>";
                    }
                echo "</tr>";
            }
        echo "</table>";
    }
    function getTitle($arr){
        return $arrTitle = array_keys((array)$arr[0]);
    }
    function showFormInput(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=1; $i < $countTitle; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='$arrTitle[$i]them'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='them'>Thêm</button>";   
    }
    function showFormInputXoa(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='$arrTitle[$i]xoa'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='xoa'>Xóa</button>";          
    }
    function showFormInputSuaWhere(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='suaTai' placeholder='nhập mã sinh viên muốn Sửa...'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='suaWhere'>Đi</button>";    
    }
    function showFormInputSua($manhanvien){
        $arrContent = array_values((array)json_decode($this->selectOneStudents($manhanvien)));
        $arrContent = array_values((array)$arrContent[0]);
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=1; $i < $countTitle; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[$i]</th>";
                    echo "<th><input type='text' id='$arrTitle[$i]sua' value='$arrContent[$i]' ></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='sua'>Sửa</button>"; 
    }

    function showAllStudentWhereluong($luong){
        $arr = array_values((array)json_decode($this->selectOneStudentsWhereluong($luong)));
        $count = count($arr);
        if($count > 0){
            $arrTitle = $this->getTitle($arr);
            $countTitle = count($arrTitle);
            echo "<table class='table'>";
                echo "<tr>";
                    for ($i=0; $i < $countTitle; $i++) { 
                        echo "<th>$arrTitle[$i]</th>";
                    }
                echo "</tr>";
                for ($i=0; $i < $count; $i++) { 
                    echo "<tr>";
                        $arrChild = array_values((array)$arr[$i]);
                        for ($j=0; $j < $countTitle; $j++) { 
                            echo "<td>$arrChild[$j]</td>";
                        }
                    echo "</tr>";
                }
            echo "</table>";
        }else{
            return false;
        }
    }
    function showFormInputTimKiem(){
        $arr = array_values((array)json_decode($this->selectAllStudents()));
        $arrTitle = $this->getTitle($arr);
        $countTitle = count($arrTitle);
        echo "<table>";
            for ($i=0; $i < 1; $i++) {
                echo "<tr>"; 
                    echo "<th>$arrTitle[4]</th>";
                    echo "<th><input type='text' id='timkiemWhere' placeholder='luong muốn tìm...'></th>";
                echo "</tr>";
            }
        echo "</table>";     
        echo "<button id='timkiem'>Đi</button>";       
    }
    
}
?>