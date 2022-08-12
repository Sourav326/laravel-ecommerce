
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div style="text-align: center">
        @if(session()->has('message'))
            <div style="background-color: #9ee19eb8;padding: 9px;width: 23rem;text-align: center;color: green;">
                {{session('message')}}
            </div>
        @endif
        <button wire:click="increment">+ ADD</button>
        <h1>{{ $count }}</h1>
    </div>
