<div>
    <x-babeng.table-one>
        <x-slot name="thead">
            <th class="babeng-min-row text-center">No</th>
            <th class="babeng-min-row text-center">Aksi</th>
            <th>Nama</th>
            <th>Jenis</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Top Item</th>
            <th class="text-center">Photo</th>
        </x-slot>
        <x-slot name="tbody">
            @forelse ($items as $item)
            <tr>
                <td class="text-center">{{$loop->index+1}}</td>
                <td class="babeng-min-row">
                    <x-btnedit link="{{route('produk.edit',$item->id)}}"></x-btnedit>
                    <x-btndelete link="{{ route('produk.destroy', $item->id) }}"></x-btndelete>
                </td>
                <td >{{$item->name}}</td>
                <td class="babeng-min-row text-center">{{$item->jenis}}</td>
                <td class="babeng-min-row text-center">Rp. {{$item->price}}</td>
                <td class="babeng-min-row text-center">{{$item->stok}}</td>
                <td class="babeng-min-row text-center">
                <input
                type="checkbox"
                disabled
                {{ $item->top == 1 ? 'checked' : '' }}
                class="h-5 w-5 rounded {{ $item->top == 1 ? 'bg-green-500 border-green-500' : 'bg-red-500 border-red-500' }}">
                </td>

                <td class="babeng-min-row"><img src="{{Storage::url($item->image)}}" style="width: 50px; height: 50px; object-fit: cover;" alt=""></td>
                </td>
            </tr>
            @empty
            @endforelse
        </x-slot>
    </x-babeng.table-one>
</div>
