@extends('layouts.app')

@section('home-u')
    <h1>User home strana</h1>

    <h2>{{ auth()->guard()->user()->name }}</h2>

    <form action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="nav-link btn btn-lg btn-secondary fw-bold border-white bg-dark">
            Logout
        </button>
    </form>

    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <button onclick="startFCM()" class="btn btn-danger btn-flat">Allow notification
                </button>
                <div class="card mt-3">
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form action="{{ route('user.send.web-notification') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Message Title</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <div class="form-group">
                                <label>Message Body</label>
                                <textarea class="form-control" name="body"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success btn-block">Send Notification</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    <div id="app" class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                @if (Session::has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <div class="card">

                    {{-- @if ($user_id == 1) --}}
                    <div class="card-header">Send push to Users</div>

                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>
                                            <form action="{{ route('user.send.web-notification') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $user->id }}" />

                                                <input class="btn btn-primary" type="submit" value="Send Push">
                                            </form>
                                        </td>
                                        <td>
                                            <input onclick="startFCM()" class="btn btn-primary" type="button"
                                                value="Create Token">
                                        </td>
                                        <td>
                                            <form action="{{ route('user.store.token') }}" method="post">
                                                @csrf
                                                {{-- <input type="hidden" name="id" value="{{ $user->id }}" /> --}}

                                                <input class="btn btn-primary" type="submit" value="Create Tokenn2">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{-- @else --}}
                    {{-- <div class="card-header">User Panel</div> --}}
                    {{-- @endif --}}
                </div>
            </div>
        </div>
    </div>

    <!-- The core Firebase JS SDK is always required and must be listed first -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.2/firebase.js"></script>
    <script>
        var firebaseConfig = {
            apiKey: "AIzaSyB1Etk64W9KSQC4g2II--xRYFFEHbZk_AI",
            authDomain: "dostava1-aa246.firebaseapp.com",
            projectId: "dostava1-aa246",
            storageBucket: "dostava1-aa246.appspot.com",
            messagingSenderId: "470348757544",
            appId: "1:470348757544:web:f64cfbf09bb7e38368531d",
            measurementId: "G-BFGX1ZD5BG"
        };
        firebase.initializeApp(firebaseConfig);
        const messaging = firebase.messaging();

        function startFCM() {
            messaging
                .requestPermission()
                .then(function() {
                    return messaging.getToken()
                })
                .then(function(response) {
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });
                    $.ajax({
                        url: '{{ route('user.store.token') }}', //updateDeviceToken func
                        type: 'POST',
                        data: {
                            token: response
                        },
                        dataType: 'JSON',
                        success: function(response) {
                            alert('Token stored.');
                        },
                        error: function(error) {
                            alert(error); //ok
                        },
                    });
                }).catch(function(error) {
                    alert(error); //there is error
                });
        }
        messaging.onMessage(function(payload) {
            const title = payload.notification.title;
            const options = {
                body: payload.notification.body,
                icon: payload.notification.icon,
            };
            new Notification(title, options);
        });
    </script>
@endsection
