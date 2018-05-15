CREATE TABLE `mydb`.`usuario_temporal` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `correo` VARCHAR(160) NOT NULL,
  `nombres` VARCHAR(100) NOT NULL,
  `apellidos` VARCHAR(100) NOT NULL,
  `tel` VARCHAR(45) NOT NULL,
  `codigo` INT NOT NULL,
  `password` VARCHAR(200) NOT NULL,
  `tipo` INT NOT NULL,
  PRIMARY KEY (`id`));
  
ALTER TABLE `mydb`.`usuario_temporal` 
ADD COLUMN `created` DATETIME(6) NOT NULL AFTER `tipo`;
ALTER TABLE `mydb`.`usuario_temporal` 
ADD COLUMN `status` INT NULL AFTER `created`;
ALTER TABLE `mydb`.`usuario_temporal` 
CHANGE COLUMN `status` `status` INT(11) NOT NULL ;

  CREATE TABLE `mydb`.`token_usuario` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `action` VARCHAR(45) NOT NULL,
  `token` VARCHAR(200) NOT NULL,
  `status` INT NOT NULL,
  `created` DATETIME(6) NOT NULL,
  `used` DATETIME(6) NOT NULL,
  PRIMARY KEY (`id`));


  ALTER TABLE `mydb`.`anexo` 
ADD COLUMN `created` DATETIME(6) NOT NULL AFTER `proyecto_idprotecto`;
ALTER TABLE `mydb`.`anexo` 
ADD COLUMN `user` INT NOT NULL AFTER `created`;