@extends('admin.layouts.index')
@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            لوحه التحكم / المسؤؤولين
          </h1>
          <hr style="border-color:#aaa"/>
          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            اضافه مسؤول جديد <i class="fa fa-user"></i>
          </button>
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
          <th scope="col">الصلاحيات</th>
          <th scope="col">##</th>
        </tr>
      </thead>
      <tbody>
        @foreach($admins as $admin)
        <tr>
          <th scope="row">{{$admin->id}}</th>
          <td>{{$admin->name}}</td>
          <td>{{$admin->email}}</td>
          <td>{{
            $admin->roles == 'manger' ? 'مدير' : 'مسؤؤول'
          }}</td>
          <td>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit-{{$admin->id}}">
              تعديل <i class="fa fa-edit"></i>
            </button>

          <form class="delete"
          style="display:inline-block"
          action="{{ route('admin.Admins.destroy',$admin->id) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" class="btn btn-danger" value="حذف" />
          </form>
          </td>
        </tr>


        <!--edit  Modal -->
      <div class="modal fade" id="edit-{{$admin->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">تعديل {{$admin->name}}</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">

              <form method="post" action="{{route('admin.Admins.update',$admin->id)}}">
                @csrf
                @method('PUT')
                <div class="form-group">
                  <label>الاسم</label>
                  <input type="text" class="form-control" required name="name" value="{{ $admin->name }}">
                </div>
                <div class="form-group">
                  <label>الايميل</label>
                  <input type="email" class="form-control"  value="{{ $admin->email }}" required name="email">
                </div>

                <div class="form-group">
                  <label>الصلاحيات</label>
                  <select class="form-control" required name="roles">
                    <option
                    {{ $admin->roles == 'supervisor' ? 'selected' : ''}}
                    value="supervisor">مسؤؤول</option>
                    <option
                    {{ $admin->roles == 'manger' ? 'selected' : ''}}
                    value="manger">مدير</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>كلمه السر</label>
                  <input type="password" class="form-control"  name="password">
                </div>


                <button type="submit" class="btn btn-primary">تعديل</button>
          </form>

            </div>
          </div>
        </div>
      </div>
        <!-- end edit model --->

        @endforeach
      </tbody>
    </table>
    <!-- start add model --->
    <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">اضافه مسؤؤول</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <form method="post" action="{{route('admin.Admins.store')}}">
            @csrf
            <div class="form-group">
              <label>الاسم</label>
              <input type="text" class="form-control" required name="name" value="{{old('name')}}">
            </div>
            <div class="form-group">
              <label>الايميل</label>
              <input type="email" class="form-control"  value="{{old('email')}}" required name="email">
            </div>

            <div class="form-group">
              <label>الصلاحيات</label>
              <select class="form-control" required name="roles">
                <option value="supervisor">مسؤؤول</option>
                <option value="manger">مدير</option>
              </select>
            </div>

            <div class="form-group">
              <label>كلمه السر</label>
              <input type="password" class="form-control" required name="password">
            </div>


            <button type="submit" class="btn btn-primary">حفظ</button>
      </form>

        </div>
      </div>
    </div>
  </div>
    <!-- end add model --->
@stop
@push('css')
  <style type="text/css">
      form {
        text-align: right !important
      }
  </style>
@endpush
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

    $('#myModal').on('shown.bs.modal', function () {
      $('#myInput').trigger('focus')
    })

  </script>
@endpush
