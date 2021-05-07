<div class="ps-lg-3 ps-md-2 ps-sm-0 pe-lg-3 pe-md-2 pe-sm-0" id="productDetailsForms">
@foreach ($details as $detail)
<div id="detailForm1">
    <label for="detail1" class="form-label">{{$detail->name}}</label>
    <div class="input-group">
        <select class="form-select" aria-label="Category" id="detail1">
            <option selected>...</option>
            {{-- <option value="1">Intel i3</option>
            <option value="2">Intel i5</option>
            <option value="3">Intel i7</option>
            <option value="4">Intel i9</option> --}}
            @foreach ($detail->getDetailInfo() as $detail_info)
            <option value={{$detail_info->detail_info}}>{{$detail_info->detail_info}}</option>
            @endforeach
        </select>
        <input type="text" class="form-control w-50" id="detail1Full">
    </div>
</div>
@endforeach
</div>