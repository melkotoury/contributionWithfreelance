
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


                          <form method="POST"  action="{{ url('/password/reset') }}">
                            {!! csrf_field() !!}
                            
                             <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                              <input type="email" class="form-control" name="email" placeholder="{{ trans('lang.email') }}" value="{{ old('email') }}">
                              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                            </div>

                              @if ($errors->has('email'))
                                  <span class="help-block">
                                      <strong>{{ $errors->first('email') }}</strong>
                                  </span>
                              @endif


                            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                              <input type="password" class="form-control" placeholder="{{ trans('lang.password') }}" name="password">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif



                            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                              <input type="password" class="form-control" placeholder="{{ trans('lang.password_confirmation') }}" name="password_confirmation">
                              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                            </div>
                                  @if ($errors->has('password_confirmation'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                  @endif


                            <div class="row">
                              <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('lang.reset_password') }}</button>
                              </div>
                              <!-- /.col -->
                            </div>
                          </form>


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
















