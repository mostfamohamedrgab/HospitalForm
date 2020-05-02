@extends('layouts.app')

@section('content')

<!--Section: Contact v.2-->
<section class="container">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">اتصل بنا</h2>

        @include('layouts.msgs')

        <!--Grid column-->
            <form action="{{ route('Contact.store') }}" method="POST">
              @csrf
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label for="name" class="d-block text-r">الاسم</label>
                            <input required type="text" id="name" value="{{old('name')}}" name="name" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                          <label class="d-block text-r" for="email">الايميل</label>
                          <input required type="text" value="{{old('email')}}" id="email" name="email" class="form-control">
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->


                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                          <label class="d-block text-r" for="message">رسالتك</label>
                          <textarea required type="text" id="message" name="message" rows="2" class="form-control md-textarea">{{old('message')}}</textarea>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

                <input  type="submit"
                style="display:block;width:20%;margin:auto;margin-top:10px"
                  class="btn btn-success"
                  value="ارسال" />
            </form>





</section>
<!--Section: Contact v.2-->

@stop
@push('css')
  <style type="text/css">
    form input {
      margin-bottom: 30px;
    }
    form textarea {
      margin-bottom: 20px
    }
  </style>
@endpush
