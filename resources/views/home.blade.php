@extends('layouts.app')
@section('script')
    <script>
        window.auth =  <?php echo json_encode(auth()->user()); ?>;
    </script>
@endsection
@section('content')
    <div class="container" v-if="! loading">
        <div class="row" v-if="actions.length > 0">
            <div class="col-md-12">
                <div class="alert alert-warning">
                    <p>Your app is running in <strong>Offline Mode</strong>, there are @{{ actions.length }} actions to be synchronized.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    <router-link to="/dashboard" class="list-group-item">Dashboard</router-link>
                    <router-link to="/authors" class="list-group-item">Authors</router-link>
                    <router-link to="/books" class="list-group-item">Books</router-link>
                </div>
            </div>

            <router-view></router-view>
        </div>
    </div>
@endsection
