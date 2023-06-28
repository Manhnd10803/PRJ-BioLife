<div style="width=600px; margin: 0 auto">
    <div style="text-align: center">
        <h2>Hi, {{ $data['name'] }}</h2>
        <p>This email helps you recover your forgotten account password</p>
        <p>Please click on the link below to reset your password</p>
        <p><a href="{{ route('new-password', ['id' => $data['id'], 'token' => $data['remember_token']] ) }}">Password retrieval</a></p>
    </div>
</div>