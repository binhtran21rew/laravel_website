<tbody class="align-middle">
@if(session('cart'))
    @php
        $i = 0;
    @endphp
    @foreach($carts as $id => $cart)
    @php
        $i++;
    @endphp
    <tr>
        <td class="align-middle">{{$i}}</td>
        <td class="align-middle"><img src="{{$cart['image']}}" alt="" style="width: 50px;"> {{$cart['name']}}</td>
        <td class="align-middle">{{number_format( $cart['price'],0,",",".") }} vnd</td>
        <td class="align-middle">
            <div class="input-group quantity mx-auto" style="width: 100px;">
                <input type="number" min="1" class="form-control form-control-sm bg-secondary text-center quantity" value="{{$cart['quantity']}}">
            </div>
        </td>
        <td class="align-middle">{{number_format( $cart['price'] * $cart['quantity'],0,",",".") }} vnd</td>
        
        <td class="align-middle">
            <a href="" data-id="{{$id}}" class="btn btn-sm btn-primary cart-update"><i class="fa fa-edit"></i></a>
            <button data-id="{{$id}}" class="btn btn-sm btn-primary cart-delete"><i class="fa fa-times"></i></button>
        </td>
    </tr>
    @endforeach

@else
<tr>
<td col="5">No product to cart</td>

</tr>

@endif
</tbody>