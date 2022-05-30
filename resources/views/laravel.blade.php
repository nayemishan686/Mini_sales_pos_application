<h1>Welceme {{ $name }} laravel world.</h1>
{{
    $records = 1;
}}
@if ($records === 1)
    I have one record!
@elseif ($records > 1)
    I have multiple records!
@else
    I don't have any records!
@endif