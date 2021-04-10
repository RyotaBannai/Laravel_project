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
            swal("{!! session()->get('sweet_alert.alert') !!}");
        </script>
        @endif

        <input wire:model="name" type="text">
        <br>
        @error('name') <span class="error">{{ $message }}</span> @enderror
        <br>
        <button type="submit">Save</button>
    </form>
    <button wire:click="$emitUp('banner-message')">Reset</button>

</div>