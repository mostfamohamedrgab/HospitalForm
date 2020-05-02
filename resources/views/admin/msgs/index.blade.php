@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم / الرسائل
          </h1>
          
          <hr style="border-color:#aaa"/>
          </section>
          @include('layouts.msgs')
        <!-- Main content -->
        <section class="content">

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">الاسم</th>
          <th scope="col">الايميل</th>
          <th scope="col">الرساله</th>
          <th scope="col">##</th>
        </tr>
      </thead>
      <tbody>
        @foreach($msgs as $msg)
        <tr>
          <th scope="row">{{$msg->id}}</th>
          <td>{{$msg->name}}</td>
          <td>{{$msg->email}}</td>
          <td>{{$msg->message}}</td>
          <td>
            <a
              class="delete btn btn-danger"
              href="{{ route('admin.msgs.delete',$msg->id) }}">حذف
              <i class="fa fa-trash-o"></i>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>



@stop
@push('js')
  <script>

    $(document).on('click','.delete', function (e){

      if( confirm('تاكيد ؟') )
      {
        return true;
      }else{
        return false;
      }

    });


  </script>
@endpush
