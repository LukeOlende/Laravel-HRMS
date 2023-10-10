<style>
    .account-page {
        align-items: center ;
        display: flex;
    }
    .account-page .main-wrapper {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        width: 100%;
    }
    .account-content {
        padding: 20px 0;
    }
    .account-title {
        font-size: 24px;
        font-weight: 500;
        margin-bottom: 5px;
        text-align: center;
    }
    .account-subtitle {
        color: #4c4c4c;
        font-size: 16px;
        margin-bottom: 30px;
        text-align: center;
    }
    .account-box {
        background-color: #fff;
        border: 1px solid #ededed;
        border-radius: 10px;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.2);
        margin: 0 auto;
        overflow: hidden;
        width: 480px;
    }
    .account-wrapper {
        padding: 30px;
    }
    .account-box .account-btn {
        background: linear-gradient(to right, rgb(19, 126, 57) 0%, rgb(8, 65, 91) 100%);
        background: -ms-linear-gradient(to right, rgb(19, 126, 57) 0%, rgb(8, 65, 91) 100%);
        background: -moz-linear-gradient(to right, rgb(19, 126, 57) 0%, rgb(8, 65, 91) 100%);
        border: 0;
        font-size: 24px;
        width: 100%;
    }
    .account-btn:hover, .account-btn:focus {
        border: 0;
        opacity: 0.9;
    }
    .account-box .form-control {
        background-color: #fbfbfb;
        border: 1px solid lightgrey;
        border-radius: 5px;
    }
    .account-box label {
        color: #1f1f1f;
        font-size: 16px;
        margin-bottom: 4px;
    }
    .account-footer {
        text-align: center;
    }
</style>

@extends('layouts.app')
@section('content')
    <div class="main-wrapper">
        <div class="account-content">
            <!-- <a href="{{ route('form/job/list') }}" class="btn btn-primary apply-btn">Apply Job</a> -->
            <div class="container">
                <div class="account-box">
                    <div class="account-wrapper">
                        <h3 class="account-title text-uppercase">Register</h3>
                        <p class="account-subtitle text-capitalize">Access to our dashboard</p>
                        
                        <!-- Account Form -->
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Your Name">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Your Email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            {{-- insert defaults --}}
                            <input type="hidden" class="image" name="image" value="photo_defaults.jpg">
                            <div class="form-group">
                                <label class="col-form-label">Role Name</label>
                                <select class="select @error('role_name') is-invalid @enderror" name="role_name" id="role_name">
                                    <option selected disabled>-- Select Role Name --</option>
                                    @foreach ($role as $name)
                                        <option value="{{ $name->role_type }}">{{ $name->role_type }}</option>
                                    @endforeach
                                </select>
                                @error('role_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Repeat Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Choose Repeat Password">
                            </div>
                            <div class="form-group text-center">
                                <button class="btn btn-secondary account-btn" type="submit">Register</button>
                            </div>
                            <div class="account-footer">
                                <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                            </div>
                        </form>
                        <!-- /Account Form -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
