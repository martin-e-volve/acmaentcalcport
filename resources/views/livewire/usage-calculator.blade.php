

<div>

<div class='d-flex justify-content-center mb-5'>

  <div class='card col-12 col-md-3 mx-2 p-5 allowance-card'>
    <h5 class='fw-bold text-center'>Minimum spend:</h5>
    <h5 class='fw-bold text-center'>{{number_format($tier['spend'])}}</h5>
    <p class='text-center mt-1 mb-1'>Current total:</p>
    <p class='text-center mt-1 mb-1'>{{number_format($equivalent_price)}}</p>
    <p class='text-center mt-1 mb-1'>Equivalent available spend:</p>
    <p class='text-center mt-1 mb-1'>{{number_format($tier['equivalent'])}}</p>
    
  </div>
  <div>
  <table class="table">
    <thead>
        <tr>
            <th>Committed Monthly Spend</th>
            <th>Discount per Tier</th>
            <th>Equivalent Monthly Fee (pre discount)</th>
            <th>Total Equivalent Fees(pre discount)</th>
            <th>Annual Savings</th>
        </tr>
</thead>
    <tbody>
        @foreach($allowances as $allowance)
        @if($allowance->spend == $tier['spend'])
        <tr>
            <td class='bg-primary text-white'>{{number_format($allowance->spend)}}</td>
            <td class='bg-primary text-white'>{{$allowance->discount_rate}}%</td>
            <td class='bg-primary text-white'>{{number_format($allowance->pre_discount_tier)}}</td>
            <td class='bg-primary text-white'>{{number_format($allowance->equivalent)}}</td>
            <td class='bg-primary text-white'>{{number_format($allowance->annual_saving)}}</td>
        </tr>
        @else
        <tr>
            <td>{{number_format($allowance->spend)}}</td>
            <td>{{$allowance->discount_rate}}%</td>
            <td>{{number_format($allowance->pre_discount_tier)}}</td>
            <td>{{number_format($allowance->equivalent)}}</td>
            <td>{{number_format($allowance->annual_saving)}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
  </div>

  

</div>
    <table class='table'>
        <thead class='bg-warning'>
            <th class='text-white'>Brand</th>
            <th class='text-white'>Impressions</th>
            <th class='text-white'>Products</th>
            <th class='text-white'>Language sites</th>
            <th class='text-white'>Attributes</th>
            <th class='text-white'>Standard monthly price</th>
            <th class='text-white'>Toggle</th>
        </thead>
        <tbody>
        @foreach($brands as $brand)
            <tr>
                <td class='px-2'>{{$brand->brandname}}</td>
                <td class='px-2'>{{number_format($brand->impressions)}}</td>
                <td class='px-2'>{{number_format($brand->products)}}</td>
                <td class='px-2'>{{$brand->languages}}</td>
                <td class='px-2'>{{$brand->attributes}}</td>
                <td class='px-2'>£{{number_format($brand->price)}}</td>
                <td class='px-2'>
                    
                    <div class="form-check form-switch" >
                        @if($brand->status == 'Active')
                        <input wire:click="updateBrandStatus({{$brand->id}})" class="form-check-input" type="checkbox" role="switch" id="switch" checked>
                        @else
                        <input wire:click="updateBrandStatus({{$brand->id}})" class="form-check-input" type="checkbox" role="switch" id="switch">
                        @endif
                    </div>
                </td>  
                <td><a href='{{route("deleteBrand", $brand->id)}}'><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
