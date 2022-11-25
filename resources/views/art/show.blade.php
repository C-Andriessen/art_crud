<x-guest-layout>
    {{-- Met deze variable kan je de titel ophalen --}}
        <h1>{{ $art->title }}</h1>
        {{-- Met deze line kan je de image ophalen --}}
        <a href="{{ route('show', $art) }}">
            <img src="{{ asset('images/' . $art->image) }}" alt="" srcset="">
        </a>
</x-guest-layout>