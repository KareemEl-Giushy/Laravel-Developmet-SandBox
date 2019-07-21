@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashbord <div class='float-right text-danger'><strong>The Average : {{ $average }}</strong></div></div>

                <div class="card-body">
                    <table class='table'>
                        <tr class='text-center'>
                            <th>-- Name --</th>
                            <th>-- E-mail --</th>
                            <th>-- Degree --</th>
                            <th>-- Class --</th>
                        </tr>
                        @foreach($students as $stu)
                            <tr>
                                <td>{{ $stu->name }}</td>
                                <td>{{ $stu->email }}</td>
                                <td>{{ $stu->degree }}</td>
                                <td>{{ $stu->className }}</td>
                            </tr>
                        @endforeach
                    </table>
                    <a href="/student/create" class='btn btn-primary'>Add A Student</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
