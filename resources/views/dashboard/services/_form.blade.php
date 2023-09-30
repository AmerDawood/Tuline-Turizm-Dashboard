<div class="live-preview">
    <form action="">
        <div class="mb-3">
            <label for="employeeName" class="form-label">Service Name</label>
            <input type="text" class="form-control" id="employeeName"
                placeholder="Enter service name" name="name" value="{{ $service->name }}">
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Service Description</label>
            <input type="text" class="form-control" id="description"
                placeholder="Enter service description" name="description" value="{{ $service->description }}">
        </div>

        <div class="mb-3">
            <label for="StartleaveDate" class="form-label">From</label>
            <input type="number" class="form-control" data-provider="flatpickr"
                id="StartleaveDate" name="from" placeholder="Enter Start From service" step="1" value="{{ $service->from }}">
        </div>


        <div class="mb-3">
            <label for="StartleaveDate" class="form-label">Price</label>
            <input type="number" class="form-control" data-provider="flatpickr"
                id="StartleaveDate" name="price" placeholder="Enter Pricee" step="1" value="{{ $service->price }}">
        </div>


        <div class="mb-3">
            <label for="StartleaveDate" class="form-label">Days Number</label>
            <input type="number" class="form-control" data-provider="flatpickr"
                id="StartleaveDate" name="days_number" placeholder="Enter Days Number" step="1" value="{{ $service->days_number }}">
        </div>

        <div class="mb-3">
            <label for="offerName" class="form-label">Section Name</label>
            <select class="form-select" id="offerName" name="section_id">
                <option value="" disabled>Select a section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" @if ($section->id == $service->section_id) selected @endif>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

            <div class="mb-3">
                <label for="offerName" class="form-label">Area Name</label>
                <select class="form-select" id="offerName" name="area_id">
                    <option value="" disabled selected>Select an area</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" @if ($area->id == $service->area_id) selected @endif>{{ $area->title }}</option>
                    @endforeach
                </select>
            </div>


            @if($service->image != null)

            <img src="{{ asset('uploads/services/'.$service->image) }}" height="80" width="80" alt="">

            @endif

        <div class="mb-3">
            <label for="image" class="form-label">Select Image</label>
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
                <label class="input-group-text" for="image">Upload</label>
            </div>
        </div>

        <div class="form-check form-switch form-switch-lg" dir="ltr">
            <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status" {{ $service->status === 'available' ? 'checked' : '' }}>
            <label class="form-check-label" for="customSwitchsizelg">Is Available</label>
        </div>
