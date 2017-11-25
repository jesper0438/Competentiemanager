@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    Congratz. You succesfully logged in with your GitHub-credentials. The Oauth and SSO-techniques are implemented. The technique behind this login-screen is pretty interesting. Now i am creating a new page that will describe what actually happend. As a test you can logout and set /dashboard behind the URL. You should not be able to see this. Try again to login with GitHub!

                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Some Q and A</div>

                <div class="panel-body">
 	 			<p>Have you done this by your self? </p>
 	 			<strong>Of course not...</strong>
 	 			<p>Are you storing my GitHub password in your Database?</p>
                <strong>No :-)</strong>  
                <p> Is it possible to log-in with my HZ Credentials?</p>
                <strong>Not yet. For this we need a Client ID, Client Secret and a callback-url for the Authorization itself. I will try to create good documentation, so that this can implemented in the following semester</strong>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
