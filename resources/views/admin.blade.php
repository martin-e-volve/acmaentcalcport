
@extends('layout')
@section('title', 'Admin Home')
@section('main_content')


<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active" id="allowances-tab" data-bs-toggle="tab" data-bs-target="#allowances" type="button" role="tab" aria-controls="allowances" aria-selected="true">Users</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="price-tab" data-bs-toggle="tab" data-bs-target="#price" type="button" role="tab" aria-controls="price" aria-selected="false">Price Settings</button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link" id="register-tab" data-bs-toggle="tab" data-bs-target="#register" type="button" role="tab" aria-controls="register" aria-selected="false">Register New User</button>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="allowances" role="tabpanel" aria-labelledby="allowances-tab">
        <div class='container p-5'>
            <table class='table table-striped w-100'>
                <thead class='bg-warning'>
                    <tr>
                        <th class='text-white p-2 col-auto'>First Name</th>
                        <th class='text-white p-2 col-auto'>Last Name</th>
                        <th class='text-white p-2 col-auto'>Company Name</th>
                        <th class='text-white p-2 col-auto'>Email</th>
                        <th class='text-white p-2 col-auto'>Account Type</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class='p-2'>{{$user->first_name}}</td>
                            <td class='p-2'>{{$user->last_name}}</td>
                            <td class='p-2'>{{$user->company_name}}</td>
                            <td class='p-2'>{{$user->email}}</td>
                            <td class='p-2'>{{$user->accountType}}</td>
                            <td><a href='{{route("allowance", $user->id)}}'>View</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    

    <div class="tab-pane fade" id="price" role="tabpanel" aria-labelledby="price-tab">
        <div class="container mt-5 w-50">
            <form method='post' action='/setPrices'>
                @csrf
                <div class="form-group">
                    <label for="unit_price" class="form-label">Unit Price</label>
                    <input type="number" class="form-control" name='unit_price' id='unit_price' value='{{$settings->unit_price}}'>
                </div>
                <div class="form-group">
                    <label for="min_price" class="form-label">Minimum Price</label>
                    <input type="number" class="form-control" name='min_price' id='min_price' value='{{$settings->min_price}}'>
                </div>
                <div class="form-group">
                    <label for="att_adj" class="form-label">Attribute and variations adjustment rate (% per additional 10)</label>
                    <input type="number" class="form-control" name='att_adj' id='att_adj' value='{{$settings->att_adj}}'>
                </div>
                <div class="form-group">
                    <label for="language_adj" class="form-label">Language sites adjustment rate (% per site)</label>
                    <input type="number" class="form-control" name='language_adj' id='language_adj' value='{{$settings->language_adj}}'>
                </div>
                <div>
                    <input type="submit" class="btn btn-warning mt-3 text-white" value='Save'>
                </div>
            </form>
        </div>
    </div>

    <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
        <div class="container mt-5 w-50">
            <form method ='post' action='/register'>
                @csrf
                <div class="form-group">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control" name='first_name' id='first_name' value="{{old('first_name')}}">
                    @error('first_name')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control" name='last_name' id='last_name' value="{{old('last_name')}}">
                    @error('last_name')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="name" class="form-label">Username</label>
                    <input type="text" class="form-control" name='name' id='name' value="{{old('name')}}">
                    @error('name')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name='email' id='email' value="{{old('email')}}">
                    @error('email')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="company_name" class="form-label">Company Name</label>
                    <input type="text" class="form-control" name='company_name' id='company_name' value="{{old('company_name')}}">
                    @error('name')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name='password' id='password'>
                    @error('password')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="accountType" class="form-label">Account Type</label>
                    <select class="form-select" aria-label="accountType select" name='accountType' id='accountType'>
                        <option selected>Choose an option</option>
                        <option value="retailer">Retailer</option>
                        <option value="agency">Agency</option>
                        <option value="enterprise">Enterprise</option>
                        <option value="admin">Admin</option>
                    </select>
                    @error('userType')
                        <p class='text-danger text-xs mt-1'>{{$message}}</p>
                    @enderror
                </div>
                <div>
                   <input type="submit" class="btn btn-warning mt-3 text-white" value='Register'>
                </div>
            </form>
        </div>
    </div>
</div>


@endsection