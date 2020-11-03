@extends('layouts.shareholder.app')

@section('dashboardTitle', 'Shareholder Dashboard')


@section('dashboardContent')
    <div class="dashboard-content-container">
        <div class="dashboard-content-cover">
            <div class="dashboard-content-cover-flex">
                <div class="dashboard-content-cover-item">
                    <div class="dashboard-navigation-cover">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('shareholder.logout') }}">Logout</a></li>
                                <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $shareholder->firstname }}</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="dashboard-sidenav-cover">
                        <div class="row sidenav-row">
                            <div class="col-3 sidenav-col">
                                <ul class="nav flex-column nav-tabs" id="myTab" role="tablist" aria-orientation="vertical">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="views-tab" data-toggle="tab" href="#views" role="tab" aria-controls="views" aria-selected="false">Views</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Settings</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-9 sidenav-content-col">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="views" role="tabpanel" aria-labelledby="views-tab">
                                        <div class="vote-items-cover-flex">
                                            <div class="vote-item-cover-item">
                                                <div class="text-header-cover">
                                                    @if($shareholder && $shareholder->units > 1)
                                                        <p class="shareholder-unit-text">You have {{ $shareholder->units }} coins left to vote</p>
                                                    @else
                                                        <p class="shareholder-unit-text">You have {{ $shareholder->units }} coins left to vote.</p>
                                                    @endif
                                                </div>
                                                <div class="vote-items-list-cover">
                                                    <div class="vote-items-list-flex">
                                                        <div class="vote-items-list-item">
                                                            @if($company_votes)
                                                                @foreach($company_votes as $company_vote)
                                                                    <div class="list-item-flex">
                                                                        <div class="list-item-item" id="vote-name">
                                                                            <p class="vote-name-text">{{ $company_vote->name }}</p>
                                                                        </div>
                                                                        <div class="list-item-item" id="vote-action">
                                                                            @if($shareholder && $shareholder->units > 1)
                                                                                <div class="vote-action-flex">
                                                                                    <div class="vote-action-item">
                                                                                        <a class="vote-action-btn btn btn-primary" href="{{ route('shareholder.onVote', ['id' => $company_vote->id]) }}">{{ $shareholder->units }} Vote</a>
                                                                                    </div>
                                                                                </div>
                                                                            @endif 
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                        <div class="settings-form-container">

                                            <div class="parent-settings-form-cover">
                                                <div class="form-header">
                                                    <p class="header-title">Reset Password</p>
                                                </div>
                                                <div class="settings-form-cover-flex">
                                                    <div class="settings-form-cover-item">
                                                        @if(session()->has('password_reset'))
                                                            <div class="alert alert-success">
                                                                {{ session()->get('password_reset') }}
                                                            </div>
                                                        @endif
                                                        <div class="form-cover-div">
                                                            <form class="form-cover" id="setting-form" action="{{ route('shareholder.resetPassword') }}" method="post">
                                                                @csrf
                                                                @method('put')
                                                                <div class="input-cover-flex">
                                                                    <div class="input-cover-item">
                                                                        <label for="old-password-input">Old Password:</label><br />
                                                                        <input class="setting-input" id="old-password-input" type="password" name="old_password" placeholder="Old Password" required>
                                                                    </div>
                                                                    <div class="input-cover-item">
                                                                        <label for="new-password-input">New Password:</label><br />
                                                                        <input class="setting-input" id="new-password-input" type="password" name="new_password" placeholder="New Password" required>
                                                                    </div>
                                                                </div>
                                                                <div class="submit-btn-flex">
                                                                    <div class="submit-btn-item">
                                                                        <button class="submit-btn btn btn-primary" type="submit">Submit</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection