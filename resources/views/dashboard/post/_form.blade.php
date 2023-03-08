@csrf

<label for="">Titulo</label>
<input type="text" class="form-control" name="title" value="{{ old('title', $post->title) }}">

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" value="{{ old('slug', $post->slug) }}">

<label for="">Contenido</label>
<textarea name="content" class="form-control">{{ old('content', $post->content) }}</textarea>

<label for="">Descripcion</label>
<textarea name="description" class="form-control">{{ old('description', $post->description) }}</textarea>

<label for="">Categoria</label>
<option value=""></option>
<select name="category_id" class="form-control">
    @foreach ($categories as $title => $id)
        <option {{old('category_id', '') == $id ? 'selected' : $post->category_id}} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted" class="form-control">
    <option value=""></option>
    <option value="yes" {{old('posted', $post->posted) == "yes" ? 'selected' : ''}}>Si</option>
    <option value="not" {{old('posted', $post->posted) == "not" ? 'selected' : ''}}>No</option>
</select>

@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif

<button type="submit">Enviar</button>