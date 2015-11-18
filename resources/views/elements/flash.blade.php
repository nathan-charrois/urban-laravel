@if(session()->has('flash_message'))
	{{ session('flash_message.message') }} ({{ session('flash_message.level') }})
@endif