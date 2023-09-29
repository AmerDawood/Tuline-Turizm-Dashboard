<div class="col-md-12">
    <label for="fullnameInput" class="form-label">Title</label>
    <input type="text" name="title" class="form-control" id="fullnameInput" placeholder="Enter your name" value="{{ $area->title }}">
</div>

<div class="col-md-12">
    <label for="fullnameInput" class="form-label">Description </label>
    <textarea type="text" name="description" class="form-control" id="fullnameInput" placeholder="Enter your description">{{ $area->description }}</textarea>
</div>


<div id="map" style="height:400px; width: 900px; margin-top: 30px;margin-left:20px;"></div>

<input type="text" name="latitude" hidden id="latitude" value="{{ $area->latitude }}">

<input type="text" name="longitude" hidden id="longitude" value="{{ $area->longitude }}">
