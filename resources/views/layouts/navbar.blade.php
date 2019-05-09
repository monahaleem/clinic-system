<nav class="navbar navbar-expand-lg navbar-light bg-light">
  	<div class="container-fluid">
    		<button type="button" id="sidebarCollapse" class="btn btn-info btn-tog"> <i class="fas fa-align-left"></i>
    			   <span></span>
    		</button>
    		<button class="btn btn-dark d-inline-block d-lg-none ml-auto " type="button" data-toggle="collapse"
          data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
          aria-label="Toggle navigation">
            <i class="fas fa-align-justify"></i>
    		</button>
    		<div class="input-group">
      			<input class="form-control border-secondary py-2" type="search" value="" placeholder="Search">
      			<div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">Search</button>
      			</div>
    		</div>
    		<div class="collapse navbar-collapse" id="navbarSupportedContent">
      			<ul class="nav navbar-nav ml-auto">
        				<div class="btn-group mr-1">
          					<button type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                      aria-expanded="false"> <i class="fas fa-bell"></i>
          					</button>
                    <div id="notifications-body" class="be-notifications dropdown-menu dropdown-menu-right" style="width: 350px">
                      <?php
                        $colors = [
                          '#F44336', '#E91E63', '#9C27B0', '#673AB7', '#3F51B5', '#2196F3', '#00BCD4', '#009688',
                          '#4CAF50', '#8BC34A', '#CDDC39', '#FFC107', '#FF9800', '#FF5722', '#795548', '#607D8B'
                        ];
                      ?>
                        @if($notifications = auth()->user()->notifications)
                            @foreach($notifications as $notification)
                            <li class="notification notification-unread">
                              <a href="#">
                                <div class="image" style="background: {{ $colors[array_rand($colors, 1)] }}; color: #FFF;">
                                  <i class="far fa-user" style="margin-top: 10px;"></i>
                                </div>
                                <div class="notification-info">
                                  <div class="text">
                                    {{ $notification->data['message'] }}
                                    <button style="background: none; border: none;"
                                      data-id="{{ $notification->id }}">
                                      <i class="fa fa-check" style="font-size: 14px;"></i>
                                    </button>
                                  </div>
                                  <span class="date">{{ $notification->created_at->diffForHumans() }}</span>
                                </div>
                              </a>
                            </li>
                            @endforeach
                        @endif
                    </div>
        				</div>
        				<li class="nav-item user">
                    <a class="nav-link" href="#">
                        {{ ucfirst(auth()->user()->type) }} <i class="far fa-user"></i>
                    </a>
        				</li>
      			</ul>
    		</div>
  	</div>
</nav>
