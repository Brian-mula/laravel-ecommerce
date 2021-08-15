@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row ">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" style="background-color: #008b8b;"><h3><marquee>Welcome To Duka Ecommerce</marquee></h3></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header bg-dark text-white"><h3>Welcome {{Auth::user()->username}}</h3></div>

                <div class="card-body">
                <div class="mb-3 row">
                <label class="col col-form-label">Firstname</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->first_name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                <label class="col col-form-label">Last name</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->last_name}}">
                    </div>
                </div>
                <div class="mb-3 row">
                <label class="col col-form-label">email</label>
                    <div class="col">
                        <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{Auth::user()->email}}">
                    </div>
                </div>

                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
