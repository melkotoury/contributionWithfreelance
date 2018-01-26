@extends('layouts.app')

@section('content')


<div class="main-content col-xs-12">

                <div class="content-box col-xs-12">

                    <div class="container">

                        <div class="content-right col-md-9 col-sm-9 col-xs-12">

                            <div class="sign_up-box col-xs-12">

                                <div class="sign_up-head">

                                    <h2>هل نسيت كلمة المرور ؟ </h2>

                                </div>

  
                              @if (session('status'))
                                  <div class="alert alert-success">
                                      {{ session('status') }}
                                  </div>
                              @endif


                                <div class="sign_up-body col-xs-12">


                                <form method="POST" action="{{ url('/password/email') }}">
                                  {!! csrf_field() !!}

                                            <div class="input-group {{ $errors->has('email') ? ' has-error' : '' }}">

                                                <label for="usr-mail">

                                                    <span>البريد الالكتروني</span>

                                                </label>

                                            <input type="email" name="email" class="form-control" placeholder="ادخل ايميلك هنا" value="{{ old('email') }}">

                                            </div>

                                            <button type="submit" class="btn btn-primary">ارسال</button>

                                   </form>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif


                                </div>

                            </div>

                            <!-- end submit-box -->

                        </div>

                        <!-- end contnent-right -->



                        <div class="content-left col-md-3 col-sm-3 col-xs-12">

                        <div class="content-extra col-xs-12">

                            <div class="mobile-widget col-xs-12">

                                    <div class="widget-head col-xs-12">

                                        <h2>تطبيق لو خيروك</h2>

                                    </div>

                                    <div class="mob-img col-md-12 col-xs-12">

                                        <img src="images/m.png" alt="">

                                    </div>

                                    <div class="mob-data col-md-12 col-xs-12">

                                        <p>تستطيع الان الحصول علي تطبيق الموبايل الخاص بالموقع من خلال </p>

                                        <ul>

                                            <li>

                                                <a href="#">

                                                    <i class="fa fa-android"></i> متجر اندرويد

                                                </a>

                                            </li>

                                            <li>

                                                <a href="#">

                                                    <i class="fa fa-apple"></i> متجر اَبل

                                                </a>

                                            </li>

                                        </ul>

                                    </div>

                                </div>

                                <!-- end mobile-widget -->

                                </div>

                        </div>

                        <!-- end contnent-left -->

                    </div>

                    <!-- end container -->

                </div>

                <!-- end content-box -->

            </div>

            <!-- end main-content -->


@endsection









