@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Import') }}</div>

                <div class="card-body">
                    <form action="/import-csv" method="POST"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="file"> {{ __("Select a file to upload") }}</label>
                                    <input type="file" name="file" id="file" class="form-group" enctype="multipart/form-data">
                                 </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="file"> {{ __("Type the region") }}</label>
                                    <input type="text" name="region" id="region" class="form-group">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="file"> {{ __("Type the site") }}</label>
                                    <input type="text" name="site" id="site" class="form-group">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-xs-12">
                                <div class="form-group">
                                    <label for="file"> {{ __("Type the pad") }}</label>
                                    <input type="text" name="pad" id="site" class="form-group">
                                 </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button type="submit" class="btn btn-primary">{{ __("Upload") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
