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

                    <button type="submit" class="btn btn-primary">Filter</button>
                    <a href="{{ route("users.index") }}" class="btn btn-warning">Сброс</a>
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
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
</body>
</html>