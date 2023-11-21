@extends('layouts.auth')

@section('title', 'Register')
@section('content')
    <div class="row">
        <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
        <div class="col-lg-7">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                </div>
                <form class="user" method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                placeholder="Full Name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form-control form-control-user" id="exampleUserName"
                                placeholder="User Name" name="username" value="{{ old('username') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address" name="email" value="{{ old('email') }}">
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 mb-3 mb-sm-0">
                            <input type="password" class="form-control form-control-user" id="exampleInputPassword"
                                placeholder="Password" name="password">
                            @error('password')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-sm-6">
                            <input type="password" class="form-control form-control-user" id="exampleRepeatPassword"
                                placeholder="Repeat Password" name="password_confirmation">
                            @error('password_confirmation')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-around mb-4 flex-wrap">
                        @foreach ($avatars as $avatar)
                            <div>
                                <input type="radio" id="avatar-{{ $avatar->id }}" name="avatar_id"
                                    value="{{ $avatar->id }}" />
                                <label for="avatar-{{ $avatar->id }}">
                                    <img src="{{ $avatar->image_src }}" alt="avatar" width="75px" height="75px"
                                        class="rounded-circle">
                                </label>
                            </div>
                        @endforeach
                        @error('avatar_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <hr>
                    <div class="form-group">
                        <label for="admin-code">Admin Code</label>
                        <input type="text" class="form-control form-control-user" id="admin-code"
                            placeholder="Admin Code" name="admin_code" value="{{ old('admin_code') }}">
                        @error('admin_code')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    {{-- <a href="login.html" class="btn btn-primary btn-user btn-block">
                    Register Account
                </a> --}}
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Register Account
                    </button>
                    <hr>
                    <a href="#" class="btn btn-google btn-user btn-block">
                        <i class="fab fa-google fa-fw"></i> Register with Google
                    </a>
                    <a href="#" class="btn btn-facebook btn-user btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                    </a>
                </form>
                <hr>
                <div class="text-center">
                    <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="{{ route('login') }}">Already have an account? Login!</a>
                </div>
            </div>
        </div>
    </div>
@stop
