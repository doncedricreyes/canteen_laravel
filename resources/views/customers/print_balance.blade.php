

@vite('resources/css/app.css')        

<div class="mx-auto ticket">
    <img src="{{asset('/images/logo.jpg')}}" class="mx-auto w-14" alt="Logo">
    <p class="text-xs font-bold text-center">RECEIPT
       
        <br>Seminary Road, Bagbag,
            Novaliches, Quezon City
        <br></p>
    <table class="w-full mx-auto text-xs border border-collapse border-black" style="width: 90%">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-1" style="width: 20%">Name</th>
                <th class="p-1" style="width: 60%">Description</th>
                <th class="p-1" style="width: 20%">&#8369;&#8369;</th>
            </tr>
        </thead>
        <tbody>
        
            <tr>
                <td class="p-1"></td>
                <td class="p-1">Previous Balance</td>
                <td class="p-1">&#8369;{{$balance->old_balance}}</td>
            </tr>


            <tr>
                <td class="p-1">{{$customer->lastname}}, {{$customer->firstname}} {{$customer->middlename}}</td>
                <td class="p-1">Added Balance</td>
                <td class="p-1">&#8369;{{$balance->added_balance}}</td>
            </tr>

            <tr class="bg-gray-200">
                <td class="p-1"></td>
                <td class="p-1 font-bold">TOTAL BALANCE</td>
                <td class="p-1 font-bold">&#8369;{{$balance->new_balance}}</td>
            </tr>
        </tbody>
    </table>
    <p class="text-xs text-center">Thanks for your purchase!
    <br>https://ofmschools.com/<br>
    02 373-2973<br>
    contact@ofmschools.com
    <br><br>
    ---------------------------------
    </p>
</div>
<script>

</script>