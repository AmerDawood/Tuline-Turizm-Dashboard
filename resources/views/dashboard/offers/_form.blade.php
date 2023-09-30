<div class="live-preview">
    <form action="">
        <div class="mb-3">
            <label for="employeeName" class="form-label">Offer Name</label>
            <input type="text" class="form-control" id="employeeName"
                placeholder="Enter offer name" name="name" value="{{ $offer->name }}">
        </div>
        <div class="mb-3">
            <label for="employeeUrl" class="form-label">Offer Description</label>
            <input type="text" class="form-control" id="description"
                placeholder="Enter offer description" name="description" value="{{ $offer->description }}">
        </div>


        <div class="mb-3">
            <label for="employeeName" class="form-label">Offer Price</label>
            <input type="text" class="form-control" id="employeeName"
                placeholder="Enter offer price" name="price" value="{{ $offer->price }}">
        </div>


        <div class="mb-3">
            <label for="employeeName" class="form-label">Offer Days Number</label>
            <input type="text" class="form-control" id="employeeName"
                placeholder="Enter offer days number" name="days_number" value="{{ $offer->days_number }}">
        </div>

        <div class="mb-3">
            <label for="offerName" class="form-label">Section Name</label>
            <select class="form-select" id="offerName" name="section_id">
                <option value="" disabled>Select a section</option>
                @foreach ($sections as $section)
                    <option value="{{ $section->id }}" @if ($section->id == $offer->section_id) selected @endif>{{ $section->name }}</option>
                @endforeach
            </select>
        </div>

            <div class="mb-3">
                <label for="offerName" class="form-label">Area Name</label>
                <select class="form-select" id="offerName" name="area_id">
                    <option value="" disabled selected>Select an area</option>
                    @foreach ($areas as $area)
                        <option value="{{ $area->id }}" @if ($area->id == $offer->area_id) selected @endif>{{ $area->title }}</option>
                    @endforeach
                </select>
            </div>



            @if($offer->image != null)

            <img src="{{ asset('uploads/offers/'.$offer->image) }}" height="80" width="80" alt="">

            @endif
            
        <div class="mb-3">
            <label for="image_url" class="form-label">Select Image</label>
            <div class="input-group">
                <input type="file" class="form-control" id="image" name="image">
                <label class="input-group-text" for="image_url">Upload</label>
            </div>
        </div>

        <div class="form-check form-switch form-switch-lg" dir="ltr">
            <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status" {{ $section->status === 'available' ? 'checked' : '' }}>
            <label class="form-check-label" for="customSwitchsizelg">Is Available</label>
        </div>
