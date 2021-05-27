@if (Auth::user()->is_favoriting($post->id))
        <form action="{{ route('favorites.unfavorite',$post->id) }}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit">
                <i class="fas fa-heart"></i>
            </button>
        </form>
    @else
        <form action="{{ route('favorites.favorite',$post->id) }}" method="POST">
            @csrf
            <button type="submit">
                <i class="far fa-heart"></i>
            </button>
        </form>
    @endif