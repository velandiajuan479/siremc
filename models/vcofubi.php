<?php
  require_once("cotrollers/mcofubi.php");
?> 

<h1 class="display-title">Ubicación</h1>
<div class="container-fluid py-4">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-11">

            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
                        <div>
                            <h3 class="mb-1" style="color: #505050;">Ubicación</h3>
                            <p class="mb-0 text-muted">Gestiona la información geográfica y de referencia del sistema.</p>
                        </div>
                        <a href="index.php?pg=33" class="btn btn-primary">
                            <i class="bi bi-geo-alt me-2"></i>Nueva ubicación
                        </a>
                    </div>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-4 mb-4">
                <div class="card-body p-4">
                    <form class="row g-3">
                        <div class="col-12 col-md-6">
                            <label for="pais" class="form-label">País</label>
                            <input type="text" class="form-control" id="pais" name="pais" placeholder="Ej. Colombia">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="departamento" class="form-label">Departamento</label>
                            <input type="text" class="form-control" id="departamento" name="departamento" placeholder="Ej. Cundinamarca">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="ciudad" class="form-label">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ej. Bogotá">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ej. Calle 123 #45-67">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="barrio" class="form-label">Barrio</label>
                            <input type="text" class="form-control" id="barrio" name="barrio" placeholder="Ej. Chapinero">
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="codigo_postal" class="form-label">Código postal</label>
                            <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Ej. 110111">
                        </div>

                        <div class="col-12">
                            <label for="referencia" class="form-label">Referencia</label>
                            <textarea class="form-control" id="referencia" name="referencia" rows="3" placeholder="Punto de referencia, indicaciones o descripción adicional"></textarea>
                        </div>

                        <div class="col-12 d-flex flex-wrap gap-2 justify-content-end mt-2">
                            <button type="reset" class="btn btn-secondary">
                                <i class="bi bi-arrow-counterclockwise me-2"></i>Limpiar
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save me-2"></i>Guardar ubicación
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <div class="table-responsive">
                        <table class="table align-middle">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>País</th>
                                    <th>Departamento</th>
                                    <th>Ciudad</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Colombia</td>
                                    <td>Cundinamarca</td>
                                    <td>Bogotá</td>
                                    <td>Calle 123 #45-67</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Colombia</td>
                                    <td>Antioquia</td>
                                    <td>Medellín</td>
                                    <td>Cra 50 #10-25</td>
                                    <td>
                                        <button class="btn btn-sm btn-primary me-1">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        <button class="btn btn-sm btn-secondary">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>