<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Wally's Widgets</title>

        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
    </head>
    <body class="container">
    <h1 class="text-center">Wally's Widget Company</h1>
    <div class="row">
        <div class="col-md-5">
            <form role="form" method="POST" action="{{ url('/widgets/order') }}">
                {{ csrf_field() }}
                <label>Widgets to order</label>
                <input name="order" min="0" type="number" @if (isset($order)) value="{{$order}}" @endif/>
                <button>Calculate</button>
            </form>
            @if (isset($result))
                <table class="table">
                    <thead>
                        <tr>
                            <th>Pack Size</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $key => $count)
                            <tr>
                                <td>{{$key}}</td>
                                <td>{{$count}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
        <div class="col-md-2"></div>
        <div class="col-md-5">
            <table class="table">
                <thead>
                    <tr>
                        <th>Pack Size Control Panel</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($packSizes as $packSize)
                <tr>
                    <form role="form" method="POST" action="{{ url('/packsizes') }}/{{$packSize->id}}">
                        @method('PUT')
                        {{ csrf_field() }}
                        <td><input type="number" name="packsize" value="{{$packSize->capacity}}" /></td>
                        <td><button>Update</button></td>
                    </form>
                    <td>
                        <form role="form" method="POST" action="{{ url('/packsizes') }}/{{$packSize->id}}">
                            @method('DELETE')
                            {{ csrf_field() }}
                            <button>Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                <tr>
                    <form role="form" method="POST" action="{{ url('/packsizes') }}">
                        {{ csrf_field() }}
                        <td><input min="0" type="number" name="packsize" /></td>
                        <td><button>Add</button></td>
                        <td></td>
                    </form>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>
