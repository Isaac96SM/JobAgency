#########################
#CONSULTAS PARA USUARIOS#
#########################

#Consulta para recuperar las ofertas a las que esta inscrito un usuario

SELECT offers.Title 
FROM usersoffers 
INNER JOIN offers 
ON usersoffers.OfferID = offers.OfferID 
WHERE usersoffers.UserID = "UserID del usuario activo"

#Consulta para que un usuario se registre en una oferta

INSERT INTO usersoffers (UserID, OfferID) 
VALUES ("UserID del usuario activo", "OfferID de la oferta selecionada")

#Consulta para que un usuario se borre de una oferta

DELETE FROM usersoffers 
WHERE UserID = "UserID del usuario activo" AND OfferID = "OfferID de la oferta selecionada"

#Consulta para ver las ofertas en alta

SELECT * FROM offers ORDER BY RegistrationDate

#Consulta para cambiar la contraseña de un usuario

UPDATE users SET Password = "Nueva contraseña" WHERE UserID = "UserID del usuario activo"

#Consulta para dar de baja un usuario

DELETE FROM usersoffers WHERE UserID = "UserID del usuario activo"
DELETE FROM users WHERE UserID = "UserID del usuario activo"

##########################
#CONSULTAS PARA COMPAÑIAS#
##########################

#Consulta para obtener las ofertas de la empresa

SELECT offers.Title 
FROM offers INNER JOIN
companies
ON offers.CompanyID = companies.CompanyID 
WHERE offers.CompanyID = "CompanyID de la compañia activa"

#Consulta para crear una nueva oferta

INSERT INTO offers (Title, Description, CompanyID) VALUES
("Titulo...", "Descripcion...", "CompanyID de la compañia activa")

#Consulta para borrar una oferta

DELETE FROM usersoffers WHERE OfferID = "OfferID de la oferta seleccionada"
DELETE FROM offers WHERE OfferID = "OfferID de la oferta seleccionada"

#Consulta para editar una oferta

UPDATE offers
SET "Campo a actualizar" = "Nuevo valor para el campo"
WHERE OfferID = "OfferID de la oferta seleccionada"

#Consulta para dar de baja una compañia


DELETE FROM usersoffers WHERE CompanyID = "CompanyID de la compañia activa"
DELETE FROM companies WHERE CompanyID = "CompanyID de la compañia activa"