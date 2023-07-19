<div class="modal fade" id="modalCancelar-{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de cancelar la solicitud?</h5>
        </div>
        <div class="modal-footer border-0">
          <form action="{{route('prestamos.update', $item->id)}}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="prestamo_id" value="{{$item->id}}">
            <input type="hidden" name="estado" value="CANCELADO">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-danger">Sí, cancelar solicitud</button>
          </form>
        </div>
      </div>
    </div>
</div>