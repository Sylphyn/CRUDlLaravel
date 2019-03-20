<!-- index.blade.php -->

@extends('layout')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>Avatar</td>
                <td>Name</td>
                <td>Age</td>
                <td>Edit</td>
                <td colspan="2">Exit</td>
            </tr>
            </thead>
            <tbody>
            @foreach($sinhvien as $sinhvien)
                <tr>
                    <td>{{$sinhvien->id}}</td>
                    <td><img src="{{$sinhvien->avatar}}"> </td>
                    <td>{{$sinhvien->name}}</td>
                    <td>{{$sinhvien->age}}</td>
                    <td><a href="{{ route('sinhvien.edit',$sinhvien->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('sinhvien.destroy', $sinhvien->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
@endsection