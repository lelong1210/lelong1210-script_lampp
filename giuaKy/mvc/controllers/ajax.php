<?php 
class ajax extends controller{
    function show(){
        echo "xinchao";
    }
    function showAllStudent(){
        $model = $this->call_model("homeModel");
        $model->showAllStudent();
    }
    function  addStudents(){
        $tennhanvien = $_POST["tennhanvien"];
        $ngaysinh = $_POST["ngaysinh"];
        $quequan= $_POST["quequan"];
        $luong = $_POST["luong"];
        $model = $this->call_model("homeModel");
        echo $model->addStudents($tennhanvien,$ngaysinh,$quequan,$luong);
    }
    function deleteStudent(){
        $masv = $_POST["masv"];
        $model = $this->call_model("homeModel");
        echo $model->deleteStudent($masv);
    }

    function updateStudents(){
        $masv = $_POST["masv"];
        $tennhanvien = $_POST["tennhanvien"];
        $ngaysinh = $_POST["ngaysinh"];
        $quequan= $_POST["quequan"];
        $luong = $_POST["luong"];
        $model = $this->call_model("homeModel");
        echo $model->updateStudents($masv,$tennhanvien,$ngaysinh,$quequan,$luong);
    }
    function showFormInputSuaWhere(){
        $model = $this->call_model("homeModel");
        $model->showFormInputSuaWhere();        
    }
    function selectOneStudents(){
        $masv = $_POST["masv"];
        $model = $this->call_model("homeModel");
        if($model->selectOneStudents($masv)){
            $model->showFormInputSua($masv);
        }else{
            echo false;
        }       
    }

    function selectOneStudentsWhereluong(){
        $luong = $_POST["luongtim"];
        $model = $this->call_model("homeModel");
        echo $model->showAllStudentWhereluong($luong);
    }
}
?>