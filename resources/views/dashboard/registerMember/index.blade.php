@extends('dashboard/layout')

@section('contents')
    <h1>
        Register New Member
    </h1>

    <div class="col-12 col-sm-10 col-md-10 col-lg-10 col-xl-10">
        <form action="{{route('register.member')}}" method="POST" class="bg-light rounded p-4 p-sm-5 my-4 mx-3">
            @csrf
            @method('POST')

            <div class="form-floating mb-3">
                <input type="text" name="fullName" class="form-control" id="floatingText" placeholder="jhondoe">
                <label for="floatingText">full Name</label>
            </div>
            
            <div class="form-floating mb-3">
                <input type="text" name="loginName" class="form-control" id="floatingText01" placeholder="jhondoe">
                <label for="floatingText">login Name</label>
            </div>

            <div class="form-floating mb-4">
                <input type="text" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            
            <button type="submit" class="btn btn-primary py-3 w-100 mb-4">Sign Up</button>
        </form>
    </div>
    
@endsection