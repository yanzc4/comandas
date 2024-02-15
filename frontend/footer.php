        <!-- ================================================================= -->
    <!-- Modal para eliminar -->
    <div class="modal fade" id="meliminar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content redondear">
                <div class="modal-body">

                    <div class="text-center">
                        <img class="w-50" src="../assets/gif/advertencia.gif" alt="">
                    </div>
                    <div>
                        <h3 class="text-center">¿Deseas eliminar?</h3>
                    </div>
                    <div class="text-center">
                        <p>¡No podra revertir esto!</p>
                    </div>
                    <div class="row pe-5 ps-5 text-center mt-4 mb-2">
                        <div class="col-6">
                            <button id="btnEliminarNoti" data-bs-dismiss="modal" class="btn bg-primary text-light w-100 fw-bold">¡Eliminar!</button>
                        </div>
                        <div class="col-6">
                            <button id="btnCancelar" data-bs-dismiss="modal" class="btn bg-danger text-light w-100">Cancelar</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal para notificaciones -->
    <div class="modal fade" id="noti" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content redondear">
                <div class="modal-body" id="cuerpo-noti">


                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/js/bootstrap.min.js"></script>