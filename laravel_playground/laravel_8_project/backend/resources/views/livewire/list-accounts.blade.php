 <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('List User') }}
    </h2>
</x-slot>

<div>
    The first livewire.
    @foreach($accounts as $account)
        {{ $account->name }}
        <br>
    @endforeach
    <form wire:submit.prevent="save">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        @if (session()->has('sweet_alert.alert'))
        <script>
            // swal("{!! session()->get('sweet_alert.alert') !!}");
            toastr.warning("{!! session()->get('sweet_alert.alert') !!}");
        </script>
        @endif

        <input wire:model="name" type="text">
        <br>
        {{-- @error('name') 
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Holy smokes!</strong>
                <span class="block sm:inline">{{ $message }}</span>
            </div>
        @enderror --}}
        <x-jet-input-error for="name"></x-jet-input-error>
        <br>
        <x-jet-action-message class="ml-3" on="saved">Done</x-jet-action-message>
        <x-jet-button wire:loading.attr="disabled">Save</x-jet-button>
    </form>
    <button wire:click="$emitUp('banner-message')">Reset</button>

</div>
