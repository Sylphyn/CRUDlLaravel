<!-- edit.blade.php -->

@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Student
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form method="post" action="{{ route('student.update', $student->id) }}" enctype="multipart/form-data">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="name">Name:</label>
                <input type="text" class="form-control" name="name" value="{{$student->name}}"/>
            </div>
            <div class="form-group">
                <label for="age">Age:</label>
                <input type="text" class="form-control" name="age" value="{{$student->age}}"/>
            </div>
            <div class="input-group">
                <div class="custom-file">
                    <label  class="custom-file-label">Choose File</label>
                    <input  type="file" class="custom-file-input" name="avatar" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Student</button>
        </form>
    </div>
</div>
@endsection
@section('jsCustom')
    <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
            console.log(111);
            var fileName = $(this).val().split("\\").pop();
            console.log(fileName);
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
    </script>
@endsection
    a
