@extends('admin.layouts.adminmaster')

@section('title')
    Welcome!
@endsection

@section('content')

    <form action="{{ route('regdoctors') }}" method="post" class="register">
        <h1>Registration</h1>


        <div class="form-group center-form ">
            <div class="row">
                <div class="col-sm-4">
                    <img src="/uploads/avatar/{{$user->avatar}}">

                </div>



            </div>
        </div>

        <!--start account details-->
        <fieldset class="row1">
            <legend>Account Details
            </legend>


            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">First Name*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="first_name" placeholder="First Name" value="{{ Request::old('first_name') }}">
                        @if ($errors->has('first_name')) <p class="help-block">{{ $errors->first('first_name') }}</p> @endif
                    </div>

                    <div class="col-sm-2">
                        <label for="index" class="control-label">Last Name*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('last_name') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="last_name" placeholder="Last Name" value="{{ Request::old('last_name') }}">
                        @if ($errors->has('last_name')) <p class="help-block">{{ $errors->first('last_name') }}</p> @endif
                    </div>

                </div>
            </div>



             <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Email*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                        <input type="email" class="form-control" name="email" placeholder="E-mail" value="{{ Request::old('email') }}">
                        @if ($errors->has('email')) <p class="help-block">{{ $errors->first('email') }}</p> @endif
                    </div>

                    <div class="col-sm-2">
                        <label for="index" class="control-label">Password*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                        <input type="password" class="form-control" name="password" placeholder="Password" value="{{ Request::old('first_name') }}">
                        @if ($errors->has('password')) <p class="help-block">{{ $errors->first('password') }}</p> @endif
                    </div>

                </div>
            </div>



            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">obligatory fields*</label>
                    </div>
                </div>
            </div>

        </fieldset>
        <!--end account details-->

        <fieldset class="row2">
            <!--start personal details-->
            <legend>Personal Details
            </legend>


            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Phone*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('phone_number') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="phone_number" placeholder="Phone Number" value="{{ Request::old('phone_number') }}">
                        @if ($errors->has('phone_number')) <p class="help-block">{{ $errors->first('phone_number') }}</p> @endif
                    </div>

                    <div class="col-sm-2">
                        <label for="index" class="control-label">Street*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('street') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="street" placeholder="Street" value="{{ Request::old('street') }}">
                        @if ($errors->has('street')) <p class="help-block">{{ $errors->first('street') }}</p> @endif
                    </div>

                </div>
            </div>


            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">City*</label>
                    </div>

                    <div class="col-sm-6 myColumn form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="city" placeholder="City" value="{{ Request::old('city') }}">
                         @if ($errors->has('city')) <p class="help-block">{{ $errors->first('city') }}</p> @endif
                    </div>
                </div>
            </div>



            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Website*</label>
                    </div>

                    <div class="col-sm-6 myColumn">
                        <input type="text" class="form-control" name="website"   value="http://">
                    </div>
                </div>
            </div>

        </fieldset>
        <!--end personal details-->


        <fieldset class="row3">
            <!--start professional details-->
            <legend>Professional Details
            </legend>

            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Registration Number*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('register_nb') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="register_nb" placeholder="Registration Number" value="{{ Request::old('register_nb') }}">
                        @if ($errors->has('register_nb')) <p class="help-block">{{ $errors->first('register_nb') }}</p> @endif
                    </div>



                    <div class="col-sm-2">
                        <label for="index" class="control-label">University (For MBBS)*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('mbbs_uni') ? 'has-error' : '' }}">
                        <input type="text" class="form-control" name="mbbs_uni"  value="University Of ">
                        @if ($errors->has('mbbs_uni')) <p class="help-block">{{ $errors->first('mbbs_uni') }}</p> @endif
                    </div>

                </div>
            </div>

            <div class="form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">University (For PHD)*</label>
                    </div>

                    <div class="col-sm-6 myColumn">
                        <input type="text" class="form-control" name="phduniversity"  value="University Of ">
                    </div>
                </div>
            </div>

            <div class="country form-group center-form ">
                <div class="row">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Specific Field*</label>
                    </div>

                    <div class="drop col-sm-6 myColumn form-group {{ $errors->has('field') ? 'has-error' : '' }}">
                        <select name="field">
                            <option>
                            </option>
                            @foreach($fields as $field)
                            <option value={{$field->field }}>{{$field->field}}
                            </option>
                            @endforeach
                        </select>
                        <a href="#">(Click here to add field)</a>
                    </div>
                    @if ($errors->has('field')) <p class="help-block">{{ $errors->first('field') }}</p> @endif
                </div>
            </div>



            <div class="form-group center-form" >
                <div class="row">
                    <div class="col-sm-2">
                        <label for="description" class="control-label">Experiences and Notes</label>
                    </div>

                    <div class="col-sm-6 myColumn form-group {{ $errors->has('notes') ? 'has-error' : '' }}">
                        <textarea class="form-control" name="notes" rows="6"></textarea>
                        @if ($errors->has('notes')) <p class="help-block">{{ $errors->first('notes') }}</p> @endif
                    </div>
                </div>
            </div>

        </fieldset>
        <!--end professional details-->



        <fieldset class="row4">
            <!--start extra informations-->
            <legend>Further Information
            </legend>

            <div class=" center-form  ">
                <div class="row form-group {{ $errors->has('gender') ? 'has-error' : '' }} ">
                    <div class="col-sm-2">
                        <label for="index" class="control-label">Gender*</label>
                    </div>

                    <div class="col-sm-2 myColumn form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                        <input type="radio" value="Male" name="gender"/>
                        <label class="gender">Male</label>
                    </div>
                    <div class="col-sm-2 myColumn form-group {{ $errors->has('gender') ? 'has-error' : '' }}">
                            <input type="radio" value="Female" name="gender"/>
                        <label class="gender">Female</label>

                    </div>

                    @if ($errors->has('gender')) <p class="help-block">{{ $errors->first('gender') }}</p> @endif
                </div>

            </div>

            <div class="form-group center-form" >
                <div class="row">
                    <div class="col-sm-2">
                        <label for="joinedDate" class="control-label">Birth Date*</label>
                    </div>

                    <div class="col-sm-4 myColumn form-group {{ $errors->has('date') ? 'has-error' : '' }}">
                        <input class="form-control" type="date" name="date" data-date-inline-picker="true" />
                        @if ($errors->has('date')) <p class="help-block">{{ $errors->first('date') }}</p> @endif
                    </div>
                </div>
            </div>

        </fieldset>
        <!--end extra informations-->


        <div>
            <button class="button" type="submit">Register</button>
            <input type="hidden" value="{{ Session::token() }}" name="_token">
        </div>
    </form>

    <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Post</h4>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="post-body">Edit the Post</label>
                            <textarea class="form-control" name="post-body" id="post-body" rows="5"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="modal-save">Save changes</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        var token = '{{ Session::token() }}';
        var urlEdit='{{route('addfield')}}';
    </script>

@endsection