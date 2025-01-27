<!DOCTYPE html>
<html>

<head>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="<?= $CONTENT_URL ?>/js/xshop-list.js"></script>
</head>

<body>
    <h3 class="text-center mt-4 mb-4 pb-4">QUẢN LÝ HÀNG HÓA</h3>
    <form action="index.php" method="post">
        <div class="input-group mb-4 mt-4">
            <input name="keyword" type="text" class="form-control" value="<?=!empty($keyword)? $keyword:""?>" placeholder="Tìm kiếm sản phẩm..." aria-label="Recipient's username" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button name="btn_search" class="btn btn-outline-secondary" id="basic-addon2">Search</button>
            </div>
        </div>
    </form>
    <?php
    if (strlen($MESSAGE)) {
        echo "<h5>$MESSAGE</h5>";
    }
    ?>
    <div class="list text-center">
        <ul class="list-group list-group-horizontal-md d-flex justify-content-around">
            <li class="list-group-item"><a href="?btn_list&page_no=0">|&lt;</a></li>
            <li class="list-group-item"><a href="?btn_list&page_no=<?= $_SESSION['page_no'] - 1 ?>">&lt;&lt;</a></li>
            <li class="list-group-item"><a href="?btn_list&page_no=<?= $_SESSION['page_no'] + 1 ?>">&gt;&gt;</a></li>
            <li class="list-group-item"><a href="?btn_list&page_no=<?= $_SESSION['page_count'] - 1 ?>">&gt;|</a></li>
        </ul>
    </div>
    <form action="index.php" method="post">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th></th>
                    <th>MÃ HH</th>
                    <th>TÊN HH</th>
                    <th>ĐƠN GIÁ</th>
                    <th>GIẢM GIÁ</th>
                    <th>LƯỢT XEM</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($items as $item) {
                    extract($item);
                ?>
                    <tr>
                        <th><input type="checkbox" name="ma_hh[]" value="<?= $ma_hh ?>"></th>
                        <td><?= $ma_hh ?></td>
                        <td><?= $ten_hh ?></td>
                        <td>$<?= number_format($don_gia, 2) ?></td>
                        <td><?= number_format($giam_gia) ?>%</td>
                        <td><?= $so_luot_xem ?></td>
                        <td>
                            <a href="index.php?btn_edit&ma_hh=<?= $ma_hh ?>">Sửa</a>
                            <a onclick="return confirm('Bạn chắc muốn xóa?')" href="index.php?btn_delete&ma_hh=<?= $ma_hh ?>">Xóa</a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="7">
                        <button class="btn btn-outline-danger" id="check-all" type="button">Chọn tất cả</button>
                        <button class="btn btn-outline-primary" id="clear-all" type="button">Bỏ chọn tất cả</button>
                        <button class="btn btn-outline-success" onclick="return confirm('Bạn chắc muốn xóa?')" id="btn-delete" name="btn_delete">Xóa các mục chọn</button>
                        <a class="btn btn-outline-warning" href="index.php">Nhập thêm</a>
                    </td>
                </tr>
            </tfoot>
        </table>
    </form>
</body>

</html>