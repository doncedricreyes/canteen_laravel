

@vite('resources/css/app.css')        

<div class="ticket mx-auto">
    <img src="{{asset('/images/1681720789.jpg')}}" class="w-40 mx-auto" alt="Logo">
    <p class="text-center font-bold text-xs">RECEIPT
        <br>ID# {{$order_id}}
        <br>Seminary Road, Bagbag,
            Novaliches, Quezon City
        <br>Order# </p><br>
    <table class="w-full border-collapse border border-black mx-auto text-xs" style="width: 90%">
        <thead>
            <tr class="bg-gray-200">
                <th class="p-1" style="width: 20%">Q.</th>
                <th class="p-1" style="width: 60%">Description</th>
                <th class="p-1" style="width: 20%">&#8369;&#8369;</th>
            </tr>
        </thead>
        <tbody>
            
            @foreach($items as $i)
            <tr>
                <td class="p-1">{{$i->qty}}</td>
                <td class="p-1">{{$i->item_name}}</td>
                <td class="p-1">&#8369;{{$i->price}}</td>
            </tr>
            @endforeach
            <tr class="bg-gray-200">
                <td class="p-1"></td>
                <td class="p-1 font-bold">TOTAL</td>
                <td class="p-1 font-bold">&#8369;{{$i->total_amount}}</td>
            </tr>
        </tbody>
    </table>
    <p class="text-center text-xs">Thanks for your purchase!
    <br>https://ofmschools.com/<br>
    02 373-2973<br>
    contact@ofmschools.com
    <br><br>
    ---------------------------------
    </p>
</div>
