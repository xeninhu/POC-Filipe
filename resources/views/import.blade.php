@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Import') }}</div>
                <form action="/import-csv" method="POST"  enctype="multipart/form-data">
                    @csrf
                    <inputfile/>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
