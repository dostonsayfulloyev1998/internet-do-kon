@extends('layouts.layout')



@section('content')

    <div class="container ">
        <div ><a href="{{route('student.form')}}" class="btn btn-primary float-right"> add student</a> </div>

        @if(session('success'))
            <div class="alert alert-success">  <button class="close" data-dismiss="alert">&times;</button> {{session('success')}} </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger"> {{session('error')}} </div>
        @endif

        <div class="row d-flex justify-content-center my-5">
            <table class="table table-bordered w-75">
                <tr>
                    <th>id</th> <th>name</th> <th>surname</th>  <th>address</th> <th>action</th>
                </tr>

                @php
                @endphp

                @foreach($users as $user)

                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->surname}}</td>
                        <td>{{$user->address}}</td>
                        <td>
                            <a href="{{url('edit/'.$user->id)}}" class="btn btn-success"> edit</a>
                            <form method="post" style="display: inline-block" action="{{route('student.delete')}}">
                                @csrf
                                <input type="hidden" name="id" value="{{$user->id}}">
                                <button type="submit" class="btn btn-danger"> delete </button>
                            </form>

                            <a href="" class="btn btn-info">show</a>
                        </td>
                    </tr>

                @endforeach
            </table>
        </div>

    </div>


@endsection
