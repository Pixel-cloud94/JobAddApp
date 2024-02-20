@extends('layout')
@section('title', 'Register')
@section('content')
<div class=container style="margin-top:  90px;">
<div class="banner" style="background-color: white; padding:  10px; margin-bottom:  10px;">
        <h2 class="slogan text-center">Join our Network of Heroes and get hired today!</h2>
        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/0c2a5632830679.569563b0d45b2.gif"class="banner-image">
            <div class="mt-5">
                @if($errors->any())
                <div class="col-12">
                    @foreach($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                    @endforeach
                </div>
                @endif

                @if(session()-> has('error'))
                <div class="alert alert-danger">
                        {{session('error')}}
                </div>
                @endif

                @if(session()-> has('success'))
                <div class="alert alert-success">
                        {{session('success')}}
                </div>
                @endif

            </div>
            <form action ="{{route('register.post')}}" method = "POST" class ="ms-auto me-auto"style="width: 500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" class="form-control"name = "first_name">    
            </div>
            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" class="form-control" name= "last_name">    
            </div>
            <div class="mb-3">
                <label class="form-label">User Name</label>
                <input type="text" class="form-control" name= "username">    
            </div>
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name = "email">    
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control"name="password">
            </div>
            <button type="submit" class="btn btn-dark"style="position: relative; left:  40%;">Submit</button>
            </form>
            </div>
            </div>
@endsection

<style>
    .banner {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        margin-left: 370px;
        margin-right: 370px;
        border-radius:  10px;
        opacity:  0.8;

    }

    .slogan {
        font-size:  24px;
        font-weight: bold;
        margin-bottom:  10px;
    }

    .banner-image {
        width:  300px; 
        height:  200px;

    }
</style>