<?php
class timkiem extends controller{
    function show(){
        $model = $this->call_model("homeModel");
        $this->call_view("timkiemView",[
            "model"=>$model
            
        ]);
    }
}
?>