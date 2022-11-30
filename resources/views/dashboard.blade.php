@extends('layout')
@section('title', 'Enterprise License Calculator')
@section('main_content')

<div class='container d-flex justify-content-end'>
<button class="btn btn-warning text-white mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">Understanding Your Enterprise Licence</button>

<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">Understanding Your Enterprise License</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <h6 class='fw-bold'>How is pricing normally calculated?</h6>
    <p>We base the monthly price of GrapheneHC on the consumption of 'Service Units'. A service unit is a reflection of the computing power, and therefore cost, required to process data within GrapheneHC.</p>
    <h6 class='fw-bold'>Products and Impressions</h6> 
    <p>We typically look at products and impressions to calculate the number of Service Units required. 1 service unit can process:</p>
    <ul>
      <li>100 products or,</li>
      <li>50,000 monthly page impressions</li>
    </ul>
    <p>We divide the number of products and the number of page impressions by their relevant Service Unit value and the base number of Service Units required is the total of the two.</p>
    <p>Each additional language site requires it's own indexing of product data which requires time and computing power, this is reflected by an additional {{$settings->language_adj}}% of the Product Service Units as additional Service Units per site. For example:</p>
    <ul>
      <li>If a site requires 100 Service Units for Products;</li>
      <li>{{$settings->language_adj}} additional Service Units are required per additional language site</li>
    </ul>
    <p>In much the same way, additional variations and product attributes require more processing, and this is reflected by an increase of {{$settings->att_adj}}% per additional average variation/attribute above the standard 10 provided.</p>
    <p>The individual cost of Service Units tapers as the number required increases ensuring we offer fantastic value for money and you are not penalised for growth.</p>
    <h6 class='fw-bold'>So what is an Enterprise Licence?</h6>
    <p>An Enterprise Licence entitles you to a large discount in exchange for a minimum monthly commitment. This is given by increasing the value of your spend so that you recieve an increase to the number of Service Units you recieve - giving you far more bang for your buck!</p>
  </div>
</div>
</div>
<div>
<livewire:usage-calculator/>
</div>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-warning text-white" data-bs-toggle="modal" data-bs-target="#addBrandModal">
  Add brand
</button>

<!-- Modal -->
<div class="modal fade" id="addBrandModal" tabindex="-1" aria-labelledby="addBrandModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add brand</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form method='post' action='{{route("add_brand")}}'>
            @csrf
            <div class='form-group'>
                <label class='form-label' for='brandname'>Name</label>
                <input class='form-control' type='text' name='brandname' id='brandname'>
            </div>
            <div class='form-group'>
                <label class='form-label' for='url'>Website URL</label>
                <input class='form-control' type='text' name='url' id='url'>
            </div>
            <div class='d-none'>
                <input class='form-control' type='text' name='status' id='status' value='Inactive'>
            </div>
            <div class='form-group'>
                <label class='form-label' for='impressions'>Average monthly page impressions</label>
                <input class='form-control' type='number' name='impressions' id='impressions'>
            </div>
            <div class='form-group'>
                <label class='form-label' for='products'>Number of products</label>
                <input class='form-control' type='number' name='products' id='products'>
            </div>
            <div class='form-group'>
                <label class='form-label' for='product_att'>Average number of product attributes/variations</label>
                <input class='form-control' type='number' name='product_att' id='product_att'>
            </div>
            <div class='form-group'>
                <label class='form-label' for='languages'>Number of foreign language sites</label>
                <input class='form-control' type='number' name='languages' id='languages'>
            </div>
            <div class='d-none'>
                <label class='form-label' for='user_id'>User ID</label>
                <input class='form-control' type='number' name='user_id' id='user_id' value={{$user_id}}>
            </div>
            <div class='form-group'>
                <input class='btn btn-warning text-white my-2 w-100' type='submit' value='Add brand'>
            </div>
        </form>
      </div>
      
    </div>
  </div>
</div>
</div>


@endsection