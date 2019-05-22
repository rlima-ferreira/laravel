@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col m8 offset-2">
            <div class="card" style="padding: 30px">
                <h4>Dashboard</h4>

                <div class="card-content">
                    @if (session('status'))
                        <p class="flow-text">
                            {{ session('status') }}
                        </p>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
