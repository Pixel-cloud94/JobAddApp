@extends('layout')
@section('title', 'Login')
@section('content')
<div class="container" style="margin-top:  90px;">
    <!-- Banner Section -->
    <div class="banner" style="background-color: white; padding:  10px; margin-bottom:  10px;">
        <h2 class="slogan">Find Your Superhero Job Here!</h2>
        <img src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/6966b532830679.569563b0b0d07.gif"class="banner-image">

    <!-- Login Form -->
    <div class="mt-1">
        @if($errors->any())
        <div class="col-12">
            @foreach($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
            @endforeach
        </div>
        @endif

        @if(session()->has('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
        @endif

        @if(session()->has('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
        @endif

        <form action="{{route('login.post')}}" method="POST" class="ms-auto me-auto" style="width:  500px">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Remember me</label>
            </div>
            <button type="submit" class="btn btn-dark" style="position: relative; left:  44%;">Login</button>
        </form>
    </div>
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