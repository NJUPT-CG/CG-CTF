@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<style>
            .desc {
                height: 250px;
                
            }
            .photo{
                line-height: 150px;
                float:left;
                width:10%;
                margin-left:5%;
                margin-top:1%;
                vertical-align: middle;
                
            }
            .intro{
                float:right;
                width:80%;
            }
</style>
@endsection
@section('content')
            <div class="golf"></br>
                <div class="desc">
                    <div class="photo" ><img src="https://nu1lctf.com/images/logo.png" width="135"></div>
	                <div class="intro">
	                    <h3><i class="fa fa-address-card" aria-hidden="true"> About</i></h3>
                            Hi!
	                </div>
                </div>
                <br/>
               
            </div>

@endsection