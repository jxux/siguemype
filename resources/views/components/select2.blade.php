{{-- <div wire:ignore class="w-full">
    <select class="form-select select2" data-minimum-results-for-search="Infinity" data-placeholder="{{__('Select your option')}}" {{ $attributes }}>
        <option></option>
            @foreach($messages as $key => $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
    </select>
</div>

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: '{{__('Select your option')}}',
                allowClear: true
            });
            $('.select2').on('change', function (e) {
                let elementName = $(this).attr('id');
                var data = $(this).select2("val");
                @this.set('elementName', data);
            });
        });
    </script>
@endpush --}}

{{-- <div wire:ignore>
    <select class="w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-xs" id="select2">
        <option value="">Choose Song</option>
        @foreach($messages as $data)
        <option value="{{ $data->id }}">{{ $data->internal_code }} - {{ $data->name }}</option>
        @endforeach
    </select>
</div>

@push('scripts')
    <script>
        $(document).ready(function () {
            $('#select2').select2();
            $('#select2').on('change', function (e) {
                var item = $('#select2').select2("val");
                @this.set('id', item);
            });
        });
    </script>
@endpush --}}