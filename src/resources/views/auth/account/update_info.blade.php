@extends('backpack::layout')

@section('header')
<div class="container">
    <div class="page-header">
        <h1 class="page-title">
          {{ trans('backpack::base.my_account') }}
        </h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @include('backpack::auth.account.sidemenu')
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ trans('backpack::base.update_account_info') }}</h3>
                </div>
                <div class="card-body">
                    <form class="form" action="{{ route('backpack.account.info') }}" method="post">

                        {!! csrf_field() !!}

                        <div class="box padding-10">

                            <div class="box-body backpack-profile-form">

                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if ($errors->count())
                                    <div class="alert alert-danger">
                                        <ul class="mb-0">
                                            @foreach ($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif

                                <div class="form-group">
                                    @php
                                        $label = trans('backpack::base.name');
                                        $field = 'name';
                                    @endphp
                                    <label class="form-label">{{ $label }} <span class="form-required">*</span></label>
                                    <input required class="form-control" type="text" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                                </div>

                                <div class="form-group">
                                    @php
                                        $label = config('backpack.base.authentication_column_name');
                                        $field = backpack_authentication_column();
                                    @endphp
                                    <label class="form-label">{{ $label }} <span class="form-required">*</span></label>
                                    <input required class="form-control" type="{{ backpack_authentication_column()=='email'?'email':'text' }}" name="{{ $field }}" value="{{ old($field) ? old($field) : $user->$field }}">
                                </div>

                                <div class="form-group m-b-0">
                                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> {{ trans('backpack::base.save') }}</button>
                                    <a href="{{ backpack_url() }}" class="btn btn-default">{{ trans('backpack::base.cancel') }}</a>
                                </div>

                            </div>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
