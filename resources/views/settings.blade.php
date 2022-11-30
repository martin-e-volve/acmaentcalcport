@extends('layout')
@section('title', 'Settings')
@section('main_content')

<div class='p-2'>
    <h5>Settings</h5>
</div>
<div class="p-2">
    <form method='post' action='{{route("setAllowance")}}'>
        @csrf
        <div class="form-group mb-2">
            <label for="monthly_charge" class="form-label">Monthly charge</label>
            <input type="number" class="form-control" id="monthly_charge" name="monthly_charge">
        </div>
        <div class="form-group mb-2">
            <label for="discount" class="form-label">Discount</label>
            <input type="number" class="form-control" id="discount" name="discount">
        </div>
        <div>
            <input class="btn btn-warning" type="submit" value="Save">
        </div>
    </form>
</div>


@endsection