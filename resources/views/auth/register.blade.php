<form action="{{ route('auth::register') }}" method="POST">
	<input type="hidden" name="_token" value="{{ csrf_token() }}">
	Name: <input type="text" name="name" required> <br/>
	Email: <input type="email" name="email" required> <br/>
	Password: <input type="password" name="password" required> <br/>
	Password Confirmation: <input type="password" name="password_confirmation" required> <br/>
	
	<button type="submit">Submit</button>
</form>