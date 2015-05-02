<h1>New Message</h1>
<strong>Name: </strong>{{ $name }}<br />
<strong>Phone: </strong>{{ substr($phone, 0, 3)."-".substr($phone, 3, 3)."-".substr($phone, 6) }}<br />
<strong>Email Address: </strong><a href="mailto:{{ $email }}">{{ $email }}</a><br />
<strong>Message: </strong> {{ $content }}