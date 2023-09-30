<div class="live-preview">
    <form action="">
        <div class="mb-3">
            <label for="employeeName" class="form-label">Slider Name</label>
            <input type="text" class="form-control" id="employeeName"
                placeholder="Enter slider name" name="name" value="{{ $slider->name }}">
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Slider Description</label>
            <input type="text" class="form-control" id="description"
                placeholder="Enter offer description" name="description" value="{{ $slider->description }}">
        </div>

        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Price</label>
            <input type="text" class="form-control" id="price"
                placeholder="Enter price" name="price" value="{{ $slider->price }}">
        </div>

        <div class="mb-3">
            <label for="offerName" class="form-label">Section Name</label>
            <select class="form-select" id="offerName" name="section_id">
                <option value="" disabled>Select a section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" @if ($section->id == $slider->section_id) selected @endif>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

            <div class="mb-3">
                <label for="offerName" class="form-label">Area Name</label>
                <select class="form-select" id="offerName" name="area_id">
                    <option value="" disabled selected>Select an area</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" @if ($area->id == $slider->area_id) selected @endif>{{ $area->title }}</option>
                    @endforeach
                </select>
            </div>


            @if($slider->image != null)

            <img src="{{ asset('uploads/sliders/'.$slider->image) }}" height="80" width="80" alt="">

            @endif

        <div class="mb-3">
            <label for="image_url" class="form-label">Select Image</label>
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
                <label class="input-group-text" for="image">Upload</label>
            </div>
        </div>

        <div class="form-check form-switch form-switch-lg" dir="ltr">
            <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status" {{ $slider->status === 'available' ? 'checked' : '' }}>
            <label class="form-check-label" for="customSwitchsizelg">Is Available</label>
        </div>


