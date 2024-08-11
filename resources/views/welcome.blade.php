@extends('layouts.layout')

@section('content')
<div class="container">
    All Coffee
    <div>
        <input type="text" id="name" name="name" required value="search">
    </div>
    <div>
        <label for="beverage">Choose a beverage:</label>
        <select id="beverage" name="beverage">
            <option value="latte">Latte</option>
            <option value="coffee">Coffee</option>
        </select>

    </div>
</div>
@endsection