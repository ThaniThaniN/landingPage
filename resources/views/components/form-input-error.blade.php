@props([ 'name' => $name])
@error($name)
<p class="text-danger small font-weight-semibold mt-1" style="font-size: .8rem; line-height: 1">{{ $message }}</p>
@enderror
