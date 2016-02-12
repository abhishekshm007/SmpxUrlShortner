<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<title>Bootstrap Login Form</title>
<meta name="generator" content="Bootply" />
<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="{{ asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

<link href="{{ asset('assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
<!--[if lt IE 9]>
			<script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
<link href="{{ asset('assets/css/styles.css')}}" rel="stylesheet">
</head>
<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-5">
				<div class="panel panel-default">
					<div class="panel-heading text-center main-panel-header">Smartprix
						Url Shortening</div>
					<div class="panel-body">
						<form id="short_url_form" name="short_url_form">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon" id="basic-addon1">Long Url</span> 
									<input type="text" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
								</div>
							</div>
							<div class="form-group text-right">
								<button id="submit" type="submit" class="btn center	btn-success  btn-default">Submit</button>
							</div>
							<div>
							<table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>No.</th>
                <th>Long Url</th>
                <th>Short Url</th>
                <th>Created</th>
                <th>Is active</th>
                <th>Clicks</th>
                <th>Clicks</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            </tr>
           
            
        </tbody>
    </table>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="col-md-7">
				<div class="panel panel-default">
					<div class="panel-heading text-center stats-panel-header">Analytics
						of Short Urls</div>
					<div class="panel-body">Panel content</div>
				</div>
			</div>
		</div>
	</div>



	<!--login modal-->
	<!-- <div>
  <div >
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Email">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block">Sign In</button>
              <span class="pull-right"><a href="#">Register</a></span><span><a href="#">Need help?</a></span>
            </div>
          </form>
      </div>
      <div class="modal-footer">
          <div class="col-md-12">
          <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
		  </div>	
      </div>
  </div>
  </div>
</div> -->
	<!-- script references -->
	<script src="{{ asset('assets/js/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('assets/js/dataTables.bootstrap.min.js')}}"></script>
	<script src="{{ asset('assets/js/script.js')}}"></script>
	
</body>
</html>