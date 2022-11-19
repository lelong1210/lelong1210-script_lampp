<?php
class admin extends controller{
    function show(){
        $model = $this->call_model("homeModel");
        $this->call_view("admin",[
            "model"=>$model
            
        ]);
    }
}
?>