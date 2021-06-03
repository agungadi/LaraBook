@extends('layouts.date')
@section('content')

    <form autocomplete="off">
        <div class="flex-row d-flex justify-content-center">
            <div class="col-lg-6 col-11 px-1">
                <div class="input-group input-daterange">
                    <input type="text" id="start" class="form-control text-left mr-2">
                    <label class="ml-3 form-control-placeholder" id="start-p" for="start">Start Date</label>
                    <span class="fa fa-calendar" id="fa-2"></span>

            </div>
        </div>
    </form>
    @endsection
