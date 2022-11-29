<?php
class ajax extends controller
{
    function show()
    {
        $ngaynhap = date("Y-m-d H:i:s");
        echo $ngaynhap;
        echo "<br>" . ceil(4.1);
    }
    // tai khoan //
    function dangky()
    {
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];
        $email = $_POST["email"];
        $quyen = $_POST["quyen"];
        $ngaythamgia = date("Y-m-d");
        $matkhau = md5($matkhau);

        $model = $this->call_model("taikhoanModel");
        echo $model->dangky($tendangnhap, $matkhau, $email, $quyen, $ngaythamgia);
    }
    function dangnhap()
    {
        // echo "VAO DANG NHAP AJAX";
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];

        $matkhau = md5($matkhau);

        $productModel = $this->call_model("productModel");
        $model = $this->call_model("taikhoanModel");
        echo $model->dangnhap($tendangnhap, $matkhau, $productModel);
    }
    function checkAcount()
    {
        $tendangnhap = $_POST["tendangnhap"];

        $model = $this->call_model("taikhoanModel");
        echo $model->checkAcount($tendangnhap);
    }
    function updateAcount()
    {
        $tendangnhap = $_SESSION["username"];
        $tennguoidung = $_POST["tennguoidung"];
        $diachi = $_POST["diachi"];
        $sodienthoai = $_POST["sodienthoai"];
        $email = $_POST["email"];

        $model = $this->call_model("taikhoanModel");
        echo $model->updateAcount($tennguoidung, $diachi, $sodienthoai, $email, $tendangnhap);
    }
    function updatePassword()
    {
        $tendangnhap = $_SESSION["username"];
        $matkhau = $_POST["matkhau"];

        $matkhau = md5($matkhau);

        $model = $this->call_model("taikhoanModel");
        if ($model->updatePassword($tendangnhap, $matkhau)) {
            $_SESSION["password"] = $matkhau;
            echo true;
        } else {
            echo false;
        }
    }
    function insertAddressShipping()
    {
        $tendangnhap = $_SESSION["username"];
        $tentinh = $_POST["tentinh"];
        $tenhuyen = $_POST["tenhuyen"];
        $tenxa = $_POST["tenxa"];
        $sodienthoaigh = $_POST["sodienthoaigh"];
        $diachichitiet = $_POST["diachichitiet"];
        $model = $this->call_model("taikhoanModel");
        echo $model->insertAddressShipping($tendangnhap, $tentinh, $tenhuyen, $tenxa, $diachichitiet, $sodienthoaigh);
    }
    function deleteAddressShipping()
    {
        $madiachigiaohang = $_POST["madiachigiaohang"];
        $model = $this->call_model("taikhoanModel");
        echo $model->deleteAddressShipping($madiachigiaohang);
    }
    function editAddressShipping()
    {
        $tentinh = $_POST["tentinh"];
        $tenhuyen = $_POST["tenhuyen"];
        $tenxa = $_POST["tenxa"];
        $diachichitiet = $_POST["diachichitiet"];
        $sodienthoaigh = $_POST["sodienthoaigh"];
        $madiachigiaohang = $_POST["madiachigiaohang"];
        $madiachigiaohang = intval($madiachigiaohang);
        $model = $this->call_model("taikhoanModel");
        echo $model->editAddressShipping($tentinh, $tenhuyen, $tenxa, $diachichitiet, $madiachigiaohang, $sodienthoaigh);
    }
    function getSoLuongTrongGioHang()
    {
        $model = $this->call_model("taikhoanModel");
        $_SESSION["soluongtronggiohang"] = $model->getSoLuongTrongGioHang($_SESSION["username"] . "-gh");
        echo $_SESSION["soluongtronggiohang"];
    }
    function getSecSionSoLuongTrongGioHang()
    {
        if (isset($_SESSION["soluongtronggiohang"])) {
            echo $_SESSION["soluongtronggiohang"];
        } else {
            echo false;
        }
    }
    // cart
    function getsoluongSp(){
        $masp = $_POST["masp"];
        $model = $this->call_model("productModel");
        echo $model->getsoluongSp($masp);
    }
    function addProductInCart()
    {
        $masp = $_POST["masp"];
        $soluong = $_POST["soluong"];
        $soluong = intval($soluong);
        $model = $this->call_model("productModel");
        echo $model->addProductInCart($masp, $soluong);
    }
    function checklogin()
    {
        if (isset($_SESSION["username"]) && isset($_SESSION["quyen"])) {
            if ($_SESSION["quyen"] == 0) {
                echo true;
            } else {
                echo false;
            }
        } else {
            echo false;
        }
    }
    function updateDetailOfCart()
    {
        $masp = $_POST["masp"];
        $soluong = intval($_POST["soluong"]);
        $magiohang = $_SESSION["username"] . "-gh";
        $model = $this->call_model("productModel");
        echo $model->updateInDetailCart($masp, $magiohang, $soluong);
    }
    function deleteInDetailCart()
    {
        $masp = $_POST["masp"];
        $magiohang = $_SESSION["username"] . "-gh";
        $model = $this->call_model("productModel");
        echo $model->deleteInDetailCart($masp, $magiohang);
    }
    function updateSanPham()
    {
        $masp = $_POST["masp"];
        $soluongsp = $_POST["soluongsp"];
        $model = $this->call_model("productModel");
        echo $model->updateSanPham($masp, $soluongsp);
    }
    function setProductToPayment()
    {
        if (isset($_POST["arr"])) {
            $arr = $_POST["arr"];
            $_SESSION["thanhtoan"] = $arr;
            echo true;
        } else {
            echo false;
        }
    }
    // thanh toan
    function thanhtoan()
    {//
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $tendangnhap = $_SESSION["username"];
        $ngaymua = date("Y-m-d");
        $diachigiaohang = $_POST["diachigiaohang"];
        $arr = $_POST["arr"];
        $sodienthoaigh = $_POST["sodienthoaigh"];
        $phiship = $_POST["phiship"];
        $hinhthucthanhtoan = $_POST["hinhthucthanhtoan"];
        $model = $this->call_model("taikhoanModel");
        $productModel = $this->call_model("productModel");
        echo $model->thanhtoan($tendangnhap, $ngaymua, $diachigiaohang, $arr, $productModel, $sodienthoaigh, $phiship, $hinhthucthanhtoan);
    }
    // kiem tra da mua chua
    function checkSell()
    {
        $tendangnhap = $_SESSION["username"];
        $masp = $_POST["masp"];
        $model = $this->call_model("taikhoanModel");
        echo $model->checkSell($tendangnhap, $masp);
    }
    // danh gia san pham
    function danhgia()
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");

        $masp = $_POST["masp"];
        $tendangnhap = $_SESSION["username"];
        $ngaydanggia = date("Y-m-d");
        $sosao = $_POST["sosaodanhgia"];
        $noidung = $_POST["inputDanhgia"];
        $model = $this->call_model("taikhoanModel");
        echo $model->danhgia($masp, $tendangnhap, $noidung, $sosao, $ngaydanggia);
    }
    // danh gia nhan vie 
    function danhGiaVeNhanVien()
    {
        $mahd = $_POST["mahd"];
        $danhgiacuakhachhang = $_POST["danhgiacuakhachhang"];
        $model = $this->call_model("taikhoanModel");
        echo $model->danhGiaVeNhanVien($mahd, $danhgiacuakhachhang);
    }
    // upload file 
    function uploadfile()
    {
        $model = $this->call_model("uploadModel");
        $model->uploadImg();
    }
    // gui mail
    function selectProductWhereMasp()
    {
        $masp = $_POST["masp"];
        $model = $this->call_model("productModel");
        echo $model->SelectProductWhereMasp($masp);
    }
    // ====> quên mật khẩu
    // gui mail xac nhan 
    function guiKeyXacNhan()
    {
        $model = $this->call_model("guiMailModel");
        $taikhoanModel = $this->call_model("taikhoanModel");
        $tieude = "key Xac Nhan";
        $diachigui = $_POST["diachigui"];
        $tendangnhap = $_POST["tendangnhap"];
        $thoigiantao = date("Y-m-d H:i:s");
        $bodyconten = rand();
        if ($taikhoanModel->insertKey($diachigui, $bodyconten, $thoigiantao, $tendangnhap)) {
            echo $model->sendMailPass($tieude, $diachigui, $bodyconten);
        }
    }
    // kiem tra ten dang nhap va email
    function checkAcountAndEmail()
    {
        $diachigui = $_POST["diachigui"];
        $tendangnhap = $_POST["tendangnhap"];
        $taikhoanModel = $this->call_model("taikhoanModel");
        echo $taikhoanModel->checkAcountAndEmail($tendangnhap, $diachigui);
    }
    // kiem tra key 
    function checkKey()
    {
        $taikhoanModel = $this->call_model("taikhoanModel");
        $keyxacnhan = $_POST["keyxacnhan"];
        $diachigui = $_POST["diachigui"];
        $tendangnhap = $_POST["tendangnhap"];
        echo $taikhoanModel->checkKey($diachigui, $keyxacnhan, $tendangnhap);
    }
    // update pass reset
    function updatePasswordReset()
    {
        $tendangnhap = $_POST["tendangnhap"];
        $matkhau = $_POST["matkhau"];

        $matkhau = md5($matkhau);

        $model = $this->call_model("taikhoanModel");
        if ($model->updatePassword($tendangnhap, $matkhau)) {
            echo true;
        } else {
            echo false;
        }
    }
    // ====> kết quên mật khẩu
    // san pham
    function addProduct()
    {
        $tensp = $_POST["tensp"];
        $giatien = $_POST["giatien"];
        $loaisanpham = $_POST["loaisanpham"];
        $motasanpham = $_POST["motasanpham"];
        $linkduongdananh = $_POST["linkduongdananh"];
        $hangsx = $_POST["hangsanxuat"];
        $dunglamslider = $_POST["dunglamslider"];
        $soluongsp = $_POST["soluong"];
        $ngaynhap = date("Y-m-d");
        $model = $this->call_model("productModel");
        echo $model->AddProduct($tensp, $giatien, $loaisanpham, $motasanpham, $linkduongdananh, $hangsx, $dunglamslider, $soluongsp, $ngaynhap);
    }
    function updateProduct()
    {
        $masp = $_POST["masp"];
        $tensp = $_POST["tensp"];
        $giatien = $_POST["giatien"];
        $loaisanpham = $_POST["loaisanpham"];
        $motasanpham = $_POST["motasanpham"];
        $linkduongdananh = $_POST["linkduongdananh"];
        $hangsx = $_POST["hangsanxuat"];
        $dunglamslider = $_POST["dunglamslider"];
        $soluongsp = $_POST["soluong"];
        $ngaynhap = date("Y-m-d");
        $model = $this->call_model("productModel");
        echo $model->updateProduct($masp, $tensp, $giatien, $loaisanpham, $motasanpham, $linkduongdananh, $hangsx, $dunglamslider, $soluongsp, $ngaynhap);
    }
    function deleteProduct()
    {
        $masp = $_POST["masp"];
        $model = $this->call_model("productModel");
        echo $model->deleteProduct($masp); 
    }
    // function appendTableProduct()
    // {
    //     $model = $this->call_model("productModel");
    //     $this->call_view_page_admin("ajaxProduct_Up_De", [
    //         "productModel" => $model
    //     ]);
    //     $this->call_block_view_admin("jslink");
    // }
    // nhan vien
    function setCongViec()
    {
        $macv = $_POST["macv"];
        $tendangnhap = $_SESSION["username"];
        $thoigiannhancongviec = date("Y-m-d H:i:s");
        $danhancv = 1;
        $tiendo = 0;
        $model = $this->call_model("nhanvienModel");
        echo $model->setCongViec($macv, $tendangnhap, $thoigiannhancongviec, $danhancv, $tiendo);
    }
    function xacNhanXongCongViec()
    {
        $macv = $_POST["macv"];
        $thoigianxongcongviec = date("Y-m-d H:i:s");
        $model = $this->call_model("nhanvienModel");
        $tiendo = 1;
        $danhgiacuakhachhang = 0;
        echo $model->xacNhanXongCongViec($macv, $thoigianxongcongviec, $tiendo, $danhgiacuakhachhang);
    }
    // luong nhan vien
    function insertToLuong()
    {
        $soluong = $_POST["soluong"];
        $macv = $_POST["macv"];
        $thoigian = date("Y-m-d H:i:s");
        $model = $this->call_model("nhanvienModel");
        echo $model->insertToLuong($soluong, $macv, $thoigian);
    }
    // cong viec 12 thang
    function getCongViec12thang()
    {
        $tendangnhap = $_SESSION["username"];
        $model = $this->call_model("nhanvienModel");
        echo $model->countCongViec12thang($tendangnhap);
    }
    // xem bill detail
    function callBillDetail()
    {
        $mahoadon = $_POST["mahoadon"];
        $model = $this->call_model("taikhoanModel");
        $arr = $model->getDetailBill($_SESSION["username"], $mahoadon);
        $this->call_view_page("detailBillPage", [
            "arrBillDetail" => $arr
        ]);
    }
    function callBillDetailNV()
    {
        $mahoadon = $_POST["mahoadon"];
        $model = $this->call_model("taikhoanModel");
        $arr = $model->getDetailBill($_SESSION["username"], $mahoadon);
        $this->call_view_page_nhanvien("ajaxSeeDetailBill", [
            "arrDetail" => $arr
        ]);
    }
    // ajax tim kiem 
    function getThemProductPT()
    {
        $ndtimkiem = $_POST["ndtimkiem"];
        $batdau = $_POST["batdau"];
        $option = $_POST["option"];
        $gioihanhienthi = $_POST["gioihanhienthi"];
        $model = $this->call_model("productModel");
        $arrNdTk = json_decode($model->timkiemSapXep($ndtimkiem, $batdau, $gioihanhienthi,$option));
        $arrNdTk = array_values((array) $arrNdTk);
        $this->call_view_page("ajaxPtPage", [
            "arrNdTk" => $arrNdTk
        ]);
    }
    function timkiemSapXep(){
        $ndtimkiem = $_POST["ndtimkiem"];
        $batdau = $_POST["batdau"];
        $gioihanhienthi = $_POST["gioihanhienthi"];
        $option = $_POST["option"];
        $model = $this->call_model("productModel");
        $arrTypeProduct = json_decode($model->timkiemSapXep($ndtimkiem, $batdau, $gioihanhienthi,$option));
        $arrTypeProduct = array_values((array) $arrTypeProduct);
        $this->call_view_page("ajaxTimKiem", [
            "arrTypeProduct" => $arrTypeProduct
        ]);        
    }
    // chat 
    function chat()
    {
        $tendangnhap = $_SESSION["username"];
        $matinnhan = $_SESSION["username"] . "-tn";
        $noidung = $_POST["noidung"];
        $thoigian = date("Y-m-d H:i:s");
        $model = $this->call_model("chatModel");
        if ($model->chat($tendangnhap, $matinnhan, $noidung, $thoigian)) {
            echo $thoigian;
        }
    }
    function check_newMess()
    {
        $tendangnhap = $_SESSION["username"];
        $matinnhan = $_SESSION["username"] . "-tn";
        $thoigiannhan = $_POST["thoigiannhan"];
        $model = $this->call_model("chatModel");
        $result = $model->check_newMess($matinnhan, $tendangnhap, $thoigiannhan);
        if ($result) {
            $this->call_view_page("ajaxAppendMess", [
                "arrMess" => $result
            ]);
        }
    }
    // chat admin
    function getContentMess()
    {
        $matinnhan = $_POST["matinnhan"];
        $model = $this->call_model("chatModel");
        $arr = $model->getTN($matinnhan);
        $arrUserName = $model->getNameUserMess($matinnhan);
        $this->call_view_page_admin("ajaxChatMess", [
            "arrContentMess" => $arr,
            "arrUserName" => $arrUserName
        ]);
    }
    function chatAdmin()
    {
        $tendangnhap = $_SESSION["username"];
        $matinnhan = $_POST["matinnhan"];
        $noidung = $_POST["noidung"];
        $thoigian = date("Y-m-d H:i:s");

        $model = $this->call_model("chatModel");
        $taikhoanmodel = $this->call_model("taikhoanModel");

        $arrAppend = [$noidung, $thoigian];
        $tenNguoiDung = $taikhoanmodel->getTenNguoiDung($tendangnhap);
        if ($model->chat($tendangnhap, $matinnhan, $noidung, $thoigian)) {
            // echo $thoigian;
            $this->call_view_page_admin("ajaxAppendMess", [
                "arrAppend" => $arrAppend,
                "tennguoidung" => $tenNguoiDung
            ]);
        }
    }
    function check_newMess_admin()
    {
        $tendangnhap = $_SESSION["username"];
        $matinnhan = $_POST["matinnhan"];
        $thoigiannhan = $_POST["thoigiannhan"];
        $model = $this->call_model("chatModel");
        $result = $model->check_newMess($matinnhan, $tendangnhap, $thoigiannhan);
        if ($result) {
            $this->call_view_page_admin("ajaxAppendMess", [
                "arrAppendKH" => $result,
            ]);
        } else {
            echo false;
        }
    }
    function getMessLastAdmin()
    {
        $lidaudanhsach = $_POST["lidaudanhsach"];
        $model = $this->call_model("chatModel");
        $arr = json_decode($model->getMessLastAdmin());
        $arr = array_values((array) $arr[0]);
        $arrLi = $model->getListTN();
        if ($arr[1] != $lidaudanhsach) {
            $this->call_view_page_admin("ajaxAppendMess", [
                "arrLi" => $arrLi
            ]);
        } else {
            echo false;
        }
    }
    // admin into nhan vien 
    function getNhanVienDetail()
    {
        $model = $this->call_model("adminModel");
        $tendangnhap = $_POST["tendangnhap"];
        echo $model->getNhanVienDetail($tendangnhap);
    }
    // bill in admin
    function callBillDetailAdmin()
    {
        $mahoadon = $_POST["mahoadon"];
        $model = $this->call_model("taikhoanModel");
        $arr = $model->getDetailBillAdmin($mahoadon);
        $this->call_view_page_admin("ajaxDetailBill", [
            "arrDetail" => $arr
        ]); 
    }
    // get to char js
    function getTongThu12Thang()
    {
        $model = $this->call_model("adminModel");
        echo $model->getDoanhThu12Thang();
    }
    // reply review 
    function getReview()
    {
        $masp = $_POST["masp"];
        $model = $this->call_model("adminModel");
        $arrReview = $model->getReview($masp);
        $this->call_view_page_admin("ajaxDanhGia&PhanHoi", [
            "arrReview" => $arrReview
        ]);
    }
    function getphReview()
    {
        $manhanxet = $_POST["manhanxet"];
        $model = $this->call_model("adminModel");
        $arrReview = $model->getphReview($manhanxet);
        $this->call_view_page_admin("ajaxDanhGia&PhanHoi", [
            "arrPhReview" => $arrReview
        ]);
    }
    function insertPhanHoi()
    {

        $manhanxet = $_POST["manhanxet"];
        $noidungphanhoi = $_POST["noidungphanhoi"];
        $tendangnhap = $_SESSION["username"];
        $ngayphanhoi = date("Y-m-d");
        $model = $this->call_model("adminModel");
        if ($model->checkPhanHoi($manhanxet, $tendangnhap)) {
            echo $model->updatePhaHoi($manhanxet, $tendangnhap, $noidungphanhoi, $ngayphanhoi);
        } else {
            echo $model->insertPhanHoi($manhanxet, $tendangnhap, $noidungphanhoi, $ngayphanhoi);
        }
    }
}
?>
