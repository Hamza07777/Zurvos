@include('emails._head')

<tr>
    <td style="padding-left:10px; padding-top:20px;">
        Hi {{$name}},
    </td>
</tr>
<tr>
    <td style="padding-left:10px; padding-top:10px;">
        Welcome to Fueled
    </td>
</tr>
<tr>
    <td style="padding-left:10px; padding-top:10px;">
        You can log in to the Fueled with the following information:
        <br>Email: {{$email}}
        <br>Password: {{$password}}
        <br>Log in here: <a href="https://imtekh.com/noman/zurvos/influence/login">Login To website</a>
    </td>
</tr>

@include('emails._footer')
