<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
    <script src="https://kit.fontawesome.com/2a90b2a25f.js" crossorigin="anonymous"></script>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <title>Permit Application</title>
</head>
<body>
    Hello <strong>{{ $permit->user->name }}</strong>,
    <p>Your applicatiobn permit has been approved</p>
    <p>Please click the button below to view your permit.</p>
    <a href="{{ route('permits.print', ['id' => $permit->id]) }}" class="btn btn-primary">View Permit</a><br><br>
</body>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
<script src="{{asset('/js/qrcodejs/qrcode.js')}}"></script>
<script type="text/javascript">
    // $(function(){
    //     new QRCode(document.getElementById("qrcode"), "{{ route('permits.print', ['id' => $permit->id]) }}");
    // })
</script>
</html>
