@csrf

<label for="">Titulo</label>
<input type="text" name="title" value="{{ old('title', $post->title) }}">

<label for="">Slug</label>
<input type="text" name="slug" value="{{ old('slug', $post->slug) }}">

<label for="">Contenido</label>
<textarea name="content">{{ old('content', $post->content) }}</textarea>

<label for="">Descripcion</label>
<textarea name="description">{{ old('description', $post->description) }}</textarea>

<label for="">Categoria</label>
<option value=""></option>
<select name="category_id">
    @foreach ($categories as $title => $id)
        <option {{old('category_id', '') == $id ? 'selected' : $post->category_id}} value="{{ $id }}">{{ $title }}</option>
    @endforeach
</select>

<label for="">Posteado</label>
<select name="posted">
    <option value=""></option>
    <option value="yes" {{old('posted', $post->posted) == "yes" ? 'selected' : ''}}>Si</option>
    <option value="not" {{old('posted', $post->posted) == "not" ? 'selected' : ''}}>No</option>
</select>

@if (isset($task) && $task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif

<button type="submit">Enviar</button>