
@if (session()->has('success'))

<div x-data="{show: true}"
    x-init="setTimeout(() => show = false, 4000)"
    x-show="show"
 class="fixed bottom-3 right-3 text-white py-2 px-4 rounded-xl text-sm" style="background: linear-gradient(to right, #8c52ff, #1bdaff);">
    <p>{{session('success')}}</p>
</div>

@endif
