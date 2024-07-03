<div class=" filter-product pt-2 d-flex justify-content-end"  >
    <div >
        <select onchange="changeSort(event)">
            <option value="" {{ $sort == ""?'selected':'' }}>Sắp xếp</option>
            <option value="newest" {{ $sort == "newest"?'selected':'' }}>Sản phẩm mới nhất</option>
            <option value="sale" {{ $sort == "sale"?'selected':'' }}>Sản phẩm sale</option>
            <option value="asc" {{ $sort == "asc"?'selected':'' }}>Giá tăng dần</option>
            <option value="desc" {{ $sort == "desc"?'selected':'' }}>Giá giảm dần</option>
        </select>
    </div>
    <div class="grid mx-2 d-md-block d-none">
        {{-- <input class="mx-2" style="display: none" type="radio" name="grid_product"><i class="fa-solid fa-grid fs-4"></i></input>
        <input class="" type="radio" name="grid_product" ><i class="fa-solid fa-grid-2 fs-4"></i></input> --}}
        <input class="mx-2" value="3" type="radio" name="grid_product" id="grid1" {{ $grid != '2'?'checked':'' }} >
        <label for="grid1"><i class="fa-solid fa-grid fs-4"></i></label>
        <input class=""  value="2"type="radio" name="grid_product" id="grid2" {{ $grid == '2'?'checked':'' }}>
        <label for="grid2"><i class="fa-solid fa-grid-2 fs-4"></i></label>
    </div>
</div>

<script>
    function changeSort(event){
        // let sort = event.target;
        let value = event.target.value;
        var currentUrl = new URL(window.location.href);
        currentUrl.searchParams.set('sort',value);
        window.location.href = currentUrl.toString();
        // console.log('Giá trị được chọn:', window.location.href);
    }
    document.querySelectorAll('input[name="grid_product"]').forEach((elem) => {
        elem.addEventListener("change", function(event) {
            // let grid = event.target;
            let value = event.target.value;
            var currentUrl = new URL(window.location.href);
            currentUrl.searchParams.set('grid',value);
            window.location.href = currentUrl.toString();
        });
    });
    
</script>