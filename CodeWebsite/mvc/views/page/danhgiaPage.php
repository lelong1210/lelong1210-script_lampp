<!-- product details description area start -->
<?php $arrRV = json_decode($data["productModel"]->selecDanhgia($data["params"])); ?>
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a class="active" data-bs-toggle="tab" href="#des-details3">Đánh Giá (<?php if ($arrRV) echo count($arrRV); ?>)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="" class="">
                    <?php
                    if ($arrRV) {
                        $count = count($arrRV);
                        ?>
                        <div class="row">
                            <div class="col-lg-7">
                                <?php for ($i = 0; $i < $count; $i++) {
                                        $arrChild = array_values((array) $arrRV[$i]); ?>
                                    <div class="review-wrapper">
                                        <div class="single-review">
                                            <div class="review-img">
                                                <img src="https://static2.yan.vn/YanNews/2167221/202102/facebook-cap-nhat-avatar-doi-voi-tai-khoan-khong-su-dung-anh-dai-dien-e4abd14d.jpg" style="width: 50px;" alt="" />
                                            </div>
                                            <div class="review-content">
                                                <div class="review-top-wrap">
                                                    <div class="review-left">
                                                        <div class="review-name">
                                                            <h4><?php echo $arrChild[0] ?></h4>
                                                        </div>
                                                        <div class="rating-product">
                                                            <?php
                                                                    for ($j = 0; $j < $arrChild[1]; $j++) { ?>
                                                                <i class="ion-android-star"> </i>
                                                            <?php } ?>
                                                        </div>
                                                    </div>
                                                    <div class="review-left">
                                                        <?php echo " | " . $arrChild[3] ?>
                                                    </div>
                                                </div>
                                                <div class="review-bottom">
                                                    <p>
                                                        <?php echo $arrChild[2] ?>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                                $arrPh = json_decode($data["productModel"]->selectPhDGia($arrChild[4]));
                                                if ($arrPh) {
                                                    for ($j = 0; $j < count($arrPh); $j++) {
                                                        $arrChildPh = array_values((array) $arrPh[$j]);
                                                        ?>
                                                <div class="single-review child-review" style="margin-bottom: 6%;">
                                                    <div class="review-img">
                                                        <img src="/www/public/images/logo/logo.jpg" style="width: 50px;" alt="" />
                                                    </div>
                                                    <div class="review-content">
                                                        <div class="review-top-wrap">
                                                            <div class="review-left">
                                                                <div class="review-name">
                                                                    <h4><?php echo $arrChildPh[0] ?></h4>
                                                                </div>
                                                            </div>
                                                            <div class="review-left">
                                                                | <?php echo $arrChildPh[2] ?>
                                                            </div>
                                                        </div>
                                                        <div class="review-bottom">
                                                            <p><?php echo $arrChildPh[1] ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                                    }
                                                }
                                                ?>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-lg-5">
                                <div class="ratting-form-wrapper pl-50">
                                    <h3>Đánh Giá Sản Phẩm</h3>
                                    <div class="ratting-form">
                                        <form action="#">
                                            <div class="star-box">
                                                <span>Cảm Nhận Của Bạn ^_^:</span>
                                                <div class="rating-product" id="saodanhgia">
                                                    <div class="contenRating">
                                                        <i class="ion-android-star" id="sao1"></i>
                                                    </div>
                                                    <button type="button" class="fas fa-chevron-down" id="saodanhgiaDown"></button>
                                                    <button type="button" class="fas fa-chevron-up" id="saodanhgiaUp"></button>
                                                </div>
                                                <br>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="rating-form-style form-submit">
                                                        <textarea name="Your Review" placeholder="nhập cảm nhận của bạn" id="inputDanhgia"></textarea>
                                                        <button class="btn btn-primary btn-hover-color-primary " type="button" id="danhgia">Gửi</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="row">
                                <div class="col-lg-7"></div>
                                <div class="col-lg-5">
                                    <div class="ratting-form-wrapper pl-50">
                                        <h3>Đánh Giá Sản Phẩm</h3>
                                        <div class="ratting-form">
                                            <form action="#">
                                                <div class="star-box">
                                                    <span>Cảm Nhận Của Bạn ^_^:</span>
                                                    <div class="rating-product" id="saodanhgia">
                                                        <div class="contenRating">
                                                            <i class="ion-android-star" id="sao1"></i>
                                                        </div>
                                                        <button type="button" class="fas fa-chevron-down" id="saodanhgiaDown"></button>
                                                        <button type="button" class="fas fa-chevron-up" id="saodanhgiaUp"></button>
                                                    </div>
                                                    <br>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="rating-form-style form-submit">
                                                            <textarea name="Your Review" placeholder="nhập cảm nhận của bạn" id="inputDanhgia"></textarea>
                                                            <button class="btn btn-primary btn-hover-color-primary " type="button" id="danhgia">Gửi</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->