@extends('layouts.layout')

@section('content')

     <div class="container">
            <div class="row">

                <form action="{{url('update/'.$students['id'])}}" class="w-50" method="post">

                    @csrf
                    <input type="hidden" name="id" value="{{$students['id']}}">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{$students['name']}}">
                    </div>

                    <div class="form-group">
                        <label for="surname">surname</label>
                        <input type="text" class="form-control" name="surname" id="surname" value="{{$students['surname']}}">
                    </div>

                    <div class="form-group">
                        <label for="address">address</label>
                        <input type="text" class="form-control" name="address" id="address" value="{{$students['address']}}">
                    </div>

                    <input type="submit" value="add student" class="btn btn-primary">
                </form>

            </div>
     </div>

@endsection
