<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Thêm Mã Giảm Giá Mới</h4>
    </div>

    <div class="px-5">
        <form class="mt-5" ng-submit="addCoupon()">
            <div class="mb-3">
                <label for="name" class="form-label">Tên Mã Giảm Giá</label>
                <input type="text" class="form-control" id="name" ng-model="name">
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Giảm Giá</label>
                <input type="number" class="form-control" id="discount" ng-model="discount">
            </div>

            <div class="mb-3">
                <label for="expiry" class="form-label">Hạn Sử Dụng</label>
                <input type="number" class="form-control" id="expiry" ng-model="expiry" placeholder="Ngày">
            </div>

            <button type="submit mt-3" class="btn btn-danger">Thêm Mã</button>
        </form>
    </div>
</div>