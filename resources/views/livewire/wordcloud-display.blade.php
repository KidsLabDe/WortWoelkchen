<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    Hier ist die Wortwolke: {{ time() }}
    @foreach ($words as $word)
        <p>{{ $word->word }}</p>
    @endforeach
    
    <button wire:click="$refresh">Refresh</button>
</div>
