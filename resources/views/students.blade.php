@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Student <a href="../student" class='float-right'>Go To Dashbord</a></div>

                <div class="card-body">
                    <form action='/store' method='post'>
                        <label for="name">Name:-</label>
                        <input type="text" name='name'>
                        <label for="email">Email:-</label>
                        <input type="email" name='email'>
                        <label for="classes">Class:-</label>
                        <select name="classes">
                        @foreach ($classes as $class)
                            <option value="{{ $class['id'] }}" autofocus>{{ $class['className'] }}</option>
                        @endforeach
                        </select>
                        <input type="submit" class='btn btn-success float-right'>
                        <div class='clearfix'></div>
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
