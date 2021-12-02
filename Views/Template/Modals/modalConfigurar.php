<!-- Modal -->
<div class="modal fade" id="modalFormConfigurar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" >
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nueva Configuracion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formConfigurar" name="formConfigurar" class="form-horizontal">
              <input type="hidden" id="idConfig" name="idConfig" value="">
              <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.</p>
              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                      <label class="control-label">Descripcion <span class="required">*</span></label>
                      <textarea class="form-control" id="txtDescripcion" name="txtDescripcion"  placeholder="Descripcion" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Valor <span class="required">*</span></label>
                      <textarea class="form-control" id="txtValor" name="txtValor"  placeholder="Valor" required=""></textarea>
                    </div>
                    <div class="form-group">
                      <label class="control-label">Comentarios <span class="required">*</span></label>
                      <textarea class="form-control" id="txtComentario" name="txtComentario"  placeholder="Comentarios" required=""></textarea>
                    </div>
                </div>
              </div>
              
              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
                <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
              </div>
            </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewConfigurar" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" >
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la configuración</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>ID:</td>
              <td id="celId"></td>
            </tr>
            <tr>
              <td>Descripcion:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Valor:</td>
              <td id="celValor"></td>
            </tr>
            <tr>
              <td>Comenario:</td>
              <td id="celComentario"></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

