@extends('layouts.app')
@section('content')
    <div class="row justify-content-center pt-5">
        <div class="col-md-5 card shadow mt-5">
            <div class="card-body px-5">
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="border-bottom border-1 border-success mb-5">
                        <h3 class="card-title text-center text-success display-6 mt-4 mb-3">PARKING LOGIN</h3>
                        <p class="card-text text-center mb-3">Welcome back, do not have account yet
                            <a href="{{route('register')}}" class="link-success text-decoration-none">Create account!</a>
                        </p>
                    </div>
                    @include('layouts.partials.notification')
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Email</label>
                        <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                    </div>
                    <div class="mb-3">
                        <label for="formFileMultiple" class="form-label">Password</label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success mt-3 mb-5 rounded-0 w-50">Login</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
