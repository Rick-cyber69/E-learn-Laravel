@csrf
<div class="mb-3">
    <label>Title</label>
    <input type="text" name="title" class="form-control" value="{{ old('title', $course->title ?? '') }}">
</div>
<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $course->description ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label>Video URL</label>
    <input type="text" name="video_url" class="form-control" value="{{ old('video_url', $course->video_url ?? '') }}">
</div>
<button class="btn btn-success">Save</button>
