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
            <tr style="font-size:25px ; background-color:#81858f " >
                <td>ID</td>
                <td>Avatar</td>
                <td>Name</td>
                <td>Age</td>
                <td></td>
                <td ></td>
            </tr>
            </thead>
            <tbody>
            @foreach($student as $student)
                <tr style="font-size: 20px">
                    <td>{{$student->id}}</td>
                    <td><img src="image/{{$student->avatar}}"> </td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->age}}</td>
                    <td style="text-align: right"><a href="{{ route('student.edit',$student->id)}}" class="btn btn-primary">Edit</a></td>
                    <td style="text-align: left">
                        <form action="{{ route('student.destroy', $student->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a style="font-size: large "   href="{{route('home')}}">Home</a>
        </div>
@endsection