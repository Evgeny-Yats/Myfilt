<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <aside>
                <form action="/users">

                    <div class="form-group">
                        <label for="name" class="from-control">Name</label>
                        <input type="text" class="from-control" name="name" value="{{ request()->name }}">
                    </div>

                    <div class="form-group">
                        <label for="is_active" class="from-control">is active</label> <br>
                        <label for="is_active" class="from-control">Yes</label>
                        <input type="radio" name="is_active" value="1" id="is_active" {{ request()->is_active == 1 ? 'checked' : '' }}>
                        <label for="is_not_active" class="from-control">No</label>
                        <input type="radio" name="is_active" value="0" id="is_not_active" {{ ! request()->is_active ? 'checked' : '' }}>
                    </div>

                    <div class="form-group">
                        <label for="name" class="from-control">Birthday</label>
                        <input type="text" class="from-control" name="birthday" value="{{ request()->birthday }}">
                    </div>

                    <div class="form-group">
                        <label for="name" class="from-control">Gender</label>
                        <select name="gender">
                            <option value="1" {{ request()->gender == 1 ? 'selected' : '' }}>Male</option>
                            <option value="2" {{ request()->gender == 2 ? 'selected' : '' }}>Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_from" class="from-control">Price from</label>
                        <input type="text" class="from-control" name="price_from" value="{{ request()->price_from }}">
                        <label for="price_to" class="from-control">Price to</label>
                        <input type="text" class="from-control" name="price_to" value="{{ request()->price_to }}">
                        <br>
                        <output for="fader" id="volume">
                            @if (!is_null(request()->range_price))
                                {{ request()->range_price }}
                            @else
                                0
                            @endif
                            
                        </output>
                        <br>
                        <input type="range" name="range_price" id="fader" min="0" max="200000" value="{{ request()->range_price == null ? 0 : request()->range_price}}" step="1" oninput="outputUpdate(value)">
                    </div>

                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route("users.index") }}" class="btn btn-danger">Сброс</a>
                </form>
            </aside>
        </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2">
        @foreach($users as $user)
            <div class="col col-lg-3 p-2">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $user->name }}</h5>
                        <p class="card-text">Birthday: {{ $user->info->birthday }}</p>
                        <p class="card-text">Gender: {{ $user->gender == '1' ? 'male' : 'female' }}</p>
                        <p class="card-text">Is Active: {{ $user->is_active ? 'Yes' : 'No' }}</p>
                        <p class="card-text"><span style="color: #dc3545;">$Price</span>: {{ $user->price }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
<script>
    function outputUpdate(vol) {
        var output = document.querySelector('#volume');
        output.value = vol;
        output.style.left = vol - 20 + 'px';
    }
</script>
</body>
</html>