@if(count($errors) > 0)
	@foreach($errors->all() as $error)
		<p>{{ $error }}</p>
	@endforeach
@endif

@if(session()->has('login_error'))
	{{ session()->get('login_error') }}
@endif

<form action="{{ route('auth::login') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Email: <input type="email" name="email" required value="{{ old('email') }}"> <br/>
	Password: <input type="password" name="password" required> <br/>
	<input type="checkbox" name="remember" checked="{{ old('remember') }}"> Remember </br>
	<button type="submit">Submit</button>
</form>