<div class="modal fade" id="modalSolicitar-{{$book->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Confirmar solicitud de libro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-4">
              <img src="{{ asset('/storage/uploads/portada/' . $book->imagen) }}" class="img-fluid" alt="Image" />
            </div>
            <div class="col-8">
              <p>
                Título: <b>{{$book->titulo}}</b> <br />
                Autor: <b>{{$book->autor}}</b> <br />
                </p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <form action="{{route('prestamos.store')}}" method="post">
            @csrf

            <input type="hidden" name="book_id" value="{{$book->id}}">


            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Solicitar</button>
          </form>
        </div>
      </div>
    </div>
</div>