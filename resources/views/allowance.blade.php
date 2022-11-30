@extends('layout')
@section('title', 'View user allowances')
@section('main_content')

<div class="container mt-2">
    <a class='btn btn-primary mb-2' href='{{route("home")}}'>Back</a>
    <table class="table-bordered table">
        <thead class='bg-warning'>
            <tr>
                <th class='text-white'>Discount</th>
                <th class='text-white'>Spend</th>
                <th class='text-white'>Equivalent spend</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($allowances as $allowance)
            <tr>
                <td>{{$allowance->discount_rate}}</td>
                <td>{{number_format($allowance->spend)}}</td>
                <td>{{number_format($allowance->equivalent)}}</td>
                <td><a href='{{route("deleteAllowance", ["id"=>$allowance->id,"user_id"=>$user->id])}}'>Delete</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="container mt-5 w-50">
            <form method='post' action='{{route("addAllowance")}}'>
                @csrf
                <div class="form-group mb-2">
                    <label for="spend" class="form-label">Monthly charge</label>
                    <input type="number" class="form-control" id="spend" name="spend">
                </div>
                <div class="form-group mb-2">
                    <label for="discount_rate" class="form-label">Discount applied</label>
                    <input type="number" class="form-control" id="discount_rate" name="discount_rate">
                </div>
                <div class="d-none">
                    <label for="user_id" class="form-label">User ID</label>
                    <input type="number" class="form-control" id="user_id" name="user_id" value='{{$user->id}}'>
                </div>
                
                <div>
                    <input class="btn btn-warning text-white" type="submit" value="Add">
                </div>
            </form>
        </div>


@endsection