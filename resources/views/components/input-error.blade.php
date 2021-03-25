@props(['for'])

@error($for)
    <p class="mt-3 text-sm text-red-600">{{ $message }}</p>
@enderror
