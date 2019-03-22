@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h4  class="card-header text-center bg-success ">Sinh viên</h4>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="btn-group-vertical" role="group" aria-label="Basic example">
                        <a type="button" style="width :690px" href="{{route('student.index')}}" class="btn btn-primary">Danh sách sinh viên</a>
                        <br>
                        <a type="button" href="{{route('student.create')}}" class="btn btn-primary">Thêm sinh viên</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
