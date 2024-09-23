<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <form action="/store" method="POST">
            @csrf
            <header>THIS IS THE CREATION PAGE</header>
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" />
            </div>
            <div class="mb-3">
                <label> Description </label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label>SerialNumber</label>
                <br />
                <input type="text" name="serialnumber" class="form-control" />
            </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        {{-- <a href='/show'>
            <button class="loginbtn" type="submit">LOGIN</button>
        </a> --}}
    </body>
</html>


