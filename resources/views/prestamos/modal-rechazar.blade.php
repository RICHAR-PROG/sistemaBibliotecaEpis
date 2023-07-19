<div class="modal fade" id="modalRechazar-{{$prest->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0">

          {{-- <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button> --}}
        </div>
        <div class="modal-body">
          <h5 class="modal-title pb-3 text-center" id="exampleModalLabel">Rechazar solicitud</h5>
          <p>
            <b>Estudiante:</b> {{$prest->user->name}} <br />
            <b>Libro:</b> {{$prest->libro->titulo}} <br />
          </p>
        </div>
        <div class="modal-footer border-0">
          <form action="{{route('prestamos.update', $prest->id)}}" method="post">
            @csrf
            @method('PUT')

            <input type="hidden" name="prestamo_id" value="{{$prest->id}}">
            <input type="hidden" name="estado" value="RECHAZADO">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-warning">Rechazar</button>
          </form>
        </div>
      </div>
    </div>
</div>