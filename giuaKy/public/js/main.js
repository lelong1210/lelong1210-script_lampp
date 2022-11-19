$(document).ready(function () {
    $("#reLoad").click(function (e) { 
        $.post("./ajax/showAllStudent",{},function(data){
            $("#con").html(data);
        });
    });
    $("#An").click(function (e) { 
        $("#con").html("An");
    });
    $("#Hien").click(function (e) { 
        $.post("./ajax/showAllStudent",{},function(data){
            $("#con").html(data);
        });
    });


    /*******************THEM***********************/
    $("#showinputThem").click(function (e) { 
        $("#inputSV").slideDown();
    });
    $("#them").click(function (e) { 
        var tennhanvien = $("#tennhanvienthem").val();
        var ngaysinh = $("#ngaysinhthem").val();	
        var quequan	= $("#quequanthem").val();
        var luong = $("#luongthem").val();
        if(tennhanvien == "" || ngaysinh == "" || quequan == "" || luong == ""){
            alert("cac o khong duoc de trong");
        }else{
            $.post("./ajax/addStudents",{tennhanvien:tennhanvien,ngaysinh:ngaysinh,quequan:quequan,luong:luong},function(data){
                if(data){
                    alert("da them");
                    $("#inputSV").slideUp();
                    $.post("./ajax/showAllStudent",{},function(data){
                        $("#con").html(data);
                    });
                    $("#tennhanvienthem").val("");
                    $("#ngaysinhthem").val("");	
                    $("#quequanthem").val("");
                    $("#luongthem").val("");
                    $("#khoathem").val("");
                    $("#trangthaithem").val("");
                }else{
                    alert("that bai");
                    $("#inputSV").slideUp();
                }
            });
        }
    });
    /*******************XOA***********************/
    $("#showinputXoa").click(function (e) { 
        $("#inputXoa").slideDown();
    });
    $("#xoa").click(function (e) { 
        var masv = $("#manhanvienxoa").val();
        $.post("./ajax/deleteStudent",{masv:masv},function(data){
            if(data){
                alert("da xoa");
                $("#inputXoa").slideUp();
                $("#idxoa").val("");
                $.post("./ajax/showAllStudent",{},function(data){
                    $("#con").html(data);
                });
            }else{
                alert("that bai");
                $("#inputXoa").slideUp();
            }
        });
    });
    /*******************SUA***********************/
    var chot = 0 ;
    $("#showinputSua").click(function (e) { 
        // $("#inputSua").html();
        $("#inputSua").slideDown();
    });
    $("#suaWhere").click(function (e) { 
        var masv = $("#suaTai").val();
        $.post("./ajax/selectOneStudents",{masv:masv},function(data){
            if(data){
                $("#inputSua").html(data);
                $("#sua").click(function (e) { 
                    Update(masv);
                    $("#inputSua").slideUp();
                });
            }else{
                alert("khong ton tai");
            }
        });
    });
    function Update(masv){
        var tennhanvien = $("#tennhanviensua").val();
        var ngaysinh = $("#ngaysinhsua").val();	
        var quequan	= $("#quequansua").val();
        var luong = $("#luongsua").val();
        if(tennhanvien == "" || ngaysinh == "" || quequan == "" || luong == ""){
            alert("cac o khong duoc de trong");
        }else{
            // alert(tennhanvien + ngaysinh + quequan + luong + khoa + trangthai);
            $.post("./ajax/updateStudents",{masv:masv,tennhanvien:tennhanvien,ngaysinh:ngaysinh,quequan:quequan,luong:luong},function(data){
                if(data){
                    alert("da sua");
                    $("#inputSua").slideUp();
                    $.post("./ajax/showAllStudent",{},function(data){
                        $("#con").html(data);
                    });
                    $("#tennhanviensua").val("");
                    $("#ngaysinhsua").val("");	
                    $("#quequansua").val("");
                    $("#luongsua").val("");
                    location.reload();
                }else{
                    alert("that bai");
                    $("#inputSua").slideUp();
                }
            });
        }
    }
     /*******************TIM KIEM***********************/
    $("#showinputTimKiem").click(function (e) { 
        $("#inputTimKiem").slideDown();
    });
    $("#timkiem").click(function (e) { 
        var timkiem = $("#timkiemWhere").val();
        $.post("./ajax/selectOneStudentsWhereluong",{luongtim:timkiem},function(data){
            // alert(data);
            if(data){
                $("#con").html(data);
                $("#inputTimKiem").slideUp();
                $("#timkiemWhere").val("");
            }else{
                alert("không tồn tại nhân viên có luong lớn hơn : "+timkiem);
                $("#inputTimKiem").slideUp();
                $("#timkiemWhere").val("");
            }
        });
    });
});