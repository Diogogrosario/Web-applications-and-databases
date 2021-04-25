<!-- <div class="col-7 text-center ps-5 pe-5"> -->
    <section id="productDetails" class="row px-md-5 px-2 pt-3">
        <h3 class="text-center mt-3 mb-3">Product Details</h3>
        @php
            $half = ceil($item->details->count() / 2);
            $chunks = $item->details->chunk($half);
        @endphp
        @if (count($chunks) > 0)
            <div class="col-md-6 col-sm-12" id="detailsTable_1">
                <table class="table">
                    <tbody>
                        @foreach ($chunks[0] as $item)
                            <tr>
                                <th scope="row"> {{$item["name"]}} </th>
                                <td> {{$item->pivot["detail_info"]}} </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col" id="detailsTable_2">
                <table class="table">
                    <tbody>
                        @if (count($chunks) > 1)
                            @foreach ($chunks[1] as $item)
                                <tr>
                                    <th scope="row"> {{$item["name"]}} </th>
                                    <td> {{$item->pivot["detail_info"]}} </td>
                                </tr> 
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        @endif
    </section>
    <!-- </div> -->