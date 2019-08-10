SELECT c.nomConductor, i.importe FROM denuncia d 
INNER JOIN conductor c ON d.idConductor=c.idConductor 
INNER JOIN infraccion i ON d.idInfraccion=i.idInfraccion
WHERE i.importe < 30000



SELECT c.dni FROM denuncia d
INNER JOIN conductor c ON d.idConductor=c.idConductor
WHERE d.pagada = 1
AND d.fecha="2019-08-18"