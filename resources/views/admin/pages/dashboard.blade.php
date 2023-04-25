@section('assets')
    @vite('resources/css/admin/pages/dashboard.css')
@endsection
<x-ladmin>
    <x-slot name="content">
        <div class="content">
            <div class="chat-clear">
                <span class="chat-clear-btn">Отчистить историю чата</span>
            </div>
        </div>
    </x-slot>
</x-ladmin>
