<div class="content">
    <div class="shadow-sm px-5 py-3 shadow-lg">
        <h5 class="mb-0 fw-semibold">Phản Hồi Khách Hàng</h4>
    </div>

    <div class="px-5">
        <table class="table table-striped my-5">
            <thead>
                <tr>
                    <th>Ảnh</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Đánh Giá</th>
                    <th>Thao Tác</th>
                </tr>
            </thead>

            <tbody>
                <tr ng-repeat="product in displayedProducts">
                    <td>
                        <img src="{{ product.images[0] }}" alt="{{ product.name }}" class="img-fluid"
                            style="width: 60px;">
                    </td>
                    <td>
                        {{ product.title }}
                    </td>
                    <td>
                        <div class="star-group">
                            <span ng-if="product.totalRating === 0">Chưa có đánh giá</span>

                            <i class="fa-solid fa-star text-warning"
                                ng-repeat="i in [].constructor(product.totalRating) track by $index"></i>
                        </div>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="http://localhost:8080/Ecommerce-Website/admin/feedback/detail">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                </tr>
        </table>

        <div class="w-100 d-flex align-items-center justify-content-center mt-3">
            <nav aria-label="Page navigation">
                <ul class="pagination pagination-danger">
                    <li ng-repeat="page in pages" class="page-item" ng-class="{active: page === currentPage}">
                        <a href="" class="page-link" ng-click="setCurrentPage(page)">{{ page }}</a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>