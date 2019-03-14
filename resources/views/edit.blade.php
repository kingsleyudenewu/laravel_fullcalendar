<?php
/**
 * Created by Kingsley.
 * User: apple
 * Date: 14/03/2019
 * Time: 11:12 AM
 */

?>

@extends('layout.main')

@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @include('flash::message')
            </div>
        </div>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        {!! $event->title !!} Appointment
                    </div>
                    <div class="card-body">
                        <form action="{{ route('events.update', $event->id) }}" method="post">
                            {{ method_field('PATCH') }}
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{$event->title}}" required>
                            </div>
                            <div class="form-group">
                                <label for="">Start Date</label>
                                <input type="text" class="form-control datepicker" id="start_date" name="start_date" value="{{ $event->start_date }}" required>
                            </div>
                            <div class="form-group">
                                <label for="">End Date</label>
                                <input type="text" class="form-control datepicker" id="end_date" name="end_date" value="{{ $event->end_date }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>



                       {{--Title:  {!! $event->title !!} <br>--}}
{{--                       Start Date:  {!! $event->start_date !!} <br>--}}
                       {{--End Date:  {!! $event->end_date !!} <br>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
    <script>
        $(document).ready(function () {
            $(".datepicker").datepicker({
                format: "yyyy-mm-dd",
                todayBtn: "linked",
                todayHighlight: true,
                autoclose: true
            });
        })
    </script>
@endsection
