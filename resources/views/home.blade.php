@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ session('g_token') }}

                    <hr/>
                    You are logged in!
                    {{ Auth::user()->email }}
                </div>
            </div>
        </div>
    </div>
</div>
<script>

</script>
@endsection
