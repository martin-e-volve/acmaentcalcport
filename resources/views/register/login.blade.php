@extends('register/public_layout')
@section('main_content')


<section>
    <main>
        <div class='d-flex fullHeight '>
            <div class='col-12 col-md-6 p-6 left_col d-flex flex-column justify-content-center align-items-center'>
                <img src='{{asset("images/AC-LOGO-2022-HORIZONTALWHITE.png")}}' style='width:500px'>
                
            </div>
                <div class='col-12 col-md-6 bg-light p-5 d-flex align-items-center justify-content-center align-items-center'>
                    <div>
                        <h3 class='mb-5'>Client & Partner Portal Login</h3>
                        <div class='bg-white p-5 rounded w-100 box'>
                            <form method='post' action='{{route("session")}}'>
                                @csrf 
                                <div class="form-group">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name='email' id='email' value='{{old("email")}}'>
                                    @error('email')
                                     <p class='text-danger text-xs mt-1'>{{$message}}</p>
                                        @enderror
                                </div>
                               
                                <div class="form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control" name='password' id="password">
                                    @error('password')
                                    <p class='text-danger text-xs mt-1'>{{$message}}</p>
                                    @enderror
                                </div>
                                <div>
                                    <input type="submit" class="btn btn-warning mt-3 text-white" value='Login'>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</section>



@endsection