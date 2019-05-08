@extends('layouts.app')

@section('title')
Home Page
@endsection

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')
<div class="dash-content">
		<div class="container">
  			<div class="row">
    				<div class="col-md-4">
      					<div class="widget p-2">
        						<div class="d-flex text-center">
          							<div class="pr-2 pl-2 align-self-start"> <i class="fas fa-check"></i></div>
          							<div class="pr-5 align-self-center">
          								<h4>Apponintment</h4>
          							</div>
          							<div class="align-self-end">
          								<p class="num-app">13</p>
          							</div>
        						</div>
      					</div>
    				</div>
    				<div class="col-md-4">
      					<div class="widget">
        						<div class="d-flex text-center">
          							<div class="pr-2 pl-2 align-self-start"> <i class="fas fa-users"></i></div>
          							<div class="pr-5 align-self-center">
          								<h4>All Patients</h4>
          							</div>
          							<div class=" align-self-end">
          								<p class="num_user">13</p>
          							</div>
        						</div>
      					</div>
    				</div>
    				<div class="col-md-4">
      					<div class="widget">
        						<div class="d-flex text-center">
          							<div class="pr-2 pl-2 align-self-start"> <i class="fas fa-file-invoice-dollar"></i></div>
          							<div class="pr-5 align-self-center">
          								<h4>Inovices</h4>
          							</div>
          							<div class=" align-self-end">
          								<p class="num-invo">13</p>
          							</div>
        						</div>
      					</div>
    				</div>
  			</div>
		</div>
</div>

<div class="apponintment m-5">
  	<div class="container">
    		<div class="row">
      			<div class="col-md-6">
        				<div class="d-flex">
          					<div class="p-2 align-self-start"> <i class="far fa-star"></i></div>
          					<div class="p-1 align-self-end">
          						  <p class="lead font-weight-bold">New Reservation</p>
          					</div>
        				</div>
      			</div>
      			<div class="col-md-6 ">
        				<!-- Button to Open the Modal -->
        				<div class="d-flex float-right">
          					<div class="p-2 align-self-start">
            						<button type="button" class="btn btn-reversation" data-toggle="modal"
                            data-target="#myModal">Add Apponintment</button>

                        @include('front.home.add_reservation_modal')
          					</div>
        				</div>
      			</div>
    		</div>
  	</div>
</div>
<div class="clearfix"></div>

<!--calender view -->
<section class="calender-view justify-content-center">
		<div class="container">
				<div class="row">
						<div class="tile">
								<div class="col-md-12">
										{!! $calendar->calendar() !!}
								</div>
						</div>
				</div>
		</div>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection
