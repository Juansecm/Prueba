	<!-- Page header -->
    <div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-clipboard-list fa-fw"></i> &nbsp; LISTA DE LUGARES
				</h3>
			</div>
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a href="?c=Places&a=placeCreate"><i class="fas fa-plus fa-fw"></i> &nbsp; Agregar lugar</a>
					</li>
					<li>
						<a class="active" href="?c=Places&a=placeRead"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Consultar lugar</a>
					</li>
					<li>
						<a href="?c=Places&a=placeUpdate"><i class="fas fa-search fa-fw"></i> &nbsp; Buscar lugar</a>
					</li>
				</ul>
			</div>
        <table class="table">
            <thead>
                <tr class="text-center roboto-medium">
                    <th>Codigo lugar</th>
                    <th>Nombre lugar</th>
                    <th>Actualizar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
			<?php foreach ($places as $place) : ?>
								<tr class="text-center" >
									<td><?php echo $place->getPlaceCode(); ?></td>
									<td><?php echo $place->getPlaceName(); ?></td>
									<td>
										<a href="?c=Places&a=placeUpdate&idplace=<?php echo $place->getPlaceCode(); ?>" class="btn btn-success">
										<a href="?c=Places&a=placeUpdate&idplace=<?php echo $place->getPlaceName(); ?>" class="btn btn-success">
											<i class="fas fa-sync-alt"></i>
										</a>
									</td>
									<td>
									<a href="?c=Places&a=placeDelete&idplace=<?php echo $place->getPlaceCode(); ?>" class="btn btn-warning">
											<i class="far fa-trash-alt"></i>
										</a>
									</td>
								</tr>
							<?php endforeach; ?>
            </tbody>
        </table>
        </div>
    </form>