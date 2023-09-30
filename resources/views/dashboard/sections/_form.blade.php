<div class="mb-3">
    <label for="employeeName" class="form-label">Section Name</label>
    <input type="text" class="form-control" id="employeeName"
        placeholder="Enter offer name" name="name" value="{{ $section->name }}">
</div>





@if($section->image != null)
<img src="{{ asset('uploads/sections/'.$section->image) }}" height="80px" width="80px" alt="">

@endif


<div class="mb-3">
    <label for="image_url" class="form-label">Select Image</label>
    <div class="input-group">
        <input type="file" class="form-control" id="image" name="image">
        <label class="input-group-text" for="image">Upload</label>
    </div>
</div>
<div class="form-check form-switch form-switch-lg" dir="ltr">
    <input type="checkbox" class="form-check-input" id="customSwitchsizelg" name="status" {{ $section->status === 'available' ? 'checked' : '' }}>
    <label class="form-check-label" for="customSwitchsizelg">Is Available</label>
</div>


