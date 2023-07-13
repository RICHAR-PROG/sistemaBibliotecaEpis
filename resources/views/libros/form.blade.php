<div class="row">
    <div class="col-6">
        <div class="form-group">
            <label for="imagen">Imagen:</label>
            <input type="file" class="form-control" value="{{ isset($libros->imagen) ? $libros->imagen : '' }}"id="imagen"
                name="imagen" accept="image/png, .jpg, .jpeg">
        </div>
        <div class="form-group">
            <label for="dewey">Numero de Deewey:</label>
            <input type="text" class="form-control" value="{{ isset($libros->dewey) ? $libros->dewey : '' }}"id="dewey"
                name="dewey" required>
        </div>
        <div class="form-group">
            <label for="titulo">Titulo:</label>
            <input type="text" class="form-control" value="{{ isset($libros->titulo) ? $libros->titulo : '' }}"
                id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="autor">Autor:</label>
            <input type="text" class="form-control" value="{{ isset($libros->autor) ? $libros->autor : '' }}" id="autor"
                name="autor" required>
        </div>
        <div class="form-group">
            <label for="fechaEdicion">Fecha de Edicion:</label>
            <input type="date" class="form-control" value="{{ isset($libros->fecha_edicion) ? $libros->fecha_edicion : '' }}"
                id="fechaEd" name="fecha_edicion" required>
        </div>
        <div class="form-group">
            <label for="editorial">Editorial:</label>
            <input type="text" class="form-control" value="{{ isset($libros->editorial) ? $libros->editorial : '' }}" id="editorial"
                name="editorial" required>
        </div>
        
    </div>
    <div class="col-6">
        <div class="form-group">
            <label for="fechaEdicion">Fecha de Compra:</label>
            <input type="date" class="form-control" value="{{ isset($libros->fecha_adquisicion) ? $libros->fecha_adquisicion : '' }}"
                id="fechaC" name="fecha_adquisicion" required>
        </div>
        <div class="form-group">
            <label for="genero">Genero:</label>
            <input type="text" class="form-control" value="{{ isset($libros->genero) ? $libros->genero : '' }}" id="genero"
                name="genero" required>
        </div>
        <div class="form-group">
            <label for="formato">Formato:</label>
            <select class="form-control" id="formato" name="formato" required>
                <option value="">Seleccione una opción</option>
                <option value="Fisico" {{ isset($libros->formato) && $libros->formato == 'Fisico' ? 'selected' : '' }}>
                    Fisico</option>
                <option value="PDF" {{ isset($libros->formato) && $libros->formato == 'PDF' ? 'selected' : '' }}>
                    PDF</option>
            </select>
        </div>
        <div class="form-group">
            <label for="PDF">PDF:</label>
            <input type="file" class="form-control" value="{{ isset($libros->PDF) ? $libros->PDF : '' }}" id="PDF"
                name="PDF" accept=".pdf">
        </div>
        
        <div class="form-group">
            <label for="stock">Stock:</label>
            <input type="number" class="form-control" value="{{ isset($libros->stock) ? $libros->stock : '' }}" id="stock" name="stock" required>
        </div>
    </div>
</div>



<a href="{{url('libros/')}}" class="btn btn-dark">Regresar</a>
<input type="submit" value="{{$modo}} Libro" class="btn btn-primary">
