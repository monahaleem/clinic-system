<!-- Sidebar  -->
<nav id="sidebar">
  	<div class="sidebar-header">
  		  <h3>Nice Dental Care</h3>
  	</div>
  	<ul class="list-unstyled components">
    		<li class="active">
      			<a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
        				<div class="d-flex">
          					<div class="p-1 align-self-start"> <i class="fas fa-home"></i></div>
          					<div class="p-1 align-self-end">Home</div>
        				</div>
      			</a>
    		</li>
    		<li>
      			<a href="allpatients.html">
        				<div class="d-flex">
          					<div class="p-1 align-self-start"> <i class="fas fa-user"></i></div>
          					<div class="p-1 align-self-end">Patient</div>
        				</div>
      			</a>
    		</li>
    		<li>
      			<a href="allbillinglist.html">
        				<div class="d-flex">
          					<div class="p-1 align-self-start"> <i class="fas fa-wallet"></i></div>
          					<div class="p-1 align-self-end">Billing List</div>
        				</div>
      			</a>
    		</li>
    		<li>
      			<a href="index.html">
                <div class="d-flex">
                    <div class="p-1 align-self-start"><i class="fas fa-edit"></i></div>
                    <div class="p-1 align-self-end">Editable System</div>
                </div>
      			</a>
        </li>
  	</ul>
  	<ul class="list-unstyled CTAs">
    		<li>
            <a class="article btn-logout" href="{{ route('logout') }}"
               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
    		</li>
  	</ul>
</nav>
