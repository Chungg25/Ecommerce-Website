<div class="content">
    <div class="px-5">

        <form class="mt-5" method="post">
            <div class="mb-3 w-25">
                <label for="categoryName" class="form-label">Tên Danh Mục</label>
                <input type="text" class="name form-control" id="categoryName" name="name">
            </div>
            <button type="submit" class="add btn btn-danger">Thêm Danh Mục</button>
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    $('.add').click(function(event) {
        var categoryName = $('#categoryName').val();
        $.ajax({
            url: 'http://localhost:8080/Ecommerce-Website/admin/category/addCategory/' + categoryName,
            type: 'GET',
            success: function(data) {
                console.log('AJAX request succeeded');
                window.location.href = 'http://localhost:8080/Ecommerce-Website/admin/category/category';
            },
            error: function(error) {
                console.log('AJAX request failed');
            }
        });
    });
});
</script>