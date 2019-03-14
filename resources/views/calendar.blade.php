<?php
/**
 * Created by Kingsley.
 * User: apple
 * Date: 14/03/2019
 * Time: 12:22 AM
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
                        Laravel Full Calendar
                    </div>
                    <div class="card-body">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary d-flex flex-row-reverse bd-highlight" data-toggle="modal" data-target="#exampleModal" style="margin: 10px auto;">
                            Add Appointment
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/events" method="post">
                                            {{ csrf_field() }}
                                            <div class="form-group">
                                                <label for="">Title</label>
                                                <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">Start Date</label>
                                                <input type="text" class="form-control datepicker" id="start_date" name="start_date" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="">End Date</label>
                                                <input type="text" class="form-control datepicker" id="end_date" name="end_date" required>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </form>
                                    </div>
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
                                        {{--<button type="button" class="btn btn-primary">Save changes</button>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        {!! $calendar->calendar() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
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
    {!! $calendar->script() !!}
@endsection