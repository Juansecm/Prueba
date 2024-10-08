			<!-- Page header -->
			<div class="full-box page-header">
				<h3 class="text-left">
					<i class="fas fa-plus fa-fw"></i> &nbsp; ACTUALIZAR USUARIO
				</h3>
				<p class="text-justify">
				</p>
			</div>
			
			<div class="container-fluid">
				<ul class="full-box list-unstyled page-nav-tabs">
					<li>
						<a class="active" href="?c=Users&a=userCreate"><i class="fas fa-plus fa-fw"></i> &nbsp; NUEVO USUARIO</a>
					</li>
					<li>
						<a href="?c=Users&a=userRead"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; CONSULTAR USUARIOS</a>
					</li>
				</ul>	
			</div>
			<div class="container-fluid">
			<form action="" method="POST" class="form-neon" autocomplete="off" name="form_user_update">
					<fieldset>
						<legend><i class="far fa-address-card"></i> &nbsp; Actualizar Información personal</legend>
						<div class="container-fluid">
							<div class="row">
								<input type="hidden" class="form-control" name="user_code" id="user_code" value="<?php echo $user->getUserCode(); ?>">
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="rol_code" class="bmd-label-floating">Rol</label>
										<select class="form-control" name="cod_rol" id="rol_name_update">
											<?php foreach ($roles as $rol) : ?>
												<?php if ($rol->getRolCode() == $user->getRolCode()) : ?>
													<option selected="" value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
												<?php else : ?>
													<option value="<?php echo $rol->getRolCode() ?>"><?php echo $rol->getRolName() ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="house_code" class="bmd-label-floating">casa</label>
										<select class="form-control" name="house_code" id="house_name_update">
											<?php foreach ($houses as $house) : ?>
												<?php if ($house->getHouseCode() == $user->getHouseCode()) : ?>
													<option selected="" value="<?php echo $house->getHouseCode() ?>"><?php echo $house->getHouseName() ?></option>
												<?php else : ?>
													<option value="<?php echo $house->getHouseCode() ?>"><?php echo $house->getHouseName() ?></option>
												<?php endif; ?>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_state" class="bmd-label-floating">Estado</label>
										<select class="form-control" name="user_state" id="user_state_update">
											<?php for ($i = 0; $i <= 1; $i++) : ?>
												<?php if ($user->getUserState() == $i) : ?>
													<option selected="" value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
												<?php else : ?>
													<option value="<?php echo $i ?>"><?php echo $state[$i] ?></option>
												<?php endif; ?>
											<?php endfor; ?>
										</select>
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_name" class="bmd-label-floating">Nombres</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="user_name" id="user_name_update" maxlength="35" value="<?php echo $user->getUserName(); ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_lastname" class="bmd-label-floating">Apellidos</label>
										<input type="text" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,35}" class="form-control" name="user_lastname" id="user_lastname_update" maxlength="35" value="<?php echo $user->getUserLastName(); ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_birthday" class="bmd-label-floating">Fecha de nacimiento</label>
										<input type="date" pattern="[0-9()+]{1,20}" class="form-control" name="user_birthday" id="user_birthday_update" maxlength="20" value="<?php echo $user->getUserBirthday(); ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_id" class="bmd-label-floating">Identificación</label>
										<input type="text" pattern="[0-9()+]{1,20}" class="form-control" name="user_id" id="user_id_update" maxlength="20" value="<?php echo $user->getUserId(); ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_email" class="bmd-label-floating">Email</label>
										<input type="email" class="form-control" name="user_email" id="user_email_update" maxlength="70" value="<?php echo $user->getUserEmail(); ?>">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_pass" class="bmd-label-floating">Contraseña</label>
										<input type="password" class="form-control" name="user_pass" id="user_pass_update" maxlength="200">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_pass_conf" class="bmd-label-floating">Repetir contraseña</label>
										<input type="password" class="form-control" name="user_pass_conf" id="user_pass_conf_update" maxlength="200">
									</div>
								</div>
								<div class="col-12 col-md-6">
									<div class="form-group">
										<label for="user_phone" class="bmd-label-floating">telefono</label>
										<input type="number" pattern="[0-9()+]{1,20}" class="form-control" name="user_phone" id="user_phone_update" maxlength="20" value="<?php echo $user->getUserPhone(); ?>">
									</div>
								</div>
							</div>
						</div>
					</fieldset>
					<p class="text-center" style="margin-top: 40px;">
						<button type="reset" class="btn btn-raised btn-secondary btn-sm"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
						&nbsp; &nbsp;
						<button type="submit" class="btn btn-raised btn-info btn-sm" id="submit-update-user"><i class="far fa-save"></i> &nbsp; ENVIAR</button>
					</p>
				</form>
			</div>