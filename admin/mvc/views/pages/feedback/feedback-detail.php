<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Phản Hồi Khách Hàng</h4>
    </div>

    <div class="px-5">

        <h4 class="mt-5 fw-bold">{{ product.title }}</h4>

        <table class="table table-striped mt-5">
            <thead>
                <tr>
                    <th>Người Đánh Giá</th>
                    <th>Đánh Giá</th>
                    <th>Nội Dung</th>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="feedback in rating">
                    <td>
                        {{ feedback.postedBy.name }}
                    </td>
                    <td>
                        <div class="star-group">
                            <div class="star-group">
                                <span ng-if="product.totalRating === 0">Chưa có đánh giá</span>

                                <i class="fa-solid fa-star text-warning"
                                    ng-repeat="i in [].constructor(product.totalRating) track by $index"></i>
                            </div>
                        </div>
                    </td>
                    <td>
                        {{ feedback.comment }}
                    </td>
                </tr>
        </table>

        <a class="btn btn-outline-danger" href="#!feedback">
            Quay Lại
        </a>
    </div>
</div>