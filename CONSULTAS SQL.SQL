#Consulta para recuperar las fertas a las que esta inscrito un usuario

SELECT offers.Title 
FROM usersoffers 
INNER JOIN offers 
ON usersoffers.OfferID = offers.OfferID 
WHERE usersoffers.UserID = "USERID DEL USUARIO ACTIVO"