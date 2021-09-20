@extends('layouts.app')
@push('custom-css')
<link href="{{asset('css/NewPost.css')}}" rel="stylesheet">
@endpush
@section('content')

     @include('includes.navbar')

<div class="container">
    <div class="row">

<div class="col-md-2"></div>

<div class="col-md-8">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
    <form class="mt-5" method="POST"  action="{{route('post.store')}}" enctype="multipart/form-data">
             @method('PUT')
             @csrf
        <!-- discreption -->
                <div class="mb-3">
                    <label for="exampleInputName" class="form-label">Caption</label>
                    <input type="text" class="form-control" name="caption" id="caption" aria-describedby="caption" placeholder="Enter Caption">
                </div>

            <!-- {{-- photo --}} -->
                <div class="mb-5">
                    <label for="exampleInputEmail1"  class="form-label">Photo</label>
                    <div class="input-group mb-3">
                        <input type="file" class="form-control" name="image" id="body">
                      </div>
                </div>


                <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>

</div>
</div>
@endsection
