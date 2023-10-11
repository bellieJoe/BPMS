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

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <style>
        *{
            font-family:'Times New Roman', Times, serif  !important;
        }
        .small{
            font-size: 14px !important;
        }
        .bold{
            font-weight: bold;
        }
        .border-bottom{
            border: 3px solid black;
        }
    </style>
    <title>Print Permit</title>
</head>
<body >
    <div class="">
        <img src="{{asset('public/denr_logo.jpg')}}" alt="">
    </div>
    <section class="p-3 py-5">
        <h6 class="small bold">Wildlife Transport</h6>
        <h6 class="small bold">Permit No.</h6>
        <h6 class="small bold">{{$permit->id}}</h6>

        <h5 class="text-center">LOCAL PERMIT TRANSPORT</h5>

        <p class="small">
            Pursuant to Republic Act 9157 dated July 30, 2001, Mr/Mrs/Ms <u>{{$permit->user->name}}</u> of <u>{{$permit->user->business->address}}</u> is authorized to transport to <u>{{$permit->address}}</u> the following wildlife for <u>{{$permit->purpose}}</u> purpose.
        </p>

        <hr class="border-bottom">

        <table class="small">
            <tbody>
                <tr class="border-b-1">
                    <td class="p-2">Common /Scientific Name</td>
                    <td class="text-center p-2">Description <br> Description(including parts, derivatives, marks, numbers, age and sex if any)</td>
                    <td class="p-2">Quantity</td>
                </tr>
                @foreach ($butterflies as $b)
                <tr>
                    <td>{{$b->local_name}}</td>
                    <td class="text-center">pupae</td>
                    <td>{{$species[$b->id]}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <p class="small">The above mentioned specimens shall be transported by <u>{{$permit->mode_of_transport}}</u> on or before <u>{{$permit->date_of_transport->format("F d, Y")}}</u> and have been inspected and verified to be collected/acquired on accordance with existing wildlife laws, rules and regulations.</p>
        <p class="small">Transport fee in amount of <u>Php100</u> was paid under the DENR PENRO Official Receipt No. ______ dated <u>{{$permit->updated_at->format("F d, Y")}}</u> </p>

        <p class="text-center text-italic small"><i>This permit is not valid if contains erasure or alteration</i></p>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/js/adminlte.min.js"></script>
</body>
</html>