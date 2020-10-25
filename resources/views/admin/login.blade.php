@extends('layouts.admin.app')

@section('loginTitle', 'Admin Login')

@section('loginContent')
    <div class="login-content-container">
        <div class="login-content-cover">
            <div class="login-form-cover-flex">
                <div class="login-form-cover-item">
                    <div class="login-form-cover">
                        <form class="login-form" id="" action="{{ route('admin.login') }}" method="post">
                            @csrf
                            <div class="login-input-cover-flex">
                                <div class="login-input-cover-item">
                                    <label for="email-input">Email:</label><br />
                                    <input class="login-input" id="email-input" type="text" placeholder="Email" required>
                                </div>
                                <div class="input-cover-item">
                                    <label for="email-input">Password:</label><br />
                                    <input class="login-input" id="password-input" type="password" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="btn-cover-flex">
                                <div class="btn-cover-item">
                                    <button class="input-btn btn-primary" id="" type="button">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

