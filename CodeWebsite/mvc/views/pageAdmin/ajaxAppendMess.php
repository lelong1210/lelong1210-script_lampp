<?php
// gui
if (isset($data["arrAppend"])) {
    $arr = $data["arrAppend"];
    $tenNguoidung = json_decode($data["tennguoidung"]);
    $tenNguoidung = array_values((array) $tenNguoidung[0]);
    $tenNguoidung = $tenNguoidung[0];
    ?>
    <li class="chat-right">
        <div class="chat-hour"><?php echo $arr[1] ?> </span></div>
        <div class="chat-text"><?php echo $arr[0] ?></div>
        <div class="chat-avatar">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcePiTSzFkV2JpaofezQ33zwNCZXl1r76oIT89uCbzo9UtQXn4r60m-IKg55ujn2g6XYY&usqp=CAU" alt="Retail Admin">
            <div class="chat-name"><?php echo $tenNguoidung; ?></div>
        </div>
    </li>
    <span id="lastTime" style="display: none;"><?php echo $arr[1] ?></span>
<?php } ?>

<?php
// nhan
if (isset($data["arrAppendKH"])) {
    $arr = json_decode($data["arrAppendKH"]);
    $count = count($arr);
    for ($i = 0; $i < $count; $i++) {
        $arrChild = array_values((array) $arr[$i]); ?>
        <li class="chat-left">
            <div class="chat-avatar">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcePiTSzFkV2JpaofezQ33zwNCZXl1r76oIT89uCbzo9UtQXn4r60m-IKg55ujn2g6XYY&usqp=CAU" alt="Retail Admin">
                <div class="chat-name"><?php echo $arrChild[5] ?></div>
            </div>
            <div class="chat-text"><?php echo $arrChild[2] ?></div>
            <div class="chat-hour"><?php echo $arrChild[3] ?></div>
        </li>
        <?php if ($i == $count - 1) { ?>
            <span id="lastTime" style="display: none;"><?php echo $arrChild[3] ?></span>
        <?php } ?>
    <?php  } ?>

<?php } ?>

<?php
// update li
if (isset($data["arrLi"])) {
    $arr = json_decode($data["arrLi"]);
    $count = count($arr);
    for ($i = 0; $i < $count; $i++) {
        $arrChild = array_values((array) $arr[$i]) ?>
        <li class="person" data-chat="person1" id="list_chat<?php echo $arrChild[0] ?>">
            <div class="user">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQcePiTSzFkV2JpaofezQ33zwNCZXl1r76oIT89uCbzo9UtQXn4r60m-IKg55ujn2g6XYY&usqp=CAU" alt="Retail Admin">
                <!-- <span class="status busy"></span> -->
            </div>
            <p class="name-time">
                <span class="name"><?php echo $arrChild[1] ?></span>
                <span class="time"><?php echo $arrChild[2] ?></span>
            </p>
        </li>
        <?php if ($i == 0) { ?>
            <span id="firtLi" style="display: none;"><?php echo $arrChild[0] ?></span>
        <?php } ?>
    <?php } ?>
<?php } ?>