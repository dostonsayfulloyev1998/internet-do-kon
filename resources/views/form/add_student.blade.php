@extends("layouts.layout")

@section('content')

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success">  <button class="close" data-dismiss="alert">&times;</button> {{session('success')}} </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger"> {{session('error')}} </div>
        @endif
      <div class="row d-flex justify-content-center my-5">

          <form action="{{route('student.store')}}" class="w-50" method="post">
             @csrf
              <div class="form-group">
                  <label for="name">name</label>
                  <input type="text" class="form-control" name="name" id="name">
              </div>

              <div class="form-group">
                  <label for="surname">surname</label>
                  <input type="text" class="form-control" name="surname" id="surname">
              </div>

              <div class="form-group">
                  <label for="address">address</label>
                  <input type="text" class="form-control" name="address" id="address">
              </div>

              <input type="submit" value="add student" class="btn btn-primary">
          </form>
      </div>
    </div>

@endsection
