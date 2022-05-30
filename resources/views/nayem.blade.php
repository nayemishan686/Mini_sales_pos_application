<h1 style="text-align: center;">Hi, I am Nayem</h1>
<a href="{{ url('/') }}">Back Home</a>
<br>
<br>
<form action="{{ route('NayemForm'); }}" method="get">
    @csrf
    <input type="text" placeholder="Enter Your Name" name="name">
    <br>
    <input type="email" name="email" placeholder="Enter Your E-mail" id="">
    <br>
    <input type="number" name="number" placeholder="Enter Your Number" id="">
    <br>
    <input type="submit" value="Submit">
</form>