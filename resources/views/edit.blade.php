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
                       Title:  {!! $event->title !!} <br>
                       Start Date:  {!! $event->start_date !!} <br>
                       End Date:  {!! $event->end_date !!} <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
