@extends('layouts.admin.app')

@section('dashboardTitle', 'Admin Dashboard')


@section('dashboardContent')
    <div class="dashboard-content-container">
        <div class="dashboard-content-cover">
            <div class="dashboard-content-cover-flex">
                <div class="dashboard-content-cover-item">
                    <div class="dashboard-navigation-cover">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.logout') }}">Logout</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="dashboard-sidenav-cover">
                        <div class="row sidenav-row">
                            <div class="col-3 sidenav-col">
                                <ul class="nav flex-column nav-tabs" id="myTab" role="tablist" aria-orientation="vertical">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="settings-tab" data-toggle="tab" href="#settings" role="tab" aria-controls="settings" aria-selected="true">Settings</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="create-tab" data-toggle="tab" href="#create" role="tab" aria-controls="create" aria-selected="false">Create</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="views-tab" data-toggle="tab" href="#views" role="tab" aria-controls="views" aria-selected="false">Views</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Edit</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="reports-tab" data-toggle="tab" href="#reports" role="tab" aria-controls="reports" aria-selected="false">Reports</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-9 sidenav-content-col">
                                <div class="tab-content" id="tabContent">
                                    <div class="tab-pane fade show active" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                                        <div class="settings-form-container">
                                            <div class="settings-form-cover-flex">
                                                <div class="settings-form-cover-item">
                                                    <div class="form-cover-div">
                                                        <form class="form-cover" id="setting-form" action="" method="post">
                                                            @csrf
                                                            @method('put')
                                                            <div class="input-cover-flex">
                                                                <div class="input-cover-item">
                                                                    <label for="old-password-input">Old Password:</label><br />
                                                                    <input class="setting-input" id="old-password-input" type="password" placeholder="Old Password" required>
                                                                </div>
                                                                <div class="input-cover-item">
                                                                    <label for="new-password-input">New Password:</label><br />
                                                                    <input class="setting-input" id="new-password-input" type="password" placeholder="New Password" required>
                                                                </div>
                                                            </div>
                                                            <div class="submit-btn-flex">
                                                                <div class="submit-btn-item">
                                                                    <button class="submit-btn btn btn-primary" type="button">Submit</button>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="create" role="tabpanel" aria-labelledby="create-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="create-shareholders-tab" data-toggle="tab" href="#create-shareholders" role="tab" aria-controls="shareholders" aria-selected="true">Shareholders</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="create-vote-items-tab" data-toggle="tab" href="#create-vote-items" role="tab" aria-controls="vote-items" aria-selected="false">Vote Items</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="create-shareholders" role="tabpanel" aria-labelledby="shareholders-tab">
                                                <div class="shareholders-form-container">
                                                    <div class="shareholders-form-cover-flex">
                                                        <div class="shareholders-form-cover-item">
                                                            <div class="form-cover-div">
                                                                <form class="form-cover" id="shareholder-form" action="" method="post">
                                                                    @csrf
                                                                    <div class="input-cover-flex">
                                                                        <div class="input-cover-item">
                                                                            <label for="firstname-input">Firstname:</label><br />
                                                                            <input class="shareholder-input" id="firstname-input" type="text" placeholder="Firstname" required>
                                                                        </div>
                                                                        <div class="input-cover-item">
                                                                            <label for="lastname-input">Lastname:</label><br />
                                                                            <input class="shareholder-input" id="lastname-input" type="text" placeholder="Lastname" required>
                                                                        </div>
                                                                        <div class="input-cover-item">
                                                                            <label for="email-input">Email:</label><br />
                                                                            <input class="shareholder-input" id="email-input" type="text" placeholder="Email" required>
                                                                        </div>
                                                                        <div class="input-cover-item">
                                                                            <label for="password-input">Password:</label><br />
                                                                            <input class="shareholder-input" id="password-input" type="text" placeholder="Password" required>
                                                                        </div>
                                                                        <div class="input-cover-item">
                                                                            <label for="company-input">Companies:</label><br />
                                                                            <select class="shareholder-input" id="company-input" required>
                                                                                <option value="" selected>Choose a company</option>
                                                                                @if($companies)
                                                                                    @foreach($companies as $company)
                                                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="submit-btn-flex">
                                                                        <div class="submit-btn-item">
                                                                            <button class="submit-btn btn btn-primary" type="button">Submit</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="create-vote-items" role="tabpanel" aria-labelledby="vote-items-tab">
                                                <div class="shareholders-form-container">
                                                    <div class="shareholders-form-cover-flex">
                                                        <div class="shareholders-form-cover-item">
                                                            <div class="form-cover-div">
                                                                <form class="form-cover" id="vote-item-form" action="" method="post">
                                                                    @csrf
                                                                    <div class="input-cover-flex">
                                                                        <div class="input-cover-item">
                                                                            <label for="vote-name-input">Name of Vote:</label><br />
                                                                            <input class="vote-item-input" id="vote-name-input" type="text" placeholder="Name of Vote" required>
                                                                        </div>
                                                                        <div class="input-cover-item">
                                                                            <label for="company-input">Companies:</label><br />
                                                                            <select class="shareholder-input" id="company-input" required>
                                                                                <option value="" selected>Choose a company</option>
                                                                                @if($companies)
                                                                                    @foreach($companies as $company)
                                                                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                                                                    @endforeach
                                                                                @endif
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="submit-btn-flex">
                                                                        <div class="submit-btn-item">
                                                                            <button class="submit-btn btn btn-primary" type="button">Submit</button>
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
                                    <div class="tab-pane fade" id="views" role="tabpanel" aria-labelledby="views-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="views-shareholders-tab" data-toggle="tab" href="#views-shareholders" role="tab" aria-controls="shareholders" aria-selected="true">Shareholders</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="views-vote-items-tab" data-toggle="tab" href="#views-vote-items" role="tab" aria-controls="vote-items" aria-selected="false">Vote Items</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="views-vote-counts-tab" data-toggle="tab" href="#views-vote-counts" role="tab" aria-controls="vote-counts" aria-selected="false">Vote Counts</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="views-shareholders" role="tabpanel" aria-labelledby="shareholders-tab">
                                                <div class="shareholder-view-table-cover-flex">
                                                    <div class="shareholder-view-table-cover-item">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <caption>List of Shareholders</caption>
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Firstname</th>
                                                                        <th scope="col">Lastname</th>
                                                                        <th scope="col">Email</th>
                                                                        <th scope="col">Units</th>
                                                                        <th scope="col">Compnay</th>
                                                                        <th scope="col" colspan="2">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                @if($shareholders && $companies)
                                                                    @foreach($shareholders as $shareholder)
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row">#</th>
                                                                                <td>{{ $shareholder->firstname }}</td>
                                                                                <td>{{ $shareholder->lastname }}</td>
                                                                                <td>{{ $shareholder->email }}</td>
                                                                                <td>{{ $shareholder->units }}</td>
                                                                                <td>{{ $companies[$shareholder->company_id]['name'] }}</td>
                                                                                <td>Button 1</td>
                                                                                <td>Button 2</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="views-vote-items" role="tabpanel" aria-labelledby="vote-items-tab">
                                                <div class="vote-item-view-table-cover-flex">
                                                    <div class="vote-item-view-table-cover-item">
                                                        <div class="table-responsive">
                                                            <table class="table table-striped">
                                                                <caption>List of vote items</caption>
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">#</th>
                                                                        <th scope="col">Name of Vote</th>
                                                                        <th scope="col">Compnay</th>
                                                                        <th scope="col" colspan="2">Action</th>
                                                                    </tr>
                                                                </thead>
                                                                @if($vote_items && $companies)
                                                                    @foreach($vote_items as $vote_item)
                                                                        <tbody>
                                                                            <tr>
                                                                                <th scope="row"></th>
                                                                                <td>{{ $vote_item->name }}</td>
                                                                                <td>{{ $companies[$vote_item->company_id]['name'] }}</td>
                                                                                <td>Button 1</td>
                                                                                <td>Button 2</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    @endforeach
                                                                @endif
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="views-vote-counts" role="tabpanel" aria-labelledby="vote-counts-tab">...</div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="edit-vote-items-tab" data-toggle="tab" href="#edit-vote-items" role="tab" aria-controls="vote-items" aria-selected="false">Vote Items</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="edit-shareholders" role="tabpanel" aria-labelledby="shareholders-tab"></div>
                                            <div class="tab-pane fade" id="edit-vote-items" role="tabpanel" aria-labelledby="vote-items-tab">
                                                @if($vote_items && $companies)
                                                    @foreach($vote_items as $vote_item)
                                                        <div class="table-responsive">
                                                            <form class="form-cover" id="vote-item-form" action="" method="post">
                                                            @csrf
                                                            @method('put')
                                                                <table class="table table-striped">
                                                                    <caption>List of vote items</caption>
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Name of Vote</th>
                                                                            <th scope="col">Compnay</th>
                                                                            <th scope="col" colspan="2">Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <th scope="row">#</th>
                                                                            <td><input class="vote-item-input" id="vote-name-input" type="text" value="{{ $vote_item->name }}" placeholder="Name of Vote" required></td>
                                                                            <td><select class="vote-item-input" id=""><option value="{{ $vote_item->company_id }}" selected>{{ $companies[$vote_item->company_id]['name'] }}</select></td>
                                                                            <td>Button 1</td>
                                                                            <td>Button 2</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </form>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="reports" role="tabpanel" aria-labelledby="reports-tab">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link active" id="reports-shareholders-tab" data-toggle="tab" href="#reports-shareholders" role="tab" aria-controls="shareholders" aria-selected="true">Shareholders</a>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <a class="nav-link" id="reports-vote-items-tab" data-toggle="tab" href="#reports-vote-items" role="tab" aria-controls="vote-items" aria-selected="false">Vote Items</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="reports-shareholders" role="tabpanel" aria-labelledby="shareholders-tab">...</div>
                                            <div class="tab-pane fade" id="reports-vote-items" role="tabpanel" aria-labelledby="vote-items-tab">...</div>
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